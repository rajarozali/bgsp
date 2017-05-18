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
                    <a href="#tab1Registration" data-toggle="tab">
                        <i class="fa fa-Registration fa-lg danger"></i>
                        Registration
                    </a>
                </li>
                <li class="<?php echo e(isset($tab)&&$tab==2?'active':''); ?>" <?php if($tab!=2): ?>style="display:none;"<?php endif; ?>>
                    <a href="#newRegistration" id="newRegistration-1" data-toggle="tab">
                        <i class="fa fa-Registration-plus success"></i>
                        New Registration
                    </a>
                </li>
            </ul>
        </div>
        <div class="panel-body no-padding">
            <?php echo $__env->make('message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="tab-content">
                <div class="tab-pane fade  <?php echo e(isset($tab)&&$tab==1?'active in':''); ?> tab1" id="tab1Registration">
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
                                    Actions <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <?php if (\Entrust::can('delete_Registration')) : ?>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#mydelete"><i class="fa fa-trash danger"></i> Delete</a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_csv')) : ?>
                                        <a href="#" id='csv' class="export" ><i class="fa fa-download blue"></i> Export to CSV</a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_xls')) : ?>
                                        <a href="#"  id='xls' class="export" ><i class="fa fa-download green"></i> Export to EXCEL</a>
                                        <?php endif; // Entrust::can ?>
                                        <?php if (\Entrust::can('export_pdf')) : ?>
                                        <a href="#"  id='pdf' class="export" ><i class="fa fa-download red"></i> Export to PDF</a>
                                        <?php endif; // Entrust::can ?>
                                    </li>
                                </ul>
                            </div>

                            <?php if (\Entrust::can('add_Registration')) : ?>
                            <div class="pull-right">
                                <a href="#" class="btn btn-success pull-right" data-tab-destination="newRegistration-1">
                                    <i class="fa fa-plus"></i> Add
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
                                    <?php echo $__env->make("RegistrationView::Registrationshow_table_header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <th width="5%">
                                        <i class="fa fa-bolt"></i>
                                        <a href="#"><i class="fa fa-search search-toggle-btn"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3">
                                        <input  value="<?php echo e(isset($request['serach_txt'])?  $request['serach_txt']:''); ?>" id='search_text' name="search_text" type="text" class="form-control" placeholder="search">
                                    </td>
                                    <td>
                                        <a class="btn btn-default search-btn"><i class="fa fa-search"></i></a>
                                    </td>
                                </tr>
                                <?php if(isset($Registration)): ?>
                                    <?php foreach($Registration as $content): ?>
                                        <tr>
                                            <td class="center">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="<?php echo e($content->id); ?>" type="checkbox" class="conchkNumber">
                                                    <label for="<?php echo e($content->id); ?>">
                                                    </label>
                                                </div>
                                            </td>
                                            <?php echo $__env->make("RegistrationView::Registrationshow_table_fields", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <td> <?php if (\Entrust::can('edit_Registration')) : ?><a id="<?php echo e($content->id); ?>" href="#" class="fa fa-pencil fa-lg edit-href" ></a><?php endif; // Entrust::can ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </tbody>
                            </table>
                            <?php if(isset($Registration)): ?>
                                <?php echo $Registration->render(); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  <?php echo e(isset($tab)&&$tab==2?'active in':''); ?> tab2" id="newRegistration">
                    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form id="form"   class="form-horizontal form" method="post" action="<?php echo e(url("/admin/registrations")); ?>">
                        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="url" id="url" value="<?php echo e(url("/admin/registrations")); ?>">
                        <input type="hidden" name="id" id="id" value="<?php echo e(isset($editRegistration['id']) ? $editRegistration['id'] : 0); ?>">
                        <input type="hidden" name="page" id="page" value="<?php echo e(isset($request['page']) ?$request['page'] : 1); ?>">
                        <div class="col-md-6"><br>
							<?php echo $__env->make("RegistrationView::Registrationfields", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
							 <?php /*relation fields*/ ?>

                        </div>
                        <div class="col-md-12 layout no-padding">
                            <div class="panel-footer">
                                <div class="progress-btn">
                                    <?php if (\Entrust::can('add_Registration')) : ?>
                                    <?php if(!isset($editRegistration['id'])||$editRegistration['id']==0): ?>
                                        <a   class=" submit-btn btn btn-success ladda-button" data-style="expand-right"><i class="fa fa-save"></i><span class="ladda-label"> Save</span></a>
                                    <?php endif; ?>
                                    <?php endif; // Entrust::can ?>
                                    <?php if (\Entrust::can('edit_Registration')) : ?>
                                    <?php if(isset($editRegistration['id'])&&$editRegistration['id']>0): ?>
                                        <a    class="btn btn-info edit-btn"><i class="fa fa-save"></i>Update</a>
                                    <?php endif; ?>
                                    <?php endif; // Entrust::can ?>
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