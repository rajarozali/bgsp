
<?php $__env->startSection('content'); ?>
    <form id="form"   class="form-horizontal form" method="post" action="<?php echo e(url("/admin/activitylogs")); ?>">
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="url" id="url" value="<?php echo e(url("/admin/activitylogs")); ?>">
        <input type="hidden" name="id" id="id" value="<?php echo e(isset($editrole['id']) ? $editrole['id'] : ''); ?>">
        <input type="hidden" name="page" id="page" value="<?php echo e(isset($request['page']) ?$request['page'] : 1); ?>">
        </form>
    <div id="ajax_div">
        <?php echo $__env->make('admin.activitylogajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>