<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function admin_login(){
        return view('admin.login.admin_login');
    }
    public function sign_in(Request $request){
        $user = User::where('email',$request->email)->where('password',md5($request->password))->where('level_account',1)->first();
        if ($user !== null){
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }
        return redirect()->back();
    }
    public function dashboard(){
        return view('admin.dashboard.content');
    }
    public function log_out(){
        Auth::logout();
        return Redirect::to('admin-login');
    }
}
