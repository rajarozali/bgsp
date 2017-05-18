<div class="col-md-12">
    <br>
    <?php if(isset($errors)): ?>
        <?php if($errors->all()): ?>
            <ul style="list-style: none;" class="alert alert-warning">
                <?php foreach($errors->all() as $content): ?>
                    <li><?php echo e($content); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</div>