<?php

namespace App\Http\Controllers;

use App\Http\Services\PaymentService;
use App\Models\Receipt;
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
        return view('pages.payments.payment')->with('receiptId',$receiptId);
    }

    public function payment(Request $request){
        $this->service->payment($request);
    }





}
