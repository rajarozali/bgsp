        <div class="col-md-12 " id="ajax_div">
            <!--panel details_company -->
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="bars pull-right">
                            <a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Maximize"></i></a>
                            <a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Collapse"></i></a>
                        </div>
                    </h3>
                    <ul class="nav nav-tabs">
                        <li class="{{isset($tab)&&$tab==1?'active':''}}">
                            <a href="#tab1activity_logs" data-toggle="tab">
                                <i class="fa fa-activity_logs fa-lg danger"></i>
                                {{ trans('main.activity_logs') }}
                            </a>
                        </li >
                    </ul>
                </div>
                <div class="panel-body no-padding">
                    <div class="tab-content">
                        @include('message')
                        <div class="tab-pane fade {{isset($tab)&&$tab==1?'active in':''}}"  id="tab1activity_logs">
                            <div class="col-md-12"></br>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <select class="form-control paging" id="paging" name="paging">
                                            <option  {{isset($request['paging'])&&$request['paging']==10 ?  'selected' :''}}  value="10">10</option>
                                            <option  {{isset($request['paging'])&&$request['paging']==25 ?  'selected' :''}}  value="25">25</option>
                                            <option  {{isset($request['paging'])&&$request['paging']==50?  'selected' :''}}  value="50">50</option>
                                            <option  {{isset($request['paging'])&&$request['paging']==100?  'selected' :''}}  value="100">100</option>
                                        </select>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
                                            {{ trans('main.actions') }} <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @permission('delete_activity_logs')
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#mydelete"><i class="fa fa-trash danger"></i> {{ trans('main.delete') }}</a>
                                                @endpermission
                                                @permission('export_csv')
                                                <a href="#" id='csv' class="export" ><i class="fa fa-download blue"></i> {{ trans('main.export_to_csv') }}</a>
                                                @endpermission
                                                @permission('export_xls')
                                                <a href="#"  id='xls' class="export" ><i class="fa fa-download green"></i> {{ trans('main.export_to_excel') }}</a>
                                                @endpermission
                                            </li>
                                        </ul>
                                    </div>
                                    @permission('add_activity_logs')
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-success pull-right" data-tab-destination="newactivity_logs-1">
                                            <i class="fa fa-plus"></i> {{ trans('main.add') }}
                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                                <hr>
                                <div class="res-table">
                                    <table class="table table-striped table-hover table-fixed ellipsis-table" >
                                        <thead>
                                        <tr>
                                            <th width="5%" class="center">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox2" type="checkbox" class="conchkSelectAll">
                                                    <label for="checkbox2">
                                                    </label>
                                                </div>
                                            </th>
                                            <th width="15%">Content type</th>
                                            <th width="20%">Action</th>
                                            <th width="20%">Description</th>
                                            <th width="20%">Ip address</th>
                                            <th width="20%">Created at</th>
                                            <th width="5%">
                                                <i class="fa fa-bolt"></i>
                                                <a href="#"><i class="fa fa-search search-toggle-btn"></i></a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="6">
                                                <input   value="{{isset($request['serach_txt'])?  $request['serach_txt']:''}}" id='search_text' name="search_text" type="text" class="form-control" placeholder="{{ trans('main.search') }}">
                                            </td>
                                            <td>
                                                <a class="btn btn-default search-btn"><i class="fa fa-search"></i></a>
                                            </td>
                                        </tr>
                                        @if(isset($activity_logs))
                                            @foreach($activity_logs as $activity_log)
                                                <tr>
                                                    <td class="center">
                                                        <div class="checkbox checkbox-primary">
                                                            <input id="{{$activity_log->id}}" type="checkbox" class="conchkNumber">
                                                            <label for="{{$activity_log->id}}">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td data-title="name">{{$activity_log->content_type}}</td>
                                                    <td data-title="email">{{$activity_log->action}}</td>
                                                    <td data-title="email">{{$activity_log->description}}</td>
                                                    <td data-title="email">{{$activity_log->ip_address}}</td>
                                                    <td data-title="email">{{$activity_log->created_at}}</td>
                                                     </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    @if(isset($activity_logs))
                                        {!!  $activity_logs->render() !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
