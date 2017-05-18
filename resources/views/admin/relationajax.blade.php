<div class="col-md-12" id="ajax_div" ng-app="builderApp" ng-controller="builder">
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
                    <a href="#tab1permission" data-toggle="tab">
                        <i class="fa fa-permission fa-lg danger"></i>
                        {{ trans('main.relations') }}
                    </a>
                </li >
                <li class="{{isset($tab)&&$tab==2?'active':''}}" @if($tab!=2)style="display:none;"@endif>
                    <a href="#newpermission" id="newpermission-1" data-toggle="tab">
                        <i class="fa fa-permission-plus success"></i>
                        {{ trans('main.new_permission') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="panel-body no-padding">
            <div class="tab-content">
                @include('message')
                <div class="tab-pane fade {{isset($tab)&&$tab==1?'active in':''}}"  id="tab1permission">
                    <div class="col-md-12"></br>
                        <div class="form-inline">
                            <input type="text" class="form-control" ng-model="searchRelation" placeholder="Search...">
                            @permission('add_permission')
                            <div class="pull-right">
                                <button class="btn btn-success pull-right" ng-click="addRelation()">
                                    <i class="fa fa-plus"></i> {{ trans('main.add') }}
                                </button>
                            </div>
                            @endpermission
                        </div>
                        <hr>

                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="url" id="url" value="{{url("")}}">
                        <input type="hidden" name="id" id="id" value="{{isset($editpermission['id']) ? $editpermission['id'] : '' }}">
                        <input type="hidden" name="page" id="page" value="{{isset($request['page']) ?$request['page'] : 1 }}">
                        <div class="col-md-12 layout no-padding" >
                            <div class="yep-list" width="100%">
                                <ul>
                                    <li>Relationship</li>
                                </ul>
                                <ul ng-repeat="relation in relations | filter:{$:searchRelation}">
                                    <li data-label="title">
                                        <div class="input-group">
                                            <select  ng-model="relation.first"
                                                     ng-options='name.name as name.name for name in moduleName'
                                                     ng-change="initSecond(moduleName,relation.first)"
                                                     class="form-control"></select>

                                            <span class="input-group-addon"> Type</span>
                                            <select  ng-model="relation.relation_type"
                                                     ng-options='name.id as name.name for name in avalibaleRelationType'
                                                     ng-init="relation.relation_type = relation.relation_type || 0"
                                                     class="form-control"></select>

                                            <span class="input-group-addon"> :</span>
                                            <select  ng-model="relation.second"
                                                     ng-options='name.name as name.name for name in avalibaleModuleSecound'
                                                     ng-change="fetchFields(relation.second)" class="form-control"></select>

                                            <span class="input-group-addon">Show in form</span>
                                            <select ng-model="relation.second_field_name"
                                                    ng-options='name as name for name in avaliableFields' class="form-control" ></select>

                                            <span class="input-group-addon">Merge in Directory</span>
                                            <select ng-model="relation.merge_folder"
                                                    ng-options='name.name as name.name for name in moduleName' class="form-control">
                                                    <option value="">N/A</option>
                                            </select>

                                            <span ng-show="!relation.id" class="input-group-btn">
                                               <a ng-click="removeRelation(module)" class="btn btn-default">
                                                   <i class="fa fa-close fa-lg red"></i>
                                               </a>
                                            </span>
                                            <span ng-show="!relation.id" class="input-group-btn">
                                                <a ng-click="applyRelation(relation)" class="btn btn-default">
                                                    <i class="fa fa-check fa-lg blue"></i>
                                                </a>
                                            </span>
                                            <span ng-show="relation.id" class="input-group-btn">
                                               <a ng-click="removeRelationDB(relation)" class="btn btn-default">
                                                   <i class="fa fa-trash fa-lg red"></i>
                                               </a>
                                            </span>
                                            {{--<span ng-show="relation.id" class="input-group-btn">--}}
                                                {{--<a ng-click="updateRelation(relation)" class="btn btn-default"--}}
                                                   {{--ng-disabled="relation.first===undefined || relation.second===undefined || relation.second_field_name===undefined">--}}
                                                    {{--<i class="fa fa-refresh fa-lg green"></i>--}}
                                                {{--</a>--}}
                                            {{--</span>--}}


                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{--<pre>--}}
                            {{--[[relations | json]]--}}
                        {{--</pre>--}}
                        {{--<canvas id="myCanvas" width="568" height="412"> Your browser does not support the HTML5 canvas tag. </canvas>--}}
                        {{--<pre>--}}
                            {{--<div ng-bind="relations | json"></div>--}}
                        {{--</pre>--}}
                        <div style="display: none;">
                            <canvas id="myCanvas" width="568" height="412"></canvas>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{isset($tab)&&$tab==2?'active in':''}}" id="newpermission">
                    @include('errors')


                    <div class="col-md-12 layout no-padding">
                        <div class="panel-footer">
                            <div class="progress-btn">
                                @permission('add_permission')
                                @if(!isset($editpermission['id'])||$editpermission['id']=="")
                                    <a  id="relation_module" class="btn btn-success ladda-button" data-style="expand-right"><i class="fa fa-save"></i><span class="ladda-label"> {{ trans('main.save') }}</span></a>
                                @endif
                                @endpermission
                                @permission('edit_permission')
                                @if(isset($editpermission['id'])&&$editpermission['id']>"")
                                    <a    class="btn btn-info edit-btn"><i class="fa fa-save"></i>{{ trans('main.update') }}</a>
                                @endif
                                @endpermission
                                <button class="btn btn-link cancel-btn"> {{ trans('main.cancel') }}</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

