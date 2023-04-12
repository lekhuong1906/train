<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\MailSuccess;
use App\Models\Receipt;
use App\Models\TicKet;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use MongoDB\Driver\Session;

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
}
