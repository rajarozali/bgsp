<!DOCTYPE html>
<html>
<head>
    <title>Golabi - Request List </title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base_url" content="{{url('')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.min.css')}}">
    <script type="text/javascript" src="{{url('assets/vendors/jquery/jquery.min.js')}}"></script>

    <!-- Related css to this page --><!-- don't remove this comment -->
    {{--<link rel="stylesheet" href="{{url('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">--}}


    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    <link rel="stylesheet" href="{{url('assets/css/yep-style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/yep-vendors.css')}}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{url('assets/img/favicon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('assets/img/favicon/favicon.ico')}}" type="image/x-icon">

</head>
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<!-- main content  -->
<div id="main" class="main">
    <div class="row">
        <!-- main content -->
        <div id="content">

            <div class="col-md-12 text-center">
                <h1 class="error-title">404</h1>
                <h3 class="bold">Oops, an error has occurred. Page not found!</h3>

                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                        <form action="#" class="main-search" >
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search..." >
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                            </div>
                            <br>
                            <div class="well">
                                <h5 class="bold">Try one of the following:</h5>
                                <ul class="list-unstyled margin-left-15" >
                                    <li>
                                        <i class="bold fa fa-hand-o-right"></i>
                                        Re-check the url
                                    </li>
                                    <li>
                                        <i class="bold fa fa-hand-o-right"></i>
                                        Read the faq
                                    </li>
                                    <li>
                                        <i class="bold fa fa-hand-o-right"></i>
                                        Tell us about it
                                    </li>
                                </ul>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="javascript:history.back()" class="btn btn-default btn-block">
                                        <i class=" fa fa-arrow-left"></i>
                                        Go Back
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{url('/dashboard')}}" class="btn btn-primary btn-block">
                                        <i class=" fa fa-tachometer"></i>
                                        Dashboard
                                    </a>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div><!-- end #content -->
    </div><!-- end .row -->
</div>
<!-- ./end #main  -->
