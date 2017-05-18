<?php $__env->startSection('content'); ?>
    <div id="ajax_div">
       <?php echo $__env->make('admin.userajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>