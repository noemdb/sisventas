

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <strong>Editar Perfil </strong>Usuario: <?php echo e($profile->user['username']); ?> Nombre: <?php echo e($profile->firstname .' '.$profile->lastname); ?>


                        <button type="button" onclick="window.location='<?php echo e(route("profiles.index")); ?>'" class="close" data-dismiss="alert" aria-label="Close">
                            <span title="Listado de Perfiles" class="ion-android-list"></span>
                        </button>
                    </div>
                    <div class="panel-body">
                        <?php echo Form::model($profile,['route' => ['profiles.update', $profile->id], 'method' => 'PUT', 'role'=>'form']); ?>

                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.profiles.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div align="center">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro');">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        Actualizar 
                                    </button>
                                </div>
                            </div>

                        
                        <?php echo Form::close(); ?>

                        <?php echo $__env->make('admin.profiles.partials.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
                    </div>
                </div>


                <?php echo $__env->make('admin.profiles.partials.menu_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>