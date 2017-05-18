@extends('master')
@section('content')
    <!-- widget progress .col-md-12 -->
   <div class="col-md-12">
      <div class="row">
         <div class="col-sm-3">
            <div  class="panel panel-default">
               <div class="panel-body no-padding">
                  <div class="chart-sm">
                     <div class="text-left">
                        <div  class="piechart" data-percent="40">
                           <span class="percent">40%</span>
                        </div>
                        <strong>{{ trans('main.reading') }}</strong> {{ trans('main.news') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <div  class="panel panel-default">
               <div class="panel-body no-padding">
                  <div class="chart-sm">
                     <div class="text-left">
                        <div  class="piechart" data-percent="59">
                           <span class="percent">59%</span>
                        </div>
                        <strong>{{ trans('main.writing') }}</strong> {{ trans('main.comment') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <div  class="panel panel-default">
               <div class="panel-body no-padding">
                  <div class="chart-sm">
                     <div class="text-left">
                        <div  class="piechart" data-percent="90">
                           <span class="percent">90%</span>
                        </div>
                        <strong>{{ trans('main.search_engine') }}</strong> {{ trans('main.refer') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-3">
            <div  class="panel panel-default">
               <div class="panel-body no-padding">
                  <div class="chart-sm">
                     <div class="text-left">
                        <div  class="piechart" data-percent="32">
                           <span class="percent">32%</span>
                        </div>
                        <strong>{{ trans('main.ads') }}</strong> {{ trans('main.refer') }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /end widget progress .col-md-12 -->
   <!-- Admin over view .col-md-12 -->
   <div class="col-md-12 ">
      <div  class="panel panel-default">
         <div class="panel-body">

            <i class="glyphicon glyphicon-stats"></i>
            <b>{{ trans('main.admin_overview') }}</b>
            <hr>
            <div class="row">
               <!-- progress section -->
               <div class="col-sm-3">
                  <div class="headprogress">
                     <strong>{{ trans('main.tasks') }}</strong>
                     <strong class="progress-value">60/100 <i class="fa fa-tasks"></i></strong>
                  </div>
                  <div class="progress progress-xs">
                     <div class="progress-bar progress-bar-info" role="progressbar"  style="width: 60%;">
                     </div>
                  </div>

                  <div class="headprogress">
                     <strong>{{ trans('main.capacity') }}</strong>
                     <strong class="progress-value">40/100 GB <i class="fa fa-pie-chart"></i></strong>
                  </div>
                  <div class="progress  progress-xs">
                     <div class="progress-bar progress-bar-info" role="progressbar" style="width: 40%;">
                     </div>
                  </div>

                  <div class="headprogress">
                     <strong>{{ trans('main.email') }}</strong>
                     <strong class="progress-value">70% <i class="fa fa-envelope"></i></strong>
                  </div>
                  <div class="progress progress-xs">
                     <div class="progress-bar progress-bar-info" role="progressbar" style="width: 70%;">
                     </div>
                  </div>

                  <div class="headprogress">
                     <strong>{{ trans('main.close_request') }}</strong>
                     <strong class="progress-value">90% <i class="fa fa-ticket"></i></strong>
                  </div>
                  <div class="progress progress-xs">
                     <div class="progress-bar progress-bar-info" role="progressbar"  style="width: 90%;">
                     </div>
                  </div>

                  <a class="btn btn-success btn-block"><i class="fa fa-download"></i> {{ trans('main.download') }} <strong>{{ trans('main.report') }}</strong></a>
                  <a class="btn btn-default btn-block"><i class="fa fa-file-o"></i> {{ trans('main.report_a') }} <strong>{{ trans('main.bug') }}</strong></a>
               </div>
               <!-- ./preogress section -->
               <!-- chart section -->
               <div class="col-sm-6">
                  <div class="well well-sm well-light padding-10">
                     <h4 >
                        {{ trans('main.active') }} <strong>{{ trans('main.visit') }}</strong>
                        <a href="javascript:void(0);" class="pull-right ">
                           <i class="fa fa-refresh"></i>
                        </a>
                     </h4>
                     <div id="areaChart" class="chart-dashboard"></div>
                  </div>
               </div>
               <!-- ./chart section -->

               <!-- pie chart -->
               <div class="col-sm-3 ">
                  <div class="col-md-6 no-padd-left-right">
                     <div class="well well-sm text-center">
                        <span class="h1 shadow-block no-margin purple">752</span>
                          <span class="text-center">
                              <i class="fa fa-upload text-muted"></i>
                          </span>
                        <span class="text-muted">{{ trans('main.uploads') }}</span>
                     </div>
                  </div>
                  <div class="col-md-6 no-padd-left-right">
                     <div class="well well-sm text-center">
                        <span class="h1 shadow-block no-margin green">563</span>
                          <span class="text-center">
                              <i class="fa fa-file text-muted"></i>
                          </span>
                        <span class="text-muted">{{ trans('main.all_news') }}</span>
                     </div>
                  </div>
                  <div class="col-md-6 no-padd-left-right">
                     <div class="well well-sm text-center">
                        <span class="h1 shadow-block no-margin orange">236</span>
                          <span class="text-center">
                              <i class="fa fa-user text-muted"></i>
                          </span>
                        <span class="text-muted">{{ trans('main.users') }}</span>
                     </div>
                  </div>
                  <div class="col-sm-6 no-padd-left-right hidden-sm">
                     <div class="well well-sm text-center">
                        <span class="h1 shadow-block no-margin darkblue">471</span>
                             <span class="text-center">
                                 <i class="fa fa-rss text-muted"></i>
                             </span>
                        <span class="text-muted">{{ trans('main.feeds') }}</span>
                     </div>
                  </div>
                  <p class="hidden-sm limit-3-line">{{ trans('main.content2') }}</p>
               </div>
               <!-- ./pie chart -->
            </div>
         </div>

      </div><!-- end panel -->
   </div>
   <!-- /end Admin over view .col-md-12 -->
@endsection
