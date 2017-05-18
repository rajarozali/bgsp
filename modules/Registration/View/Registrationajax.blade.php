<div class="col-md-12" id="ajax_div">
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
                    <a href="#tab1Registration" data-toggle="tab">
                        <i class="fa fa-Registration fa-lg danger"></i>
                        Registration
                    </a>
                </li>
                <li class="{{isset($tab)&&$tab==2?'active':''}}" @if($tab!=2)style="display:none;"@endif>
                    <a href="#newRegistration" id="newRegistration-1" data-toggle="tab">
                        <i class="fa fa-Registration-plus success"></i>
                        New Registration
                    </a>
                </li>
            </ul>
        </div>
        <div class="panel-body no-padding">
            @include('message')
            <div class="tab-content">
                <div class="tab-pane fade  {{isset($tab)&&$tab==1?'active in':''}} tab1" id="tab1Registration">
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
                                    Actions <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        @permission('delete_Registration')
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#mydelete"><i class="fa fa-trash danger"></i> Delete</a>
                                        @endpermission
                                        @permission('export_csv')
                                        <a href="#" id='csv' class="export" ><i class="fa fa-download blue"></i> Export to CSV</a>
                                        @endpermission
                                        @permission('export_xls')
                                        <a href="#"  id='xls' class="export" ><i class="fa fa-download green"></i> Export to EXCEL</a>
                                        @endpermission
                                        @permission('export_pdf')
                                        <a href="#"  id='pdf' class="export" ><i class="fa fa-download red"></i> Export to PDF</a>
                                        @endpermission
                                    </li>
                                </ul>
                            </div>

                            @permission('add_Registration')
                            <div class="pull-right">
                                <a href="#" class="btn btn-success pull-right" data-tab-destination="newRegistration-1">
                                    <i class="fa fa-plus"></i> Add
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
                                    @include("RegistrationView::Registrationshow_table_header")
                                    <th width="5%">
                                        <i class="fa fa-bolt"></i>
                                        <a href="#"><i class="fa fa-search search-toggle-btn"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <input  value="{{isset($request['serach_txt'])?  $request['serach_txt']:''}}" id='search_text' name="search_text" type="text" class="form-control" placeholder="search">
                                    </td>
                                    <td>
                                        <a class="btn btn-default search-btn"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                                @if(isset($Registration))
                                    @foreach($Registration as $content)
                                        <tr>
                                            <td class="center">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="{{$content->id}}" type="checkbox" class="conchkNumber">
                                                    <label for="{{$content->id}}">
                                                    </label>
                                                </div>
                                            </td>
                                            @include("RegistrationView::Registrationshow_table_fields")
                                            <td> @permission('edit_Registration')<a id="{{$content->id}}" href="#" class="fa fa-pencil fa-lg edit-href" ></a>@endpermission</td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            @if(isset($Registration))
                                {!!  $Registration->render() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  {{isset($tab)&&$tab==2?'active in':''}} tab2" id="newRegistration">
                    @include('errors')
                    <form id="form"   class="form-horizontal form" method="post" action="{{url("/admin/registrations")}}">
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="url" id="url" value="{{url("/admin/registrations")}}">
                        <input type="hidden" name="id" id="id" value="{{isset($editRegistration['id']) ? $editRegistration['id'] : 0 }}">
                        <input type="hidden" name="page" id="page" value="{{isset($request['page']) ?$request['page'] : 1 }}">
                        <div class="col-md-6"><br>
							@include("RegistrationView::Registrationfields") 
							 {{--relation fields--}}

                        </div>
                        <div class="col-md-12 layout no-padding">
                            <div class="panel-footer">
                                <div class="progress-btn">
                                    @permission('add_Registration')
                                    @if(!isset($editRegistration['id'])||$editRegistration['id']==0)
                                        <a   class=" submit-btn btn btn-success ladda-button" data-style="expand-right"><i class="fa fa-save"></i><span class="ladda-label"> Save</span></a>
                                    @endif
                                    @endpermission
                                    @permission('edit_Registration')
                                    @if(isset($editRegistration['id'])&&$editRegistration['id']>0)
                                        <a    class="btn btn-info edit-btn"><i class="fa fa-save"></i>Update</a>
                                    @endif
                                    @endpermission
                                     <button class="btn btn-link cancel-btn"> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->

</div>