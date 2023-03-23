<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Masterminds\HTML5\Exception;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;
use Stripe\StripeClient;
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
        $subscription = array([
            'user_id'=>Auth::id(),
            'receipt_id'=>$id,
            'stripe_id'=>$charge->id,
            'amount'=>$charge->amount,
            'stripe_status'=> 1
        ]);
        return Subscription::insert($subscription);
    }
}
