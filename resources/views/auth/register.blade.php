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
<body class="login-page">
<canvas id="spiders" class="hidden-xs" ></canvas>
<div class="">
    <div style="margin: 5% auto; position: relative; width: 500px;">
        
            <div class="panel panel-default">
                <div class="panel-heading"><b>Register</b></div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-7">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="name" value="{{ old('name') }}">
								</div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-7">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								</div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-7">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" name="password">
								</div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-7">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-retweet"></i></span>
									<input type="password" class="form-control" name="password_confirmation">
								</div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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