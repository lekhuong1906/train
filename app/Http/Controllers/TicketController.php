<?php

namespace App\Http\Controllers;

use App\Models\TicKet;
use App\Models\TypeTicket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function all_ticket(){
        $all_ticket = TicKet::all();
        return view('pages.account.all_ticket')->with('all_ticket',$all_ticket);
    }
    public function ticket_qrcode($id){
        $ticket = TicKet::where('id',$id)->first();
        $qrcode = QrCode::size(250)->generate($ticket->ticket_code);
        return view('pages.account.ticket_detail')->with('qrcode',$qrcode);
    }
}
