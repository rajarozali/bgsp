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
                <li class="<?php echo e(isset($tab)&&$tab==1?'active':''); ?>">
                    <a href="#tab1permission" data-toggle="tab">
                        <i class="fa fa-permission fa-lg danger"></i>
                        <?php echo e(trans('main.permissions')); ?>

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
                            <div class="form-group">
                                <select class="form-control paging" id="paging" name="paging">
                                    <option  <?php echo e(isset($request['paging'])&&$request['paging']==10 ?  'selected' :''); ?>  value="10">10</option>
                                    <option  <?php echo e(isset($request['paging'])&&$request['paging']==25 ?  'selected' :''); ?>  value="25">25</option>
                                    <option  <?php echo e(isset($request['paging'])&&$request['paging']==50?  'selected' :''); ?>  value="50">50</option>
                                    <option  <?php echo e(isset($request['paging'])&&$request['paging']==100?  'selected' :''); ?>  value="100">100</option>
                                </select>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" >
                                    <?php echo e(trans('main.actions')); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?php if (\Entrust::can('delete_permission')) : ?>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#mydelete"><i class="fa fa-trash danger"></i> <?php echo e(trans('main.delete')); ?></a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_csv')) : ?>
                                        <a href="#" id='csv' class="export" ><i class="fa fa-download blue"></i> <?php echo e(trans('main.export_to_csv')); ?></a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_xls')) : ?>
                                        <a href="#"  id='xls' class="export" ><i class="fa fa-download green"></i> <?php echo e(trans('main.export_to_excel')); ?></a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_pdf')) : ?>
                                        <a href="#"  id='pdf' class="export" ><i class="fa fa-download red"></i> <?php echo e(trans('main.export_to_pdf')); ?></a>
                                        <?php endif; // Entrust::can ?>
                                    </li>
                                </ul>
                            </div>
                            <?php if (\Entrust::can('add_permission')) : ?>
                            <div class="pull-right">
                                <a href="#" class="btn btn-success pull-right" data-tab-destination="newpermission-1">
                                    <i class="fa fa-plus"></i> <?php echo e(trans('main.add')); ?>

                                </a>
                            </div>
                            <?php endif; // Entrust::can ?>
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
                                    <th width="15%"><?php echo e(trans('main.name')); ?></th>
                                    <th width="55%"><?php echo e(trans('main.display_name')); ?></th>
                                    <th width="5%">
                                        <i class="fa fa-bolt"></i>
                                        <a href="#"><i class="fa fa-search search-toggle-btn"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <input   value="<?php echo e(isset($request['serach_txt'])?  $request['serach_txt']:''); ?>" id='search_text' name="search_text" type="text" class="form-control" placeholder="<?php echo e(trans('main.search')); ?>">
                                    </td>
                                    <td>
                                        <a class="btn btn-default search-btn"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                                <?php if(isset($permissions)): ?>
                                    <?php foreach($permissions as $permission): ?>
                                        <tr>
                                            <td class="center">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="<?php echo e($permission->id); ?>" type="checkbox" class="conchkNumber">
                                                    <label for="<?php echo e($permission->id); ?>">
                                                    </label>
                                                </div>
                                            </td>
                                            <td data-title="name"><?php echo e($permission->name); ?></td>
                                            <td data-title="email"><?php echo e($permission->display_name); ?></td>
                                            <td><?php if (\Entrust::can('edit_permission')) : ?><a id="<?php echo e($permission->id); ?>" href="#" class="fa fa-pencil fa-lg edit-href" ></a><?php endif; // Entrust::can ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </tbody>
                            </table>
                            <?php if(isset($permissions)): ?>
                                <?php echo $permissions->render(); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?php echo e(isset($tab)&&$tab==2?'active in':''); ?>" id="newpermission">
                    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form id="form"   class="form-horizontal form" method="post" action="<?php echo e(url("/admin/permissions")); ?>">
                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="url" id="url" value="<?php echo e(url("/admin/permissions")); ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo e(isset($editpermission['id']) ? $editpermission['id'] : ''); ?>">
                        <input type="hidden" name="page" id="page" value="<?php echo e(isset($request['page']) ?$request['page'] : 1); ?>">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    <?php echo e(trans('main.name')); ?>

                                </label>
                                <div class="col-sm-4">
                                    <input value="<?php echo e(isset($editpermission['name']) ? $editpermission['name'] : ''); ?>" name="name" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    <?php echo e(trans('main.display_name')); ?>

                                </label>
                                <div class="col-sm-4">
                                    <input value="<?php echo e(isset($editpermission['display_name']) ? $editpermission['display_name'] : ''); ?>" name="display_name" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="form-field-1">
                                    <?php echo e(trans('main.description')); ?>

                                </label>
                                <div class="col-sm-4">
                                    <textarea  name="description" type="text" placeholder="" class="form-control"><?php echo e(isset($editpermission['description']) ? $editpermission['description'] : ''); ?></textarea>
                                </div>
                            </div>

                        <div class="col-md-12 layout no-padding">
                            <div class="panel-footer">
                                <div class="progress-btn">
                                    <?php if (\Entrust::can('add_permission')) : ?>
                                    <?php if(!isset($editpermission['id'])||$editpermission['id']==""): ?>
                                        <a   class=" submit-btn btn btn-success ladda-button" data-style="expand-right"><i class="fa fa-save"></i><span class="ladda-label"> <?php echo e(trans('main.save')); ?></span></a>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>