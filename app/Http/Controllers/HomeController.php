<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\TypeTicket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function home(){
        $all_type_ticket = TypeTicket::get();
        return view('pages.homes.ticket_detail')->with('all_type_ticket',$all_type_ticket);
    }
    public function payment(){
        return view('pages.payments.payment');
    }
    public function login(){

        return view('pages.login.sign_in');
    }
    public function sign_in(UserFormRequest $request){
        $customer = User::where('email',$request->email)->where('password',md5($request->password))->where('level_account',0)->first();
        if ($customer !== null){
            Auth::login($customer);
            return redirect()->intended('/');
        }
        return back()->with([
            'info' => 'Login fail. Checking for Email or Password!',
        ])->onlyInput('email');
    }
    public function sign_up(){
        return view('pages.login.sign_up');
    }
    public function save_account(UserFormRequest $request){
        $new_account = new User();
        $new_account->fill($request->all());
        $new_account['level_account']=0;
        $new_account->save();
        return redirect('/login');
    }
    public function profile_customer($id){
        $infor = User::find($id);
        return view('pages.account.profile_customer')->with('info',$infor);
    }

    public function log_out(){
        Auth::logout();
        return Redirect::to('/');
    }
}
