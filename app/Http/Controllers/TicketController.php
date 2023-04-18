<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Subscription;
use App\Models\TicKet;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function all_ticket(){
        $userId = auth()->id();
        $all_subscription = Subscription::where('user_id',$userId)->orderby('id','desc')->get();
        $all_ticket = array();
        foreach ($all_subscription as $value){
            $data = TicKet::where('payment_id',$value->id)->first();
            array_push($all_ticket,$data);
        }
        return view('pages.account.all_ticket')->with('all_ticket',$all_ticket);
    }
    public function qrcode($ticket_code){
        $ticket = TicKet::where('ticket_code',$ticket_code)->first();
        $qrcode = QrCode::size(250)->generate($ticket->ticket_code);
        return $qrcode;
    }
}
