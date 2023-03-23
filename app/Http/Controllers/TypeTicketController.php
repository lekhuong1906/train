<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\TypeTicket;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Type;

class TypeTicketController extends Controller
{
    public function add_type_ticket(){
        return view('admin.type_tickets.add_type_ticket');
    }
    public function save_type_ticket(Request $request){
        $data = new TypeTicket();
        $data->fill($request->all())->save();
        Session::put('success','Success');
        return Redirect::to('all-type-ticket');
    }
    public function update_type_ticket($id,Request $request){
        $data = TypeTicket::where('id',$id)->first();
        $data->fill($request->all());
        $data->save();
        return Redirect::to('all-type-ticket');
    }
    public function edit_type_ticket($id){
        $ticket_detail = TypeTicket::where('id',$id)->first();
        return view('admin.type_tickets.edit_type_ticket')->with('ticket_detail',$ticket_detail);
    }
    public function all_type_ticket(){
        $all_type_ticket = TypeTicket::get();
        return view('admin.type_tickets.all_type_ticket')->with('all_type_ticket',$all_type_ticket);
    }
}

