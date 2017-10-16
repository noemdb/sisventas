

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Registrar nuevo Perfil

                    
                    <button type="button" onclick="window.location='<?php echo e(route("users.index")); ?>'" class="close" data-dismiss="alert" aria-label="Close">
                        <span title="Lista de Usuarios" class="ion-android-list"></span>
                    </button>
                    

                </div>
                <div class="panel-body">

                    <?php echo Form::open(['route' => 'profiles.store', 'method' => 'POST', 'role'=>'form']); ?>

                        <?php echo e(csrf_field()); ?>


                        <?php echo Form::hidden('user_id', $_GET['id']);; ?>

                        <?php if($errors->has('user_id')): ?>
                            <div class="alert alert-danger" role="alert" align="center">
                                <small><strong><?php echo e($errors->first('user_id')); ?></strong></small>
                            </div>
                        <?php endif; ?>
                        
                        <?php echo $__env->make('admin.profiles.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                        <div align="center">

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro');">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        Registrar 
                                    </button>
                                </div>
                            </div>

                        </div>

                    
                    <?php echo Form::close(); ?>

                </div>

                

            </div>

            <?php echo $__env->make('admin.profiles.partials.menu_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>