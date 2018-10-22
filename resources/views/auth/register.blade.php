@extends('layout.auth')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="/register"><b>Register</b></a>
    </div>

    <div class="register-box-body">
        @if(!empty(session('messages')))
        <div class="alert alert-success alert-sm" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('messages') }}
        </div>
        @endif

        @if(count($errors) > 0) 
            <div class="alert alert-danger alert-sm" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @foreach($errors->all() as $err) 
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{ route('post.register') }}" method="post" class="register_form">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" name="user_name" class="form-control" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <p class="label-error">The name field is required</p>
            </div>
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
            <div class="form-group has-feedback">
                <input type="password" name="re_password" class="form-control" placeholder="Retype password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                <p class="label-error">The re_password field is equal the password field </p>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat btn-register">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function () {
            $(".btn-register").click(function () {
                var user_name = $("input[name='user_name']").val();
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();
                var re_password = $("input[name='re_password']").val();

                var allowed = true;

                if(user_name == ""){
                    $("input[name='user_name']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }
                
                var regex_mail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(!regex_mail.test(email)){
                    $("input[name='email']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }
                
                if(password == "") {
                    $("input[name='password']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }else if(password != re_password){
                    $("input[name='re_password']").closest('.form-group').find('.label-error').fadeIn();
                    allowed = false;
                }

                if(allowed) {
                    $(".register_form").submit();
                }
            }); 

            $("input").keyup(function () {
                $(this).closest('.form-group').find('.label-error').fadeOut();
            })
        })
    </script>
@endsection