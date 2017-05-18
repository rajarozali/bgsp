<!DOCTYPE html>
<html>
<head>
    <title>Login page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(url('assets/vendors/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(url('assets/vendors/animate/css/animate.min.css')); ?>">

    <!-- Yeptemplate css --><!-- Please use *.min.css in production -->
    <link rel="stylesheet" href="<?php echo e(url('assets/css/yep-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('assets/css/yep-vendors.css')); ?>">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(url('assets/img/favicon/favicon.ico')); ?>"  type="image/x-icon">
    <link rel="icon" href="<?php echo e(url('assets/img/favicon/favicon.ico')); ?>" type="image/x-icon">
</head>
<!-- You can use .rtl CSS in #login-page -->
<body class="login-page" >
<canvas id="spiders" class="hidden-xs" ></canvas>
<div class="">
    <div style="margin: 5% auto; position: relative; width: 400px;">
        <div class="alert alert-warning">
            <label >User : admin@example.com</label><br>
            <label >Password : 123456</label>
        </div>
        <div id="sign-form" class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <?php echo $__env->make('message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="col-md-12">
                        <div class="text-center">
                            <h1><p><b>PLMB</b></p></h1>
                            <h3>
                                    (Powerful Laravel Module Builder)
                            </h3>
                            <?php /*<h5 class="grey">Sign in with social network or local account</h5>*/ ?>
                            <br>
                        </div>

                        <form class="form-horizontal" action="<?php echo e(url('/auth/login')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <fieldset>
                                <div class="text-center">
                                    <?php /*<img src="<?php echo e(url('assets/img/avatars/male.png')); ?>" width="75" alt="avatar">*/ ?>
                                </div>

                                <div class="spacing hidden-md"></div>
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="login-username" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="email">
                                </div>
                                <div class="spacing"></div>
                                <div  class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                <div class="spacing"></div>
                                <div class="checkbox checkbox-primary"> <input value="1" name="remember" id="remember" type="checkbox"  > <label for="remember"> Remember me </label> </div>
                                <button id="singlebutton" name="singlebutton" class="btn btn-success btn-sm  pull-right">Sign In</button>
                            </fieldset>

                        </form>
                        <a href="<?php echo e(url("password/reset")); ?>" class="grey">Forget Password?</a>
                        <br>
                        <a href="<?php echo e(url("register")); ?>" class="grey">Register New User</a>
                    </div>
                </div>

            </div>
        </div>

        <p>Copyright 2016 YEP Corporation. All right reserved.</p>
    </div>

</div>


<!-- General JS script library-->
<script type="text/javascript" src="<?php echo e(url('assets/vendors/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/vendors/jquery-ui/js/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/vendors/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/vendors/jquery-searchable/js/jquery.searchable.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(url('assets/vendors/jquery-fullscreen/js/jquery.fullscreen.min.js')); ?>"></script>

<!-- Yeptemplate JS Script --><!-- Please use *.min.js in production -->
<script type="text/javascript" src="<?php echo e(url('assets/js/yep-script.js')); ?>"></script>

<!-- Related JavaScript Library to This Pagee -->


<!-- Plugins Script -->
<script type="text/javascript">

</script>

</body>
</html>