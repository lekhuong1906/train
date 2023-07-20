<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\PasswordReset;
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

    #Sign up
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

    #Profile
    public function profile_customer($id){
        $infor = User::find($id);
        return view('pages.account.profile_customer')->with('info',$infor);
    }
    public function update_profile_customer(Request $request,$id){
        $user = User::where('id',$id)->first();
        $user->fill($request->all());
        $user->save();
        return \redirect()->back()->with('message','Updated Profile Success');
    }

    #Forgot Password
    public function submit_reset_password(Request $request){
        $updatePassword = PasswordReset::where('email',$request->email,'token',$request->token)->latest('created_at')->exists();
        if ($updatePassword == false)
            return \redirect()->back()->with('error','Invalid Token');

        $user = User::where('email',$request->email)->first();
        $user->fill($request->all());
        $user->save();

        return \redirect()->route('customer-login')->with('message','Updated password success');
    }

    public function log_out(){
        Auth::logout();
        return Redirect::to('/');
    }
}
