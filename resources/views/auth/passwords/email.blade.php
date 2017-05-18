<!DOCTYPE html>
<html>
<head>
    <title>Login page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('assets/vendors/animate/css/animate.min.css')}}">

    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    <link rel="stylesheet" href="{{url('assets/css/yep-style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/yep-vendors.css')}}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('assets/img/favicon/favicon.ico')}}"  type="image/x-icon">
    <link rel="icon" href="{{url('assets/img/favicon/favicon.ico')}}" type="image/x-icon">
</head>
<body>
<div class="">
    <div style="margin: 5% auto; position: relative; width: 450px;">
        <div id="sign-form" class="panel panel-default">
                <div class="panel-heading"><b>Reset Password</b></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- General JS script library-->
<script type="text/javascript" src="{{url('assets/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Yeptemplate JS Script --><!-- Please use *.min.js in production -->
<script type="text/javascript" src="{{url('assets/js/yep-script.js')}}"></script>


</body>
</html>