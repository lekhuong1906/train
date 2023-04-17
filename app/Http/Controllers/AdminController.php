<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Mail\MailPasswordReset;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin_login(){
        return view('admin.login.sign_in');
    }
    public function sign_in(UserFormRequest $request){
        $user = User::where('email',$request->email)->where('password',md5($request->password))->where('level_account',1)->first();
        if ($user !== null){
            Auth::login($user, true);
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('error','Login Fail, Check in My email or Password');
    }

    public function new_user(){
        return view('admin.users.new_user');
    }
    public function add_user(Request $request){
        $profile = new User();
        $profile->fill($request->all());
        $profile->save();
        return view('admin.users.profile')->with('message','Add User Success');
    }
    public function all_user(){
        $users = User::typeAccount()->paginate(5);
        return view('admin.users.all_user')->with('users',$users);
    }

    public function profile($id){
        $user = User::find($id);
        return view('admin.users.profile')->with('user',$user);
    }
    public function update_profile($id, Request $request){
        $profile = User::find($id);
        $profile->fill($request->all());
        $profile->save();
        return redirect()->route('profile')->with('message','Update Profile Success');
    }
    public function delete_user($id){
        User::where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Account User Success');
    }

    public function forgot_password(){
        return view('admin.login.reset_password.forgot_password');
    }

    public function submit_forgot_password(Request $request){
        $data = [
            'email'=> $request->email,
            'token'=> Str::random(64),
        ];
        $passwordReset = new PasswordReset();
        $passwordReset->fill($data);
        $passwordReset->save();

        #Send mail
        Mail::to($data['email'])->send(new MailPasswordReset($data['token']));

        return \redirect()->back()->with('message','Send Token Success. Please check email to get link reset password');
    }

    public function reset_password(){
        return view('admin.login.reset_password.reset_password');
    }

    public function submit_reset_password(Request $request){
        $updatePassword = PasswordReset::where('email',$request->email,'token',$request->token)->latest('created_at')->exists();
        if ($updatePassword == false)
            return \redirect()->back()->with('error','Invalid Token');

        $user = User::where('email',$request->email)->first();
        $user->fill($request->all());
        $user->save();
        if($user->level_account)
            return \redirect()->route('admin-login')->with('message','Updated password success');;
        return \redirect()->route('customer-login')->with('message','Updated password success');
    }

    public function log_out(){
        Auth::logout();
        return Redirect::to('admin-login');
    }
}
