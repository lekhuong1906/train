<?php


namespace App\Http\Services;


use App\Models\Subscription;
use App\Models\TicKet;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketService
{
    #Show All Ticket of User
    public function all_ticket(){
        $userId = auth()->id();
        $all_subscription = Subscription::where('user_id',$userId)->orderby('id','desc')->get();
        $all_ticket = array();
        foreach ($all_subscription as $value){
            $data = TicKet::where('payment_id',$value->id)->first();
            array_push($all_ticket,$data);
        }
        return $all_ticket;
    }

    #QrCode
    public function qrCode($ticket_code){
        $ticket = TicKet::where('ticket_code',$ticket_code)->first();
        $qrcode = QrCode::size(250)->generate($ticket->ticket_code);
        return $qrcode;
    }






    #Create ticket
    public function create_ticket($payment_id)
    {
        $data = [
            'payment_id' => $payment_id,
            'ticket_code' => $this->create_ticket_code(),
            'day_start' => $this->day_start($payment_id),
            'day_end' => $this->day_end($payment_id),
            'ticket_status' => $this->ticket_status($payment_id),
        ];
        $new_ticket = new TicKet();
        $new_ticket->fill($data);
        $new_ticket->save();
    }


    public function day_start($payment_id)
    {
        $payment = Subscription::where('id', $payment_id)->first();
        if ($payment->stripe_status)
            return date_format($payment->created_at, 'Y-m-d');
    }

    public function day_end($payment_id)
    {
        $payment = Subscription::where('id', $payment_id)->first();
        $date = new Carbon($payment->created_at);
        $total_day =  $payment->receipt->type_ticket->total_day;
        $date->addDays($total_day);
        $date->toDateString();
        if ($payment->stripe_status)
            return $date;
    }

    public function ticket_status($payment_id)
    {
        $payment = Subscription::where('id', $payment_id)->first();
        $date_now = $this->day_end($payment->id);
        if ($date_now->isPast())
            return 0;
        return 1;
    }

    public function create_ticket_code(){
        $now = Carbon::now()->format('dmYhis');
        return 'TK' . $now;
    }



}
