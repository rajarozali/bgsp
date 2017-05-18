<div class="col-md-12" id="ajax_div" ng-app="builderApp" ng-controller="querybuilder" ng-cloak>
    <!--panel details_company -->
    <uib-tabset active="active" template-url="../assets/vendors/ui-bootstrap/tpl/panel-with-nav-tab-tabset.html">
        <uib-tab index="0">
            <uib-tab-heading>
                <i class="fa fa-line-chart green"></i> Custom Queries
            </uib-tab-heading>

            <!-- List modules -->
            <div class="col-md-12 layout no-padding"></br>
                <div class="form-inline">
                    <input ng-model="search" type="text" class="form-control" placeholder="Filter..." value="">

                    @permission('add_module')
                    <div class="pull-right">
                        <button class="btn btn-success pull-right" ng-click="addNewReport()">
                            <i class="fa fa-plus"></i> {{ trans('main.add') }}
                        </button>
                    </div>
                    @endpermission
                </div>
                <hr>
            </div>
            <div class="res-table">
                <table class="table table-striped table-hover table-fixed ellipsis-table" >
                    <thead>
                    <tr>
                        <th width="15%">{{ trans('main.name') }}</th>
                        <th width="55%">{{ trans('main.description') }}</th>
                        <th width="5%">
                            <i class="fa fa-bolt"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr ng-repeat="item in reportList  | filter:search track by $index">

                        <td data-title="name"><a ng-click="convertQuery(item,1)" href="" target>[[ item.name ]]</a></td>
                        <td data-title="description">[[item.description]]</td>
                        <td>
                            <a  href="#" class="fa fa-pencil fa-lg edit-href0" ng-click="editReport(item)"></a>
                            <a  href="#" class="fa fa-trash fa-lg red" ng-click="deleteReport(item.id)"></a>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </uib-tab>
        <uib-tab index="1" ng-show="showTab2" template-url="../assets/vendors/ui-bootstrap/tpl/panel-with-nav-tab-tab.html">
            <uib-tab-heading>
                <i class="fa fa-plus primary"></i> New/Edit Custom Report
            </uib-tab-heading>

            @include('errors')

            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
            <input type="hidden" name="url" id="url" value="{{url("")}}">
            <input type="hidden" name="id" id="id" value="{{isset($editmodule['id']) ? $editmodule['id'] : '' }}">
            <input type="hidden" name="page" id="page" value="{{isset($request['page']) ?$request['page'] : 1 }}">


            <hr>
            <div class="col-md-6 layout no-padding">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-field-1">
                            Report Name
                        </label>
                        <div class="col-sm-9">
                            <input ng-model="report.name" type="text" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            Description
                        </label>
                        <div class="col-sm-9">
                            <textarea ng-model="report.description" class="form-control" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            Module
                        </label>
                        <div class="col-sm-9">
                            <select  ng-model="report.module" ng-options='module.id as module.name for module in moduleList' ng-change="fetchFields(report.module)" class="form-control"></select>
                        </div>
                    </div>
                </div>
                <pre style="display: none;">[[fields | json]]</pre>
            </div>
            <div class="col-md-6 layout no-padding">
                <pre style="display: none;">[[report | json]]</pre>
            </div>
            <div class="col-md-12 layout no-padding" >
                <uib-accordion close-others="false" template-url="../assets/vendors/ui-bootstrap/tpl/yep-accordian-tpl.html">

                    <uib-accordion-group is-open="true" heading="1: Select columns to show" template-url="../assets/vendors/ui-bootstrap/tpl/accordian-panel.html">
                        <div class="col-md-6 layout no-padding">
                            <select ng-model="report.myFields"
                                    ng-options="obj as obj.field for obj in fields track by obj.field"
                                    select-min-height="200"
                                    multiple
                                    bs-duallistbox >
                            </select>
                            <br>
                            {{--<textarea style="width: 100%;">[[report.myFields]]</textarea>--}}

                        </div>
                    </uib-accordion-group>

                    <uib-accordion-group  heading="2: Filter" template-url="../assets/vendors/ui-bootstrap/tpl/accordian-panel.html">
                        <h5>Date Filter</h5>
                        <div class="yep-list" width="100%">
                            <ul>
                                <li class="width-20">Field</li>
                                <li class="width-40">During</li>
                                <li class="width-40">From-To</li>
                            </ul>
                            <ul>
                                <li>
                                    <select ng-model="report.dateFilter.field" class="form-control" ng-options="obj.field as obj.field for obj in fields | filter:dateFilter"></select>
                                </li>
                                <li data-label="field">
                                    <div class="input-group">
                                         <span class="input-group-addon">
                                             <input type="radio" ng-model="dateType" ng-value="true" ng-init="dateType=true">
                                         </span>
                                        <select ng-model="during" ng-disabled="!dateType" ng-change="duringChange(during)" class="form-control" ng-options="obj for obj in duringOpt"></select>
                                    </div>
                                </li>
                                <li data-label="type">
                                    <div class="input-group">
                                         <span class="input-group-addon">
                                            <input type="radio"  ng-model="dateType" ng-value="false">
                                         </span>
                                        <input date-range-picker ng-model="report.dateFilter.dateRange" ng-disabled="dateType" class="form-control date-picker reportrange" >
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <h5>Advanced Filter</h5>
                        <div class="yep-list" width="100%">
                            <ul>
                                <li class="width-5"></li>
                                <li class="width-5">Reconciling</li>
                                <li class="width-15">Column Name</li>
                                <li class="width-15">Condition</li>
                                <li class="width-60">Value</li>
                                <li class="width-5"></li>
                            </ul>
                            <ul ng-repeat="filter in report.filters">
                                <li data-label="Delete">
                                    <a ng-click="removeCondition(filter)" class="btn btn-link">
                                        <i class="fa fa-trash fa-lg red"></i>
                                    </a>
                                </li>
                                <li data-label="Reconciling">
                                    <select  ng-model="filter.reconcil" class="form-control"
                                             ng-options="op.id as op.name for op in reconcil"
                                             ng-show="!$first">
                                        {{--<option value="and" selected>AND</option>--}}
                                        {{--<option value="or">OR</option>--}}
                                    </select>

                                </li>

                                <li data-label="Column Name">
                                    <select  ng-model="filter.column" ng-options='obj.field as obj.field for obj in fields' class="form-control"></select>
                                </li>
                                <li data-label="Condition">
                                    <select  ng-model="filter.condition" ng-options='condition.id as condition.name for condition in conditions' class="form-control"></select>
                                </li>
                                <li data-label="Value">
                                    <div class="input-group">
                                        <input type="text" readonly ng-model="filter.selectedColumnData"  class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" ng-click="openModal($index,filter.selectedColumnData)"><i class="fa fa-list"></i></button>
                                        </span>
                                    </div>
                                </li>
                                <li data-label="Add" class="center">
                                    <a ng-click="addCondition()" class="btn btn-link">
                                        <i class="fa fa-plus fa-lg green"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </uib-accordion-group>

                    <uib-accordion-group  heading="3: Select Column To Grouping" template-url="../assets/vendors/ui-bootstrap/tpl/accordian-panel.html">
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Group by</label>
                                    <div class="col-md-9">
                                        <select ng-model="report.groupby" class="form-control" ng-options="obj.field as obj.field for obj in fields"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Order by</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <select ng-model="report.order" class="form-control" ng-options="obj.field as obj.field for obj in fields"></select>
                                            <span class="input-group-addon">
                                                <i class="fa fa-sort-amount-desc"></i>
                                            </span>
                                            <select ng-model="report.orderDesc" class="form-control">
                                                <option value="">Ascending </option>
                                                <option value="DESC">Descending </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </uib-accordion-group>

                    {{--<uib-accordion-group  heading="4: Select Summery Type" template-url="../assets/vendors/ui-bootstrap/tpl/accordian-panel.html">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="yep-list" width="100%">--}}
                                {{--<ul>--}}
                                    {{--<li class="width-40">Column</li>--}}
                                    {{--<li class="width-10">Count</li>--}}
                                    {{--<li class="width-10">Sum</li>--}}
                                    {{--<li class="width-10">Avg</li>--}}
                                    {{--<li class="width-10">Max</li>--}}
                                    {{--<li class="width-10">Min</li>--}}
                                {{--</ul>--}}
                                {{--<ul ng-repeat="field in fields | filter: countable">--}}
                                    {{--<li>--}}
                                        {{--[[field.field]]--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="checkbox checkbox-primary">--}}
                                            {{--<input id="[[field.field]]" type="checkbox" class="conchkNumber">--}}
                                            {{--<label for="[[field.field]]">--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="checkbox checkbox-primary">--}}
                                            {{--<input id="[[field.field]]" type="checkbox" class="conchkNumber">--}}
                                            {{--<label for="[[field.field]]">--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="checkbox checkbox-primary">--}}
                                            {{--<input id="[[field.field]]" type="checkbox" class="conchkNumber">--}}
                                            {{--<label for="[[field.field]]">--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="checkbox checkbox-primary">--}}
                                            {{--<input id="[[field.field]]" type="checkbox" class="conchkNumber">--}}
                                            {{--<label for="[[field.field]]">--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div class="checkbox checkbox-primary">--}}
                                            {{--<input id="[[field.field]]" type="checkbox" class="conchkNumber">--}}
                                            {{--<label for="[[field.field]]">--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</uib-accordion-group>--}}

                    {{--<uib-accordion-group  heading="4: Charts" template-url="../assets/vendors/ui-bootstrap/tpl/accordian-panel.html">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-horizontal">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="textinput">Chart Type</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<select ng-model="model1" class="form-control" ng-options="obj as obj.name for obj in chartType track by obj.id"></select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-3 control-label" for="textinput">Sort by</label>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<select ng-model="model1" class="form-control" ng-options="obj as obj.text for obj in list1 track by obj.id"></select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<img src="../assets/img/chart/pie.png" alt="chart" class="img-responsive img-flat">--}}
                        {{--</div>--}}
                    {{--</uib-accordion-group>--}}
                </uib-accordion>

                <button class="btn btn-success" ng-click="convertQuery(report,1)">Report Generate</button>
            </div>



        </uib-tab>

        <uib-tab index="2" ng-show="showTab3" template-url="../assets/vendors/ui-bootstrap/tpl/panel-with-nav-tab-tab.html">
            <uib-tab-heading>
                <i class="fa fa-check-square-o success"></i> Report Result
            </uib-tab-heading>
            <div class="col-md-12 layout no-padding"></br>
                <div class="form-inline">
                    <div class="btn-group">
                        <a class="btn btn-default dropdown-toggle has-ripple" data-toggle="dropdown">
                            Export <span class="caret"></span>
                            <span class="ripple ripple-animate"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" id="xls" class="export" ng-click="convertQuery(report,1,'export')">
                                    <i class="fa fa-file-excel-o green"></i> EXCEL
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group" ng-show="!report.id">
                        <button class="btn btn-success pull-right" ng-click="save(report)">
                            <i class="fa fa-save"></i> Save Report
                        </button>
                    </div>
                    <div class="btn-group" ng-show="report.id">
                        <button class="btn btn-info pull-right" ng-click="update(report)">
                            <i class="fa fa-save"></i> Update Report
                        </button>
                    </div>


                    <div class="pull-right">
                        <button class="btn btn-default pull-right" ng-click="convertQuery(report,1,'print')">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>

                </div>
                <hr>
            </div>

            <div class="col-md-12 layout no-padding">
                <h4>[[report.name]]</h4>
                <p>[[report.description]]</p>
                <hr>
                <!-- Report Render Table -->
                <yep-table rows="finalReport" fields="finalFields" paging="true"></yep-table>

                {{--<pre>--}}
                    {{--[[report | json]]--}}
                {{--</pre>--}}
            </div>
        </uib-tab>
    </uib-tabset>

    <!-- print area -->
    <div style="display: none;">
        <div id="popup">
            <yep-table rows="finalReportPrint" fields="finalFieldsPrint" paging="false"></yep-table>
        </div>
    </div>

    <!-- end panel -->
</div>

