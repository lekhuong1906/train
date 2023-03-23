@extends('pages.login.login_form')
@section('login')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    <form method="post" class="register-form" action="{{url('/sign-in')}}" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-user"></i></label>
                            <input type="email" name="email" placeholder="Your Name"
                                   fdprocessedid="qablcn">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="password" placeholder="Password"
                                   fdprocessedid="c3x7dn">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term">
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit"  class="form-submit" value="Log in" fdprocessedid="6de318">
                        </div>
                    </form>
                    <a href="{{url('/sign-up')}}" class="signup-image-link">Create an account</a>
                </div>
            </div>
        </div>
    </section>
@endsection



