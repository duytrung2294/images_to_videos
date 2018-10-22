@extends('layout.auth')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Login</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if(!empty(session('fail_mess')))
        <div class="alert alert-warning alert-sm" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('fail_mess') }}
        </div>
        @endif

        <form action="{{ route('post.login') }}" method="post" class="login_form">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <p class="label-error">The email field is required</p>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <p class="label-error">The password field is required</p>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat btn-login">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <a href="#">I forgot my password</a><br>
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function () {
            $(".btn-login").click(function () {
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();

                var allowed = true;

                var regex_mail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(!regex_mail.test(email)){
                    $("input[name='email']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }
                
                if(password == "") {
                    $("input[name='password']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }

                if(allowed) {
                    $(".login_form").submit();
                }
            }); 

            $("input").keyup(function () {
                $(this).closest('.form-group').find('.label-error').fadeOut();
            })
        })
    </script>
@endsection