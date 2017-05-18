<!DOCTYPE html>
<html>
<head>
    <title>CRUD Laravel Ajax </title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base_url" content="{{url('')}}" id="base_url"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/select2/css/select2.min.css')}}">
    @if(Session::get('lang')==='ar')
        <link rel="stylesheet" href="{{url('assets/css/yep-rtl.min.css')}}">
    @endif
    {{--multi ajax uploader--}}
    <link rel="stylesheet" href="{{url('assets/vendors/dropzone/css/basic.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/dropzone/css/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/ui-select/css/select.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/angular-wizard/css/angular-wizard.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/angular-ui-notification/css/angular-ui-notification.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/sweetalert/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-duallistbox/css/bootstrap-duallistbox.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/bootstrap-daterangepicker/css/daterangepicker.min.css')}}">
    <!-- Related css to this page --><!-- don't remove this comment -->
    {{--<link rel="stylesheet" href="{{url('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">--}}

    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    <link rel="stylesheet" href="{{url('assets/css/yep-style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/yep-custom.css')}}">
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

<body id="mainbody"  @if(Session::get('lang')==='ar')class="rtl" @endif lang="{{Session::get('lang')}}">
<div id="container" class="container-fluid skin-3 ">

    <header id="header">
        <nav class="navbar navbar-default nopadding" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <button type="button" id="menu-open" class="navbar-toggle menu-toggler pull-left">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="logo-panel">
                    <img src="{{url('assets/img/logo.png')}}" alt="PLMB">
                </a>
            </div>
            <form action="#" class="form-search-mobile pull-right">
                <input id="search-fld" class="search-mobile" type="text" name="param" placeholder="Search ...">
                <button id="submit-search-mobile" type="submit">
                    <i class="fa fa-search"></i>
                </button>
                <a href="#" id="cancel-search-mobile" title="Cancel Search"><i class="fa fa-times"></i></a>
            </form>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li id="search-show-li" class="dropdown">
                        <a href="#" id="search-mobile-show" class="dropdown-toggle" >
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language fa-lg primary"></i></span></a>
                        <ul class="dropdown-menu">
                            <li class="@if(Session::get('lang')=='en') active @endif"><a href="{{url("/admin/language?lang=en")}}">English </a></li>
                            <li class="@if(Session::get('lang')=='ar') active @endif"><a href="{{url("/admin/language?lang=ar")}}">Arabic </a></li>
                            <li class="@if(Session::get('lang')=='pt') active @endif"><a href="{{url("/admin/language?lang=pt")}}">Brazil </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img alt="{{isset(Auth::user()->name)?Auth::user()->name:''}}" src="{{ \Session::get('avatar_url') }}" height="50" width="50" class="img-circle" />
                            {{isset(Auth::user()->name)?Auth::user()->name:''}}
                            <strong class="caret"></strong>
							 
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url("admin/users")}}">{{ trans('main.profile') }}<span class="fa fa-user pull-right"></span></a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="{{url("/auth/logout")}}">{{ trans('main.sign_out') }}<span class="fa fa-power-off pull-right"></span></a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li id="fullscreen-li">
                        <a href="#" id="fullscreen" class="dropdown-toggle" >
                            <i class="fa fa-arrows-alt"></i>
                        </a>
                    </li>

                    <li id="side-hide-li" class="dropdown">
                        <a href="#" id="side-hide" class="dropdown-toggle" >
                            <i class="fa fa-reorder"></i>
                        </a>
                    </li>
                </ul>
                <!-- search form in header -->
                <form class="navbar-form navbar-right" >
                    <div class="form-group">
                        <input type="text" class="form-control search-header" placeholder="{{ trans('main.enter_keyword') }}" />
                        <button type="submit" class="btn btn-link search-header-btn" >
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

        </nav>
    </header>

    <!-- sidebar menu -->
    <div id="sidebar" class="sidebar" >
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs nav-justified">
                    <li id="tab_menu_a" class="active">
                        <a href="#tab_menu_1" data-toggle="tab">
                            <i class="fa fa-reorder"></i>
                        </a>
                    </li>
                    <li id="contact-tab">
                        <a href="#tab_contact_2" data-toggle="tab">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                    <li id="report-tab">
                        <a href="#tab_report_3" data-toggle="tab">
                            <i class="fa fa-pie-chart"></i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_menu_1">
                        <form class="search-menu-form" >
                            <div class="">
                                <input id="menu-list-search" placeholder="{{ trans('main.search_menu') }}" type="text" class="form-control search-menu">
                            </div>
                        </form>

                        <!-- sidebar Menu -->
                        <div id="MainMenu" class="">

                            <ul id="menu-list" class="nav nav-list">

                                <li class="separate-menu"><span>{{ trans('main.configurations') }}</span></li>

                                <li class="@if(Request::segment(2)=='users' || Request::segment(2)=='permissions' || Request::segment(2)=='roles') active open @endif">
                                    <a href="{{url('/admin/users')}}" class="dropdown-toggle">
                                        <i class="menu-icon fa fa-user"></i>
                                        <span class="menu-text"> {{ trans('main.users_management') }}</span>
                                        <b class="arrow fa fa-angle-down"></b>
                                    </a>
                                    <b class="arrow"></b>
                                    <ul class="submenu">
                                        @permission('view_permission')
                                        <li class="@if(Request::segment(2)=='permissions') active @endif">
                                            <a href="{{url('/admin/permissions')}}" >
                                                <i class="menu-icon fa fa-list"></i>
                                                <span class="menu-text"> {{ trans('main.permissions') }} </span>
                                            </a>
                                        </li>
                                        @endpermission
                                        @permission('view_role')
                                        <li class="@if(Request::segment(2)=='roles') active @endif">
                                            <a href="{{url('/admin/roles')}}">
                                                <i class="menu-icon fa fa-bar-chart-o"></i>
                                                <span class="menu-text"> {{ trans('main.roles') }} </span>
                                            </a>
                                        </li>
                                        @endpermission
                                        @permission('view_user')
                                        <li class="@if(Request::segment(2)=='users') active @endif">
                                            <a href="{{url('/admin/users')}}">
                                                <i class="menu-icon fa fa-desktop"></i>
                                                <span class="menu-text"> {{ trans('main.users') }}</span>
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                        @endpermission

                                    </ul>
                                </li>


                                @if(isset($module_menus))
                                    @foreach($module_menus as $module_menu)
                                        <li class="@if(($module_menu['child']>""&&in_array(Request::segment(2),$module_menu['child'])||Request::segment(2)==$module_menu['name'])) active open @endif">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-user"></i>
                                                <span class="menu-text"> {{$module_menu['name'].' module'}}</span>
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>
                                            <ul class="submenu">
                                                <li class="@if(Request::segment(2)==$module_menu['name']) active @endif">
                                                    <a href="{{url('/admin/'.$module_menu['name'])}}">
                                                        <i class="menu-icon fa fa-tachometer"></i>
                                                        <span class="menu-text"> {{ $module_menu['name'] }} </span>
                                                    </a>
                                                    <b class="arrow"></b>
                                                </li>
                                                @if($module_menu['child']>"")
                                                    @foreach($module_menu['child'] as $val)
                                                        <li class="@if(Request::segment(2)==$val) active @endif">
                                                            <a href="{{url('/admin/'.$val)}}">
                                                                <i class="menu-icon fa fa-tachometer"></i>
                                                                <span class="menu-text"> {{ $val }} </span>
                                                            </a>
                                                            <b class="arrow"></b>
                                                        </li>
                                                    @endforeach

                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="separate-menu"><span>{{ trans('main.sample_module') }}</span></li>
                                <li class="@if(Request::segment(2)=='dashboard') active @endif">
                                    <a href="{{url('/admin/dashboard')}}">
                                        <i class="menu-icon fa fa-tachometer"></i>
                                        <span class="menu-text"> {{ trans('main.dashboard') }} </span>
                                    </a>
                                    <b class="arrow"></b>
                                </li>
                                @permission('view_news')
                                <li class="@if(Request::segment(2)=='news') active @endif">
                                    <a href="{{url('/admin/news')}}">
                                        <i class="menu-icon fa fa-pencil-square-o"></i>
                                        <span class="menu-text"> {{ trans('main.news') }} </span>
                                    </a>
                                </li>
                                @endpermission
                                @permission('view_news_category')
                                <li class="@if(Request::segment(2)=='news_category') active @endif">
                                    <a href="{{url('/admin/news_category')}}">
                                        <i class="menu-icon fa fa-pencil-square-o"></i>
                                        <span class="menu-text"> {{ trans('main.news_category') }} </span>
                                    </a>
                                </li>
                                @endpermission
								@permission('add_module')
                                <li class="@if(Request::segment(2)=='modules') active @endif">
                                    <a href="{{url('/admin/modulesbuilder')}}">
                                        <i class="menu-icon fa fa-pencil-square-o"></i>
                                        <span class="menu-text">  Module builder </span>
                                    </a>
                                </li>
                                @endpermission
                                @permission('view_relation')
                                <li class="@if(Request::segment(2)=='relation') active @endif">
                                    <a href="{{url('/admin/relation')}}">
                                        <i class="menu-icon fa fa-exchange"></i>
                                        <span class="menu-text"> Relation </span>
                                    </a>
                                </li>
                                @endpermission
                                @permission('view_ReportBuilder')
                                <li class="@if(Request::segment(2)=='reportbuilders') active @endif">
                                    <a href="{{url('/admin/reportbuilders')}}">
                                        <i class="menu-icon fa fa-line-chart"></i>
                                        <span class="menu-text">  Report builders </span>
                                    </a>
                                </li>
                                @endpermission
                                @permission('view_activity_log')
                                <li class="@if(Request::segment(2)=='activitylogs') active @endif">
                                    <a href="{{url('/admin/activitylogs')}}">
                                        <i class="menu-icon fa fa-history"></i>
                                        <span class="menu-text"> Activity Logs </span>
                                    </a>
                                </li>
                                @endpermission
                                <li class="separate-menu"><span>HTML template</span></li>
                                <li class="">
                                    <a href="{{url("/html_version/form-elements.html")}}"  >
                                        <i class="menu-icon fa fa-desktop"></i>
                                        <span class="menu-text">Admin template</span>


                                    </a>

                                    <b class="arrow"></b>

                                </li>


                            </ul>


                            <a class="sidebar-collapse" id="sidebar-collapse" data-toggle="collapse" data-target="#test">
                                <i id="icon-sw-s-b" class="fa fa-angle-double-left"></i>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_contact_2">

                        <div class="search-menu-form" role="search">
                            <div class="">
                                <input id="contact-list-search" placeholder="{{ trans('main.search_contact') }}" type="text" class="form-control search-menu">
                                <a href="#modal-add-contact" data-toggle="modal" class="btn-modal btn-link" title="{{ trans('main.add_contact') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>


                        <ul class="list-group" id="contact-list">
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-6-ct.jpg')}}" alt="Scott Stevens" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9 ">
                                    <span class="name">Scott Stevens</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5842 Hillcrest Rd"></span>
                                    <span class="visible-xs"> <span class="text-muted">5842 Hillcrest Rd</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(870) 288-4149"></span>
                                    <span class="visible-xs"> <span class="text-muted">(870) 288-4149</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="scott.stevens@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">scott.stevens@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-7-ct.jpg')}}" alt="Seth Frazier" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9 ">
                                    <span class="name">Seth Frazier</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="7396 E North St"></span>
                                    <span class="visible-xs"> <span class="text-muted">7396 E North St</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(560) 180-4143"></span>
                                    <span class="visible-xs"> <span class="text-muted">(560) 180-4143</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="seth.frazier@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">seth.frazier@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>

                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-8-ct.jpg')}}" alt="Todd Shelton" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="name">Todd Shelton</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5133 Pecan Acres Ln"></span>
                                    <span class="visible-xs"> <span class="text-muted">5133 Pecan Acres Ln</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(522) 991-3367"></span>
                                    <span class="visible-xs"> <span class="text-muted">(522) 991-3367</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="todd.shelton@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">todd.shelton@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-9-ct.jpg')}}" alt="Rosemary Porter" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="name">Rosemary Porter</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5267 Cackson St"></span>
                                    <span class="visible-xs"> <span class="text-muted">5267 Cackson St</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(497) 160-9776"></span>
                                    <span class="visible-xs"> <span class="text-muted">(497) 160-9776</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="rosemary.porter@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">rosemary.porter@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-10-ct.jpg')}}" alt="Debbie Schmidt" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <span class="name">Debbie Schmidt</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="3903 W Alexander Rd"></span>
                                    <span class="visible-xs"> <span class="text-muted">3903 W Alexander Rd</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(867) 322-1852"></span>
                                    <span class="visible-xs"> <span class="text-muted">(867) 322-1852</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="debbie.schmidt@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">debbie.schmidt@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li class="list-group-item">
                                <div class="col-xs-12 col-sm-3 avatar-contact">
                                    <img src="{{url('assets/img/avatars/avatar-11-ct.jpg')}}" alt="Glenda Patterson" class="img-responsive img-flat" />
                                </div>
                                <div class="col-xs-12 col-sm-9 ">
                                    <span class="name">Glenda Patterson</span><br/>
                                    <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="5020 Poplar Dr"></span>
                                    <span class="visible-xs"> <span class="text-muted">5020 Poplar Dr</span><br/></span>
                                    <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip" title="(538) 718-7548"></span>
                                    <span class="visible-xs"> <span class="text-muted">(538) 718-7548</span><br/></span>
                                    <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="glenda.patterson@example.com"></span>
                                    <span class="visible-xs"> <span class="text-muted">glenda.patterson@example.com</span><br/></span>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>

                    </div>
                    <div class="tab-pane " id="tab_report_3">
                        <div class="search-menu-form" role="search">
                            <div class="">
                                <input id="task-list-search" placeholder="{{ trans('main.search_task') }}" type="text" class="form-control search-menu">
                                <a href="#modal-add-task" data-toggle="modal" class="btn-modal btn-link" title="{{ trans('main.add_task') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="task-content tasks-widget">
                            <ul id="sortable" class="task-list ui-sortable">
                                <li class="list-primary">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp">Flatlab is Modern Dashboard</span>
                                        <span class="badge badge-sm label-success">2 {{ trans('main.days') }}</span>

                                    </div>
                                </li>

                                <li class="list-danger">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Fully Responsive &amp; Bootstrap 3.0.2 Compatible </span>
                                        <span class="badge badge-sm label-danger">{{ trans('main.done') }}</span>

                                    </div>
                                </li>
                                <li class="list-success">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Daily Standup Meeting </span>
                                        <span class="badge badge-sm label-warning">{{ trans('main.company') }}</span>

                                    </div>
                                </li>
                                <li class="list-warning">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Write well documentation for this theme </span>
                                        <span class="badge badge-sm label-primary">3 {{ trans('main.days') }}</span>

                                    </div>
                                </li>
                                <li class="list-info">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> We have a plan to include more features in future update </span>
                                        <span class="badge badge-sm label-info">{{ trans('main.tomorrow') }}</span>

                                    </div>
                                </li>
                                <li class="list-inverse">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Don't be hesitate to purchase this Dashbord </span>
                                        <span class="badge badge-sm label-inverse">{{ trans('main.now') }}</span>

                                    </div>
                                </li>
                                <li class="list-primary">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Code compile and upload </span>
                                        <span class="badge badge-sm label-success">2 {{ trans('main.days') }}</span>

                                    </div>
                                </li>

                                <li class="list-success">
                                    <i class=" fa fa-ellipsis-v"></i>
                                    <div class="task-checkbox">
                                        <input type="checkbox" class="list-child" value="">
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"> Tell your friends to buy this dashboad </span>
                                        <span class="badge badge-sm label-danger">{{ trans('main.now') }}</span>

                                    </div>
                                </li>
                                <li class="">
                                    <div class="task-title">
                                        <a href="#" class="center"> {{ trans('main.see_all_tasks') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>



                    </div>
                </div><!-- end tab-content-->
            </div><!-- end tabbable-line -->
        </div><!-- end tabbable-panel -->
    </div>
    <!-- /end #sidebar -->

    <!-- main content  -->
    <div id="main" class="main">
        <div class="row">
            <!-- breadcrumb section -->
            <div class="ribbon">
                <ul class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{url("admin/dashboard")}}">Home</a>
                    </li>
                    <li>
                        <a href="#">{{Request::segment(2)}}</a>
                    </li>
                </ul>

            </div>

            <!-- main content -->
            <div id="content">
                <!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
                <div id="" class="">
                    <div id="titr-content" class="col-md-12">
                        <h2>{{ucfirst(Request::segment(2))}}</h2>
                        <h5>Edit and add {{ucfirst(Request::segment(2))}}</h5>
                    </div>

                    <!-- page content load-->
                    @yield('content')
                            <!--/page content load-->

                </div><!-- end col-md-12 -->
            </div>
            <!-- end #content -->

        </div><!-- end .row -->
    </div>
    <!-- ./end #main  -->

    <!-- footer -->
    <div class="page-footer">
        <div class="col-xs-12 col-sm-12 text-center">
            <strong class=""><a href="#">Golabi</a> YepTemplate  Application © 2015</strong>
            <a href="#">
                <i class="fa fa-twitter-square bigger-120"></i>
            </a>
            <a href="#">
                <i class="fa fa-facebook-square bigger-120"></i>
            </a>
            <a href="#">
                <i class="fa fa-rss-square orange bigger-120"></i>
            </a>
        </div>
    </div>
    <!-- /footer -->
</div>
<!-- end #container -->

<!-- Modal mydelete -->
<div class="modal fade" id="mydelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
    <form>
        <div class="modal-dialog" role="document">
            <input type="hidden" name="delete_value" id="delete_value">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel3">Delete</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Are you sure to delete this item?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete_content"><span class="fa fa-trash"></span> Delete </button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- General JS script library-->

<script type="text/javascript" src="{{url('assets/vendors/angularjs/js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/angularjs/js/angular-sanitize.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-searchable/js/jquery.searchable.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/jquery-fullscreen/js/jquery.fullscreen.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/underscore/js/underscore.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/restangular/restangular.min.js')}}"></script> <!-- it's dependent to underscore.js -->

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
<script type="text/javascript" src="{{url('assets/vendors/ui-select/js/select.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/angular-wizard/js/angular-wizard.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/angular-ui-notification/js/angular-ui-notification.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/sweetalert/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/ng-sweet-alert/SweetAlert.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/ui-bootstrap/js/ui-bootstrap-custom-tpls.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap-duallistbox/js/jquery.bootstrap-duallistbox.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/angular-bootstrap-duallistbox/angular-bootstrap-duallistbox.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/momentjs/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/bootstrap-daterangepicker/js/daterangepicker.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/vendors/angular-daterangepicker/angular-daterangepicker.min.js')}}"></script>


<!-- Yeptemplate Vendors JS Script --><!-- Please use *.min.js in production -->
<script type="text/javascript" src="{{url('assets/js/yep-vendors.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/yep-custom.js')}}"></script>

<script type="text/javascript" src="{{url('assets/js/app.js')}}"></script>

</body>
</html>