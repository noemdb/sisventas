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
    

    <!-- Scripts header -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app" class="wrapper">
        <div class="row row-offcanvas row-offcanvas-left">

            <?php echo $__env->make('navbar.navbar_admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            

            <div id="content">

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
