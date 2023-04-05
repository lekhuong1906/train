<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\TicKet;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function all_ticket(){
        $userId = auth()->id(); // Get the ID of the logged in user

        $all_ticket = Ticket::whereHas('subscription.receipt', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        dd($all_ticket);
        return view('pages.account.all_ticket')->with('all_ticket',$all_ticket);
    }
    public function qrcode($ticket_code){
        $ticket = TicKet::where('ticket_code',$ticket_code)->first();
        $qrcode = QrCode::size(250)->generate($ticket->ticket_code);
        return $qrcode;
    }
}
