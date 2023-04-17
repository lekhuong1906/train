<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\MailSuccess;
use App\Models\Receipt;
use App\Models\Subscription;
use App\Models\TicKet;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Stripe;
use Stripe\Token;
use Illuminate\Support\Facades\Redirect;


class PaymentController extends Controller
{
    public function checkout($receiptId)
    {
        return view('pages.payments.payment')->with('receiptId',$receiptId);
    }

    public function payment(Request $request){
        $receiptId = $request->receiptId;
        $charge= $this->create_charge($request,$receiptId);
        $subscriptionId = Subscription::orderby('id', 'desc')->first()->id;

        if (!empty($charge) && $charge['status'] == 'succeeded') {
            #Create Subscription
            $this->subcription($charge, $receiptId);

            #Create Ticket
            $this->create_ticket($subscriptionId);

            Toastr::success('success', 'Payment completed.');
        } else {
            Toastr::error('danger', 'Payment failed.');
            return redirect()->back()->with('error','Payment failed');
        }
        #Send mail
        $this->send_mail();

        return redirect()->route('/')->with('message','Payment Success');
    }

    /* create Charge */
    public function create_charge(Request $request,$receiptId)
    {
        Stripe::setApiKey('sk_test_51Ll5TpHPOVRsN3XUqNRhVP4TXg6uhjMVLQ88AbyLajW4HLiUp80AUEM1eimlyU5BXJtOQOip9U10vFGI8OplzR3H00vBwfAlYk');

        $amount = Receipt::where('id', $receiptId)->first()->receipt_total;

        try {
            #create token
            $token = Token::create([
                'card' => [
                    'number' => $request['card_number'],
                    'exp_month' => date("m", strtotime($request->exp_date)),
                    'exp_year' => date("Y", strtotime($request->exp_date)),
                    'cvc' => $request['cvv'],
                ]
            ]);
        } catch (CardException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (InvalidRequestException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        #Create charge
        $charge = Charge::create([
            'amount' => $amount,
            'currency' => 'vnd',
            'source' => $token,
            'description' => 'Ticket Payment',
        ]);
        return $charge;
    }

    /* Send mail */
    public function send_mail()
    {
        $detail = TicKet::orderby('id', 'desc')->first();
        $detail['email'] = Auth::user()->email;
        SendMail::dispatch($detail->toArray())->delay(now()->addSeconds(2));
    }

    public function subcription($charge, $id)
    {
        $data = [
            'user_id' => Auth::id(),
            'receipt_id' => $id,
            'stripe_id' => $charge->id,
            'amount' => $charge->amount,
            'stripe_status' => 1
        ];
        $subscription = new Subscription();
        $subscription->fill($data);
        $subscription->save();
    }

    /* Create receipt */
    public function save_receipt(Request $request)
    {
        $new_receipt = new Receipt();
        $new_receipt->fill($request->all());
        $new_receipt->save();
        $receipt_id = Receipt::latest('id')->first()->id;
        $request->session()->put(['receipt_id' => $receipt_id]);

        return Redirect::to('/check-out/' . $receipt_id)->with('message', 'Receipt Add Successfully');
    }

    /* create ticket */
    public function create_ticket($id)
    {
        $data = [
            'payment_id' => $id,
            'ticket_code' => $this->create_ticket_code(),
            'day_start' => $this->day_start($id),
            'day_end' => $this->day_end($id),
            'ticket_status' => $this->ticket_status($id),
        ];
        $new_ticket = new TicKet();
        $new_ticket->fill($data);
        $new_ticket->save();
    }


    public function day_start($id)
    {
        $payment = Subscription::where('id', $id)->first();
        if ($payment->stripe_status)
            return date_format($payment->created_at, 'Y-m-d');
    }

    public function day_end($id)
    {
        $payment = Subscription::where('id', $id)->first();
        $date = new Carbon($payment->created_at);
        $date->addDays($payment->receipt->type_ticket->total_day);
        $date->toDateString();
        if ($payment->stripe_status)
            return $date;
    }

    public function ticket_status($id)
    {
        $payment = Subscription::where('id', $id)->first();
        $date_now = $this->day_end($payment->id);
        if ($date_now->isPast())
            return 0;
        return 1;
    }

    public function create_ticket_code(){
        $now = Carbon::now()->format('dmY');
        return 'TTK' . $now;
    }

}
