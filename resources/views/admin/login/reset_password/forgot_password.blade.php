@extends('admin.login.admin_login')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Forgot Password</h2>
                    <form method="post" class="register-form" action="{{url('/submit-forgot-password')}}" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-user"></i></label>
                            <input type="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Send Token">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
