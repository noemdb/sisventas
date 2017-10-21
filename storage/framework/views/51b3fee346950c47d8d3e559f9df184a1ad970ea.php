

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear nuevo usuario</div>
                <div class="panel-body">
                    <?php echo Form::open(['route' => 'users.store', 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']); ?>

                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('admin.users.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

                        <div align="center">
                            <div class="btn-group">
     
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    Registrar 
                                </button>

                                <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>">
                                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                                    Ir al listado
                                </a>

                            </div>
                        </div>

                    
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>