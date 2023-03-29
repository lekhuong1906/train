<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets//css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-form">
                <h2 class="form-title">Sign In</h2>
                <form method="post" class="register-form" action="{{url('/admin-sign-in')}}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="fa-solid fa-user"></i></label>
                        <input type="email" name="email" placeholder="Your Email"
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
                        <input type="submit" class="form-submit" value="Log in" fdprocessedid="6de318">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
