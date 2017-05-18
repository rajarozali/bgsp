<!DOCTYPE html>
<html>
<head>
    <title>CRUD Laravel Ajax </title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base_url" content="{{url('')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/select2/css/select2.min.css')}}">
    {{--multi ajax uploader--}}
    <link rel="stylesheet" href="{{url('assets/vendors/dropzone/css/basic.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/dropzone/css/dropzone.min.css')}}">
    <!-- Related css to this page --><!-- don't remove this comment -->
    {{--<link rel="stylesheet" href="{{url('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">--}}

    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    <link rel="stylesheet" href="{{url('assets/css/yep-style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/yep-vendors.css')}}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('assets/img/favicon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('assets/img/favicon/favicon.ico')}}" type="image/x-icon">
    <script type="text/javascript" src="{{url('assets/vendors/jquery/jquery.min.js')}}"></script>
    <style>
        .main {
            min-height: 725px;
        }
    </style>
</head>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i>Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{url('assets/vendors/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-searchable/js/jquery.searchable.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-fullscreen/js/jquery.fullscreen.min.js')}}"></script>

<!-- Yeptemplate JS Script --><!-- Please use *.min.js in production -->
<script type="text/javascript" src="{{url('assets/js/yep-script.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/yep-demo.min.js')}}"></script>

<script type="text/javascript" src="{{url('assets/vendors/jquery-require/jquery.require.min.js')}}"></script>

<!-- Related JavaScript Library to This Pagee -->
{{--<script type="text/javascript" src="{{url('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script><!-- Use for input mask -->--}}
<script type="text/javascript" src="{{url('assets/vendors/nprogress/js/nprogress.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/dropzone/js/dropzone.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/ckeditor/js/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/morrisjs/js/raphael.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/morrisjs/js/morris.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/easy-pie-chart/js/jquery.easypiechart.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/select2/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/plugin.js')}}"></script>


<!-- Yeptemplate Vendors JS Script --><!-- Please use *.min.js in production -->
<script type="text/javascript" src="{{url('assets/js/yep-vendors.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/yep-custom.js')}}"></script>

</body>
</html>