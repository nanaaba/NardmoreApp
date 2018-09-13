@extends('layouts.loginLayout')

@section('content')

<div class="container">

    

    <form class="form-signin" id="loginForm">
        <div class="alert alert-block alert-danger fade in" id="errordiv" style="display: none">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="fa fa-times"></i>
        </button>
        <span id="errormsg"></span>
    </div>
        <h2 class="form-signin-heading">sign in </h2>
        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

        <div class="login-wrap">
            <div class="user-login-info">
                <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Keep me logged in
                <span class="pull-right">
                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>



        </div>
    </form>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Forgot Password ?</h4>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->



</div>

@endsection

@section('customjs')
<script type="text/javascript">


    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();

        console.log(formData);

        $('input:submit').attr("disabled", true);

        $.ajax({
            url: "{{url('authenticate')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log('data : ' + data);
                if (data.status == 0) {
                    window.location = "dashboard";
                } else {
                    $('#errordiv').show();
                    $('#errormsg').html(data.message);
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });



    });

</script>

@endsection