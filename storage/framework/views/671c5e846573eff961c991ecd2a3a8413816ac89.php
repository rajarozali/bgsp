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
                <li class="<?php echo e(isset($tab)&&$tab==1?'active':''); ?>">
                    <a href="#tab1permission" data-toggle="tab">
                        <i class="fa fa-permission fa-lg danger"></i>
                        <?php echo e(trans('main.relations')); ?>

                    </a>
                </li >
                <li class="<?php echo e(isset($tab)&&$tab==2?'active':''); ?>" <?php if($tab!=2): ?>style="display:none;"<?php endif; ?>>
                    <a href="#newpermission" id="newpermission-1" data-toggle="tab">
                        <i class="fa fa-permission-plus success"></i>
                        <?php echo e(trans('main.new_permission')); ?>

                    </a>
                </li>
            </ul>
        </div>
        <div class="panel-body no-padding">
            <div class="tab-content">
                <?php echo $__env->make('message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="tab-pane fade <?php echo e(isset($tab)&&$tab==1?'active in':''); ?>"  id="tab1permission">
                    <div class="col-md-12"></br>
                        <div class="form-inline">
                            <input type="text" class="form-control" ng-model="searchRelation" placeholder="Search...">
                            <?php if (\Entrust::can('add_permission')) : ?>
                            <div class="pull-right">
                                <button class="btn btn-success pull-right" ng-click="addRelation()">
                                    <i class="fa fa-plus"></i> <?php echo e(trans('main.add')); ?>

                                </button>
                            </div>
                            <?php endif; // Entrust::can ?>
                        </div>
                        <hr>

                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="url" id="url" value="<?php echo e(url("")); ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo e(isset($editpermission['id']) ? $editpermission['id'] : ''); ?>">
                        <input type="hidden" name="page" id="page" value="<?php echo e(isset($request['page']) ?$request['page'] : 1); ?>">
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
                                            <?php /*<span ng-show="relation.id" class="input-group-btn">*/ ?>
                                                <?php /*<a ng-click="updateRelation(relation)" class="btn btn-default"*/ ?>
                                                   <?php /*ng-disabled="relation.first===undefined || relation.second===undefined || relation.second_field_name===undefined">*/ ?>
                                                    <?php /*<i class="fa fa-refresh fa-lg green"></i>*/ ?>
                                                <?php /*</a>*/ ?>
                                            <?php /*</span>*/ ?>


                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php /*<pre>*/ ?>
                            <?php /*[[relations | json]]*/ ?>
                        <?php /*</pre>*/ ?>
                        <?php /*<canvas id="myCanvas" width="568" height="412"> Your browser does not support the HTML5 canvas tag. </canvas>*/ ?>
                        <?php /*<pre>*/ ?>
                            <?php /*<div ng-bind="relations | json"></div>*/ ?>
                        <?php /*</pre>*/ ?>
                        <div style="display: none;">
                            <canvas id="myCanvas" width="568" height="412"></canvas>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?php echo e(isset($tab)&&$tab==2?'active in':''); ?>" id="newpermission">
                    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                    <div class="col-md-12 layout no-padding">
                        <div class="panel-footer">
                            <div class="progress-btn">
                                <?php if (\Entrust::can('add_permission')) : ?>
                                <?php if(!isset($editpermission['id'])||$editpermission['id']==""): ?>
                                    <a  id="relation_module" class="btn btn-success ladda-button" data-style="expand-right"><i class="fa fa-save"></i><span class="ladda-label"> <?php echo e(trans('main.save')); ?></span></a>
                                <?php endif; ?>
                                <?php endif; // Entrust::can ?>
                                <?php if (\Entrust::can('edit_permission')) : ?>
                                <?php if(isset($editpermission['id'])&&$editpermission['id']>""): ?>
                                    <a    class="btn btn-info edit-btn"><i class="fa fa-save"></i><?php echo e(trans('main.update')); ?></a>
                                <?php endif; ?>
                                <?php endif; // Entrust::can ?>
                                <button class="btn btn-link cancel-btn"> <?php echo e(trans('main.cancel')); ?></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

