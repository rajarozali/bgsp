<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yep template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href='{{url("front_end/css/bootstrap.min.css")}}' type="text/css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href='{{("front_end/font-awesome/css/font-awesome.min.css")}}' type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href='{{url("front_end/css/animate.min.css")}}' type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href='{{url("front_end/css/creative.css")}}' type="text/css">



</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li @if(Request::segment(1)=='') class="active" @endif>
                    <a href="{{url('/')}}">{{ trans('creative.home') }}</a>
                </li>
                <li @if(Request::segment(1)=='news') class="active" @endif>
                    <a href="{{url('news')}}">{{ trans('creative.news') }}</a>
                </li>
                <li @if(Request::segment(1)=='shop') class="active" @endif>
                    <a href="{{url('shop')}}">{{ trans('creative.shop') }}</a>
                </li>
                <li @if(Request::segment(1)=='contact') class="active" @endif>
                    <a href="{{url('contact')}}">{{ trans('creative.contact') }}</a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                    <ul class="dropdown-menu" style="min-width: 200px;">
                        <li><div class="col-sm-12">
                                <div id="imaginary_container">
                                    <div class="input-group stylish-input-group input-append">
                                        <input type="text" class="form-control"  placeholder="{{ trans('creative.search') }}" >
											<span class="input-group-addon" style="padding:0px">
												<button type="submit">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
											</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <!--li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language fa-lg primary"></i></span></a>
                    <ul class="dropdown-menu">
                        <li class="@if(Session::get('lang')=='en') active @endif"><a href="{{url('/admin/language?lang=en')}}">English </a></li>
                        <li class="@if(Session::get('lang')=='ar') active @endif"><a href="{{url('/admin/language?lang=ar')}}">Arabic </a></li>
                        <li class="@if(Session::get('lang')=='pt') active @endif"><a href="{{url('/admin/language?lang=pt')}}">Brazil </a></li>
                    </ul>
                </li-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        @if(!isset(Auth::user()->name))
                        <li><a href="{{url("/auth/login")}}" class="btn btn-inverse"><i class="fa fa-lock"></i>  {{ trans('creative.login') }}</a></li>
                        @endif
                        @if(isset(Auth::user()->name))
                        <li><a href="{{url("/admin/dashboard")}}" class="btn btn-inverse"><i class="fa fa-dashboard"></i>  {{ trans('creative.dashboard') }}</a></li>
                        @endif
                    </ul>
                </li>
                <!--div class="btn-group dropdown">
                    <button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                        <li>
                            <form class="login-form margin-clear">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" placeholder="">
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" placeholder="">
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                                <button type="submit" class="btn btn-gray btn-sm">Log In</button>
                                <span class="pl-5 pr-5">or</span>
                                <button type="submit" class="btn btn-default btn-sm">Sing Up</button>
                                <ul>
                                    <li><a href="#">Forgot your password?</a></li>
                                </ul>
                            </form>
                        </li>
                    </ul>
                </div-->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

@yield('content')

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 footer-widget">
                    <h3>{{ trans('creative.statistics') }}</h3>

                    <span>{{ trans('creative.content1') }}</span>

                    <div class="stats">
                        <div class="line">
                            <span class="counter">27</span>
                            <span class="caption">{{ trans('creative.articles') }}</span>
                        </div>
                        <div class="line">
                            <span class="counter">208</span>
                            <span class="caption">{{ trans('creative.comments') }}</span>
                        </div>
                        <div class="line">
                            <span class="counter">2</span>
                            <span class="caption">{{ trans('creative.authors') }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 footer-widget">
                    <h3>{{ trans('creative.recent_posts') }}</h3>
                    <div class="post-recent-widget">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media">
                                    <a class="pull-left" href="post-video.html"><img class="media-object" src='{{url("front_end/img/img2.jpg")}}' width="80" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="post-video.html">But I've never been to the moon!</a></h4>
                                        <p class="post-date">may 10, 2014</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="post-typography.html"><img class="media-object" src='{{url("front_end/img/img1.jpg")}}' width="80" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="post-typography.html">We don't have a brig</a></h4>
                                        <p class="post-date">september 27, 2014</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <a class="pull-left" href="post-image.html"><img class="media-object" src='{{url("front_end/img/img3.jpg")}}' width="80" alt=""></a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="post-image.html">Every other day it's food, food, food.</a></h4>
                                        <p class="post-date">april 2, 2014</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 footer-widget clearfix">
                    <h3>Tags</h3>
                    <ul class="tags">
                        <li><a href="#">OpenPGP</a></li>
                        <li><a href="#">Django</a></li>
                        <li><a href="#">Bitcoin</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">GNU/Linux</a></li>
                        <li><a href="#">Git</a></li>
                        <li><a href="#">Homebrew</a></li>
                        <li><a href="#">Debian</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container" style="margin-top:15px">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4" style="text-align: -webkit-center;">
                    <ul class="list-inline social-buttons">
                        <a href="http://www.twitter.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="http://www.facebook.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="http://www.linkedin.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="http://www.skype.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-skype fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="http://plus.google.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                        </a>
                        <a href="http://www.youtube.com" class="fa-stack">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
                        </a>
                    </ul>
                </div>
                <div class="col-md-4" style="text-align: -webkit-right;">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src='{{url("front_end/js/jquery.js")}}'></script>

<!-- Bootstrap Core JavaScript -->
<script src='{{url("front_end/js/bootstrap.min.js")}}'></script>

<!-- Plugin JavaScript -->
<script src='{{url("front_end/js/jquery.easing.min.js")}}'></script>
<script src='{{url("front_end/js/jquery.fittext.js")}}'></script>
<script src='{{url("front_end/js/wow.min.js")}}'></script>


<script src='{{url("front_end/js/classie.js")}}'></script>
<script src='{{url("front_end/js/cbpAnimatedHeader.js")}}'></script>

<!-- Contact Form JavaScript -->
<script src='{{url("front_end/js/jqBootstrapValidation.js")}}'></script>
<script src='{{url("front_end/js/contact_me.js")}}'></script>

<!-- Custom Theme JavaScript -->
<script src='{{url("front_end/js/creative.js")}}'></script>

</body>

</html>

