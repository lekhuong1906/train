<?php


namespace App\Http\Services;


use App\Mail\MailSuccess;
use App\Models\Receipt;
use App\Models\Subscription;
use App\Models\TicKet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Masterminds\HTML5\Exception;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class PaymentService extends TicketService
{
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function payment($request){

        $receipt_id = $request->receiptId;
        $amount = Receipt::getAmount($receipt_id);
        $token = $this->createToken($request);

        if (!empty($token['error'])) {
            return redirect()->back()->with('error',$token['error']);
        }
        if (empty($token['id'])) {
            return redirect()->route('/')->with('error', 'Payment failed');
        }

        $charge = $this->createCharge($token['id'], $amount);
        if (!empty($charge) && $charge['status'] == 'succeeded') {

            $this->subcription($charge,$receipt_id);

            $payment_id = Subscription::lastItem();

            $this->create_ticket($payment_id);

            $this->send_mail();

            return redirect()->route('/')->with('message', 'Payment completed');

        }

        return redirect()->route('/')->with('error', 'Payment failed');

    }
    private function createToken(Request $request)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => date("m", strtotime($request->exp_date)),
                    'exp_year' => date("Y", strtotime($request->exp_date)),
                    'cvc' => $request->cvv,
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        } catch (ApiErrorException $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }
    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }

    public function send_mail()
    {
        $detail = TicKet::latest('id')->first();
        $data = json_decode(json_encode($detail),true);

        $qrCode = $this->qrCode($detail->ticket_code);
        $data['qrCode'] = $qrCode;

        $email = Auth::user()->email;
        Mail::to($email)->send(new MailSuccess($data));
    }

    public function subcription($charge, $receipt_id)
    {
        $data = [
            'user_id' => Auth::id(),
            'receipt_id' => $receipt_id,
            'stripe_id' => $charge->id,
            'amount' => $charge->amount,
            'stripe_status' => 1
        ];
        $subscription = new Subscription();
        $subscription->fill($data);
        $subscription->save();
    }
}
