<div class="col-md-12 " id="ajax_div"  ng-app="builderApp" ng-controller="builder" >
    <uib-tabset active="active" template-url="../assets/vendors/ui-bootstrap/tpl/panel-with-nav-tab-tabset.html" ng-cloak>
        <uib-tab index="0">
            <uib-tab-heading>
                <i class="fa fa-plug green"></i> Modules
            </uib-tab-heading>
            <ul style="list-style: none;" class="alert alert-warning">
                <h4>Notes:</h4>
                <h5>1. After create and edit module on linux host please run this command <code> php composer.phar dump-autoload</code></h5>
                <h5>2. If module builder does not work correctly for you <a ng-click="resetPlmb()" href="#">click here</a> to reset default setting</h5>
            </ul>




            <!-- List modules -->
            <div class="col-md-12 layout no-padding"></br>
                <div class="form-inline">
                    <div class="form-group">
                        <input id='search_text' ng-model="search_text" type="text" class="form-control" placeholder="{{ trans('main.search') }}">
                    </div>

                    @permission('add_module')
                    <div class="pull-right">
                        <button class="btn btn-success pull-right" ng-click="addNewModule()">
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
                        <th width="15%">{{ trans('main.active') }}</th>
                        <th width="5%">
                            <i class="fa fa-bolt"></i>
                            <a href="#"><i class="fa fa-search search-toggle-btn"></i></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr ng-repeat="module in moduleList | filter:search_text">

                        <td data-title="name"><a href="[[module.link_name]]">[[ module.name ]]</a></td>
                        <td data-title="description">[[module.description]]</td>
                        <td data-title="active">
                            <div class="m-switch">
                                <input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="module.status" ng-change="changeStatus(module)" id="[[$index]]" class="switch-input">
                                <label for="[[$index]]" class="switch-label">
                                </label>
                            </div>
                        </td>
                        <td>
                            <a  href="#" class="fa fa-pencil fa-lg edit-href0" ng-click="editModule(module)"></a>
                            <a  href="#" class="fa fa-trash fa-lg red" ng-click="delete(module)"></a>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </uib-tab>
        <uib-tab index="1" ng-show="showTab2" template-url="../assets/vendors/ui-bootstrap/tpl/panel-with-nav-tab-tab.html">
            <uib-tab-heading>
                <i class="fa fa-plus primary"></i> New/Edit Module
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
                            Module Name
                        </label>
                        <div class="col-sm-9">
                            <input ng-model="finalModule.name" type="text" class="form-control" ng-trim="false" ng-disabled="finalModule.id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            Description
                        </label>
                        <div class="col-sm-9">
                            <textarea ng-model="finalModule.description" class="form-control"  ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 layout no-padding" >
                <div class="yep-list" width="100%">
                    <ul>
                        <li>#</li>
                        <li class="width-15">Title</li>
                        <li class="width-15">Type</li>
                        <li class="width-5">Length</li>
                        <li class="width-15">HTML Type</li>
                        <li class="width-20">Validations</li>
                        <li class="width-5">Searchable</li>
                        <li class="width-5">Fillable</li>
                        <li class="width-5">inForm</li>
                        <li class="width-5">inGrid</li>
                        <li class="width-5"><i class="fa fa-cog"></i></li>
                    </ul>
                    <ul ng-repeat="field in fields">
                        <li>#</li>
                        <li data-label="title">
                            <div class="form-group">
                                <input type="text" class="form-control" ng-model="field.title" ng-trim="false">
                            </div>
                        </li>
                        <li data-label="type">
                            <div class="form-group">
                                <select ng-model="field.type" name="type" ng-options='type.id as type.name for type in fieldTypes' class="form-control"></select>
                            </div>
                        </li>
                        <li data-label="length">
                            <div class="form-group">
                                <input type="number" string-to-number class="form-control" ng-model="field.length">
                            </div>
                        </li>
                        <li data-label="HTML Type">
                            <div class="form-group">
                                <select  ng-model="field.htmlType" name="type" ng-options='type.id as type.name for type in htmlTypes' class="form-control"></select>
                            </div>


                            {{--if checkbox --}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Checkbox Value" ng-model="field.checkbox" ng-value="1" ng-show="field.htmlType==='checkbox'">
                            </div>

                            {{-- if select --}}
                            <div class="form-group">
                                <ui-select multiple tagging tagging-label="false" ng-model="field.select" theme="bootstrap" style="width: 100%;" ng-show="field.htmlType==='select'">
                                    <ui-select-match placeholder="Enter options..."><span ng-bind-html="$item"></span></ui-select-match>
                                    <ui-select-choices repeat="option in availableOptions | filter:$select.search" ng-bind="option">
                                    </ui-select-choices>
                                </ui-select>
                            </div>

                            {{-- if radio --}}
                            <div class="form-group">
                                <ui-select multiple tagging tagging-label="true" ng-model="field.radio" theme="bootstrap"  style="width: 100%;" ng-show="field.htmlType==='radio'">
                                    <ui-select-match placeholder="Enter options..."><span ng-bind-html="$item"></span></ui-select-match>
                                    <ui-select-choices  repeat="option in availableOptions | filter:$select.search" ng-bind="option">
                                    </ui-select-choices>
                                </ui-select>
                            </div>

                        </li>
                        <li data-label="Validations">
                            <div class="form-group">
                                <ui-select  multiple ng-model="field.validations" theme="bootstrap"  close-on-select="false" style="width: 100%;">
                                    <ui-select-match append-to-body placeholder="Select Laravel Validation..."><span ng-bind-html="$item"></span></ui-select-match>
                                    <ui-select-choices  repeat="color in availableValidations | filter:$select.search">
                                        <span ng-bind="color"></span>
                                    </ui-select-choices>
                                </ui-select>
                            </div>
                        </li>
                        <li data-label="searchable">
                            <yep-checkbox ng-model="field.searchable" data-toggle="tooltip" data-placement="bottom" title="Hooray!"></yep-checkbox>
                        </li>
                        <li data-label="fillable">
                            <yep-checkbox ng-model="field.fillable" data-toggle="tooltip" data-placement="bottom" title="Hooray!"></yep-checkbox>
                        </li>
                        <li data-label="show">
                            <yep-checkbox ng-model="field.show" data-toggle="tooltip" data-placement="bottom" title="Hooray!"></yep-checkbox>
                        </li>
                        <li data-label="grid">
                            <yep-checkbox ng-model="field.grid" data-toggle="tooltip" data-placement="bottom" title="Hooray!"></yep-checkbox>
                        </li>
                        <li data-label="action">
                            <a ng-click="removeField(field)"><i class="fa fa-trash fa-lg red"></i></a>
                        </li>
                    </ul>

                </div>

                <button class="btn btn-primary addfields" ng-click="addNewField()"><i class="fa fa-plus"></i> Add field</button>
                <button class="btn btn-success" ng-click="save(fields)" ng-show="!updateMode" ng-disabled="disable" ng-class="{'working':disable===true}">
                    <i class="fa fa-refresh"></i> Submit
                </button>
                <button class="btn btn-info" ng-click="update(fields)" ng-show="updateMode" ng-disabled="disable" ng-class="{'working':disable===true}">
                    <i class="fa fa-refresh"></i> Regenerate
                </button>

                {{--<pre>--}}
                    {{--<div id="choicesDisplay0" ng-bind="fields | json"></div>--}}
                    {{--<br>--}}
                    {{--<div id="choicesDisplay" ng-bind="finalModule | json"></div>--}}
                {{--</pre>--}}

            </div>

        </uib-tab>
    </uib-tabset>



</div>

