
<div class="modal fade" id="delete_module" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3">
    <form>
        <div class="modal-dialog" role="document">
            <input type="hidden" name="delete_value" id="delete_value">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel3">Delete</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">Are you sure to delete this modules?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete_module_content" class="btn btn-danger  "><span class="fa fa-trash"></span> Delete </button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->startSection('content'); ?>
    <div id="ajax_div">
       <?php echo $__env->make('admin.crud_bilderajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>