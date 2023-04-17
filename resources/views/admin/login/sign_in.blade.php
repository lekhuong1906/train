@extends('admin.login.admin_login')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <form method="post" class="register-form" action="{{url('/admin-sign-in')}}" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-user"></i></label>
                            <input type="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <a href="{{url('/forgot-password')}}" style="color: #0dcaf0">Forgot Password</a>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
