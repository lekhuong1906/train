<?php

namespace App\Http\Controllers;

use App\Http\Services\PaymentService;
use App\Models\Receipt;
use App\Models\Subscription;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    protected $service;

    public function __construct(PaymentService $paymentService)
    {
        $this->service = $paymentService;
    }

    public function checkout($receiptId)
    {
        return view('pages.payments.payment')->with('receiptId', $receiptId);
    }

    public function payment(Request $request)
    {
        $receipt_id = $request->receiptId;
        $amount = Receipt::getAmount($receipt_id);
        $token = $this->service->createToken($request);

        if (!empty($token['error'])) {
            return redirect()->back()->with('error', $token['error']);
        }
        if (empty($token['id'])) {
            return redirect()->route('/')->with('error', 'Payment failed');
        }

        $charge = $this->service->createCharge($token['id'], $amount);
        if (!empty($charge) && $charge['status'] == 'succeeded') {

            $this->service->subcription($charge, $receipt_id);

            $payment_id = Subscription::lastItem();

            $this->service->create_ticket($payment_id);

            $this->service->send_mail();
            return redirect()->route('home')->with('message', 'Payment Completed');

        } else
            return redirect()->route('/')->with('error', 'Payment failed');
    }


}
