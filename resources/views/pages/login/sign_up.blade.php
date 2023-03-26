@extends('pages.login.login_form')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="post" class="register-form" action="{{url('/save-account')}}" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="fa-solid fa-user"></i></label>
                            <input type="text" name="name" placeholder="Your Name"
                                   fdprocessedid="qablcn">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-envelope"></i></label>
                            <input type="email" name="email" placeholder="Email"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" placeholder="Password"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" placeholder="Confirm Password"
                                   fdprocessedid="c3x7dn">
                        </div>


                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Sign up"
                                    fdprocessedid="6de318">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
