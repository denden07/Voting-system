<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('logins/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('logins/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{URL::to('assets/img/logo/background.jpg')}}');">
        <div class="wrap-login100">

            <form autocomplete="off" class="login100-form validate-form" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <img  width="200"  height="100" class="main-logo" style="margin-left: 25%" src="{{URL::to('assets/img/logo/saa.png')}}" alt="" />


                <span class="login100-form-title p-b-34 p-t-27">
						Admin Portal
					</span>

                <div class="wrap-input100 validate-input class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">


                <input autocomplete="off" type="text" placeholder="User Name" class="input100" name="username" value="{{ old('username') }}" >
                {{ csrf_field() }}
                @if ($errors->has('username'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                @endif

                <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="wrap-input100 validate-input">


                <input  type="password" placeholder="Password" class="input100" name="password" required>
                {{ csrf_field() }}
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                    Remember me
                </label>
            </div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Login
                </button>
            </div>

            <div class="text-center p-t-90">
                <a class="txt1" href="#">
                    Forgot Password?
                </a>
            </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('logins/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('logins/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('logins/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('logins/js/main.js')}}"></script>

</body>
</html>