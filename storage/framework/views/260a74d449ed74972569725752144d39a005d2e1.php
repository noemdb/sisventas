


    <div class="container" id="div_main_edit">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <strong>Editar usuario:</strong> <?php echo e($user->username); ?>

                        <button type="button" onclick="window.location='<?php echo e(route("users.index")); ?>'" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="ion-android-list" title="Listado de Usuario"></span>
                        </button>
                    </div>
                    <div class="panel-body">
                        <?php echo Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT', 'role'=>'form']); ?>

                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('admin.users.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div align="center">
                                <div class="form-group">
         
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro');">
                                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                            Actualizar 
                                        </button>



                                        <?php if(is_null($user->profile['id'])): ?>
                                            <a class="btn btn-default" href="<?php echo e(route('profiles.create','id='.$user->id)); ?>">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                Registrar Perfil 
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-default" href="<?php echo e(route('profiles.edit',$user->profile['id'])); ?>">
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                Editar Perfil 
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    

                                </div>
                            </div>

                        
                        <?php echo Form::close(); ?>

                        <?php echo $__env->make('admin.users.partials.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        
                    </div>
                </div>
                

                <?php echo $__env->make('admin.profiles.partials.menu_buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

