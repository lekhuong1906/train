<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Subscription;
use App\Models\TicKet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Masterminds\HTML5\Exception;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;
use Stripe\Token;
use Illuminate\Support\Facades\Redirect;


class PaymentController extends Controller
{
    public function checkout($id)
    {
        return view('pages.payments.payment');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey('sk_test_51Ll5TpHPOVRsN3XUqNRhVP4TXg6uhjMVLQ88AbyLajW4HLiUp80AUEM1eimlyU5BXJtOQOip9U10vFGI8OplzR3H00vBwfAlYk');

        $receipt_id = $request->session()->pull('receipt_id');
        $amount = Receipt::where('id',$receipt_id)->first()->receipt_total;

        try {
            $token = Token::create([
                'card' => [
                    'number' => $request['card_number'],
                    'exp_month' => date("m",strtotime($request->exp_date)),
                    'exp_year' => date("Y",strtotime($request->exp_date)),
                    'cvc' => $request['cvv'],
                ]
            ]);
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'vnd',
                'source' => $token,
                'description' => 'Ticket Payment',
            ]);

            if (!empty($charge) && $charge['status'] == 'succeeded') {
                $request->session()->flash('success', 'Payment completed.');
                $this->subcription($charge,$receipt_id);
                $this->create_ticket(Subscription::first()->id);
            } else {
                $request->session()->flash('danger', 'Payment failed.');
            }

        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }

        return Redirect::to('/');
    }
    public function subcription($charge,$id){
        $data = [
            'user_id'=>Auth::id(),
            'receipt_id'=>$id,
            'stripe_id'=>$charge->id,
            'amount'=>$charge->amount,
            'stripe_status'=> 1
        ];
        $subscription = new Subscription();
        $subscription->fill($data);
        $subscription->save();
    }

    //create ticket

    public function create_ticket($id){
        $data = [
            'payment_id' => $id,
            'ticket_code' =>$this->create_ticket_code(),
            'day_start' =>$this->day_start($id) ,
            'day_end' =>$this->day_end($id),
            'ticket_status'=> $this->ticket_status($id),
        ];
        $new_ticket = new TicKet();
        $new_ticket->fill($data);
        $new_ticket->save();
    }
    public function day_start($id){
        $payment = Subscription::where('id',$id)->first();
        if ($payment->stripe_status)
            return date_format($payment->created_at,'Y-m-d');
    }
    public function day_end($id){
        $payment = Subscription::where('id',$id)->first();
        $date = new Carbon($payment->created_at);
        $date->addDays($payment->receipt->type_ticket->total_day);
        $date->toDateString();
        if ($payment->stripe_status)
            return $date;
    }
    public function ticket_status($id){
        $payment = Subscription::where('id',$id)->first();
        $date_now = $this->day_end($payment->id);
        if ($date_now->isPast())
            return 0;
        return 1;
    }
    public function create_ticket_code(){
        $str='';
        for($i=0;$i<8;$i++)
            $str .= chr(random_int(65,90));
        return $str;
    }
}
