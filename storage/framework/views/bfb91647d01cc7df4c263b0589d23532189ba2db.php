<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    
    
    <?php echo Html::Style('bootstrap/css/bootstrap.min.css'); ?>

    
    
    <?php echo Html::Style('css/sidebar.css'); ?>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">

        <?php echo $__env->make('navbar.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

        <div id="page-content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>

    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

    <!-- Scripts -->
    <script type="text/javascript">
        /*Menu-toggle*/
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("active");
            alert(1);
        });
    </script>

    <?php echo Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'); ?>

    <?php echo Html::script('bootstrap/js/bootstrap.min.js'); ?>

    
</body>
</html>
