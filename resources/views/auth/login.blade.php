<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Larashop Admin Login</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/favicon.png')}}"/>

    <!-- Bootstrap -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/css/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('admin/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form role="form" method="post" action="{{ route('login') }}">
                        <h1>@lang('general.login.title')</h1>
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                            <input type="text" class="form-control" id="email" name="email" placeholder="@lang('general.login.email')"/>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                            <input type="password" class="form-control" id="password" name="password" placeholder="@lang('general.login.password')"/>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">@lang('general.login.login')</button>
                            <a class="reset_pass" href="{{route('password.reset')}}">@lang('general.login.lost_your_password')</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Larashop Admin Panel</h1>
                                <p>©2017 All Rights Reserved. Brough to you by <a href="https://tutorials.kode-blog.com" target="_blank">Kode Blog Tutorials</a></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
