<?php

namespace App\Http\Controllers;

use App\Http\Services\TicketService;

class TicketController extends Controller
{
    protected $service;
    public function __construct(TicketService $ticketService){
        $this->service = $ticketService;
    }
    public function all_ticket(){
        $all_ticket = $this->service->all_ticket();
        return view('pages.account.all_ticket')->with('all_ticket',$all_ticket);
    }
    public function qrCode($ticket_code){
        return $this->service->qrCode($ticket_code);
    }
}
