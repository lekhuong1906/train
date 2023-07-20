<?php

namespace App\Http\Controllers;

use App\Models\TicKet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CheckedController extends Controller
{
    public function checked_ticket(){
        return view('checked_ticket.check_ticket');
    }
    public function submit_checked_ticket(Request $request){
        $data = TicKet::where('ticket_code',$request->ticket_code)->exists();
        if ($data)
            return redirect()->back()->with('message','Invalid');
        return redirect()->back()->with('error','Invalid');
    }
}
