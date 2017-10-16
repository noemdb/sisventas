<div class="thumbnail">
    <p>
        <strong>Detalles del Usuario</strong>
        
    </p>
<?php ($class_perfil=""); ?>
<?php if(!is_null($user->pdeleted_at)): ?>
    <?php ($class_perfil="list-group-item-danger"); ?>
    <div class="alert alert-danger" role="alert">El perfil asociado a este usuario se encuentra en la papelera</div>
<?php endif; ?>

  
<div class="row">
    <div class="col-md-4">
        <img src="<?php echo e($user->url_img); ?>" alt="<?php echo e($user->username); ?>" class="img-thumbnail img-rounded">
    </div>
    <div class="col-md-8">
        

        <div align="left">
            

            <ul class="list-group" style="margin: 0px;">
                <li class="list-group-item list-group-item-<?php echo e($user->is_active); ?>">
                    <div class="row">
                        <div class="col-md-4">Usuario:</div>
                        <div class="col-md-8">
                            <strong><?php echo e($user->username); ?></strong>
                            <span class="label label-<?php echo e($user->is_active); ?> pull-right"><?php echo e($user->is_active); ?></span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">Email:</div>
                        <div class="col-sm-8"><strong><?php echo e($user->email); ?></strong></div>
                    </div>
                </li>
                <?php if(!empty($user->id_profile)): ?>
                <li class="list-group-item list-group-item-<?php echo e($user->is_admin); ?> <?php echo e($class_perfil); ?>" type="">
                    <div class="row">
                        <div class="col-md-4">Roles:</div>
                        <div class="col-md-8">
                            <span class="label label-<?php echo e($user->is_admin); ?> pull-right"><?php echo e($user->is_admin); ?></span>
                            <span class="label label-user<?php echo e($user->is_user1); ?>"><?php echo e($user->is_user1); ?></span>
                            <span class="label label-user<?php echo e($user->is_user2); ?>"><?php echo e($user->is_user2); ?></span>
                            <span class="label label-user<?php echo e($user->is_user3); ?>"><?php echo e($user->is_user3); ?></span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item <?php echo e($class_perfil); ?>">
                    <div class="row">
                        <div class="col-md-4">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            <?php echo e($user->fullname); ?>

                        </div>
                    </div>
                </li>
                <?php endif; ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Creado</div>
                        <div class="col-md-8">
                            <?php if(isset($user->created_at)): ?>
                                <?php echo e($user->created_at->format('d-m-Y h:m:s')); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Actualizado</div>
                        <div class="col-md-8">
                            <?php if(isset($user->created_at)): ?>
                                <?php echo e($user->updated_at->format('d-m-Y h:m:s')); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <?php if(!empty($user->id_profile)): ?>
                    <li class="list-group-item <?php echo e($class_perfil); ?>">
                        <div class="row">
                            <div class="col-md-4">Perfil Creado</div>
                            <div class="col-md-8">
                                
                                <?php if(!empty($user->pcreated_at) && $user->pcreated_at !=''): ?>
                                    <?php echo e(date_format(new DateTime($user->pcreated_at), 'd-m-Y  h:i:s')); ?>

                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item <?php echo e($class_perfil); ?>">
                        <div class="row">
                            <div class="col-md-4">Perfil Actualizado</div>
                            <div class="col-md-8">
                                <?php if(!is_null($user->pupdated_at)): ?>
                                    <?php echo e(date_format(new DateTime($user->pupdated_at), 'd-m-Y  h:i:s')); ?>

                                    
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>

        </div>

    </div>
</div>


    
</div>