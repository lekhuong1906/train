<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\TypeTicket;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


class ReceiptController extends Controller
{
    public function all_receipt(){
        $all_receipt = Receipt::paginate(5);
        return view('admin.receipts.all_receipt')->with('all_receipt',$all_receipt);
    }
    public function receipt_detail($id){
        $receipt = Receipt::where('id',$id)->first();
        return view('admin.receipts.receipt_detail')->with('receipt',$receipt);
    }


    //home page

    public function create_receipt($id){
        $type_ticket = TypeTicket::where('id',$id)->first();
        return view('pages.payments.create_receipt')->with('type_ticket',$type_ticket);
    }

    public function save_receipt(Request $request)
    {
        $new_receipt = new Receipt();
        $new_receipt->fill($request->all());
        $new_receipt->save();
        $receipt_id = Receipt::latest('id')->first()->id;

        $amount = $request->amount;

        return Redirect::to('/check-out/' . $receipt_id)->with(['message'=> 'Receipt Add Successfully','receipt_id'=>$receipt_id,'amount'=>$amount]);
    }
}
