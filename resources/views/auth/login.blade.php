
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/backend/img/policymaker.ico') }}" type="image/x-icon" />
</head>
<body class="hold-transition login-page">




<div class="login-box">
    <div class="login-logo">
        <h1><b>Systéme de Management </h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" autofocus required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <br>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong><i class="icon fa fa-ban"></i> Alert!</strong> &nbsp; {{ $errors->first('email') }}
                    </div>
                @endif

            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control btn-flat" placeholder="Password" value="{{ old('password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-group has-feedback">
                <div class="social-auth-links text-center">

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                </div>
                <!-- /.col -->
            </div>

            <div class="form-group has-feedback">
                <div class="col-xs-12">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> &nbsp; Remember Me
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.social-auth-links -->

            <p>- OR -</p>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-fw fa-key"></i> Forgot Password ?</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-fw fa-user-plus"></i> Sign Up</a>
            @endif
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{  asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{  asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>
<!-- iCheck -->
<script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>


















{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
