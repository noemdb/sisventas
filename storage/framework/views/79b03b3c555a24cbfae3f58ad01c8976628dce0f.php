<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SisVentas')); ?></title>

    <!-- Styles -->
    <?php echo Html::Style('bootstrap/css/bootstrap.min.css'); ?>

    
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/doc_bt_custom.css')); ?>" media="none" onload="if(media!='all')media='all'">
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('ionicons/ionicons-master/css/ionicons.min.css')); ?>" media="none" onload="if(media!='all')media='all'">
    
    <?php echo Html::Style('css/menu-level.css'); ?>


    <!-- Scripts header -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>

    <?php echo $__env->make('navbar.admin.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 sidebar">
                <?php echo $__env->make('navbar.admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-xs-9 col-sm-10 col-md-10 col-lg-10 main">
                <?php echo $__env->yieldContent('content'); ?> 
            </div>
        </div>

    </div>

    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Scripts -->

    
    
    <?php echo Html::script('js/jquery.min.js'); ?>

    
    <?php echo Html::script('bootstrap/js/bootstrap.min.js'); ?>

    
    

    <!-- Scripts por página -->
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
