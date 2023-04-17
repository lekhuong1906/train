@extends('admin.login.admin_login')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <form method="post" class="register-form" action="{{url('/update-password')}}" >
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-lock"></i></label>
                            <input type="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirm"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password_confirm" placeholder="Confirm Password">
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Update Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
