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
            Auth::login($user, true);
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('message','Login Fail, Check in My email or Password');
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

    public function log_out(){
        Auth::logout();
        return Redirect::to('admin-login');
    }
}
