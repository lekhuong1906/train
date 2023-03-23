@extends('pages.login.login_form')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="get" class="register-form" action="{{url('/')}}" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="fa-solid fa-user"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your Name"
                                   fdprocessedid="qablcn">
                        </div>
                        <div class="form-group">
                            <label for="your_name"><i class="fa-solid fa-phone"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Phone"
                                   fdprocessedid="qablcn">
                        </div>
                        <div class="form-group">
                            <label for="your_name"><i class="fa-solid fa-id-card"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Identity Card"
                                   fdprocessedid="qablcn">
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="fa-solid fa-envelope"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Email"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Confirm Password"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term">
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>I agree all
                                statements in Terms of service</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"
                                    fdprocessedid="6de318">
                        </div>
                    </form>
                    <a href="#" class="signup-image-link">I already a member</a>

                </div>
            </div>
        </div>
    </section>
@endsection
