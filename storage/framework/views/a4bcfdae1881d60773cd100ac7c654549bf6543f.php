<table class="table table-striped" id="table-data-user">
    <tr>
        <th>N</th>
        <th>Usuario</th>
        <th class="hidden-xs hidden-sm">Email</th>
        <th class="hidden-xs">Estado</th>
        <th><strong>Tipo</strong></th>
        <th class="hidden-xs" title="Roles">Roles</th>
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        <?php ($n=1); ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr data-id="<?php echo e($user->id); ?>" data-profile="<?php echo e($user->id_profile); ?>">
            <td><?php echo e($n++); ?></td>
            <td id="username">
                 <?php if($user->is_active=="Desactivo"): ?>
                    <span class="text text-danger"><?php echo e($user->username); ?></span>
                <?php else: ?>
                    <span class="text text-primary"><?php echo e($user->username); ?></span>
                <?php endif; ?>

                <?php if(is_null($user->id_profile) && !$user->trashed()): ?>
                    <span class="label label-danger pull-right" title="Perfil no encontrado">
                        <span class="ion-alert" aria-hidden="true"></span>
                    </span>
                <?php endif; ?>

            </td>
            <td class="hidden-xs hidden-sm" id="email"><?php echo e($user->email); ?></td>
            <td class="hidden-xs alert alert-<?php echo e($user->is_active); ?>" id="is_active">
                <?php echo e($user->is_active); ?>

            </td>
            <td align="left" class="alert alert-<?php echo e($user->is_admin); ?>">
                <?php echo e($user->is_admin); ?>

            </td>

            <td class="hidden-xs" id="rol">
                <div class="label-group">
                    <span class="label label-user<?php echo e($user->is_user1); ?>"><?php echo e($user->is_user1); ?></span>
                    <span class="label label-user<?php echo e($user->is_user2); ?>"><?php echo e($user->is_user2); ?></span>
                    <span class="label label-user<?php echo e($user->is_user3); ?>"><?php echo e($user->is_user3); ?></span>
                </div>
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showuser_modal" data-target="#showuser_modal_<?php echo e($user->id); ?>">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    <?php echo $__env->make('admin.users.modal.showuser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if($user->trashed()): ?>
                        <a title="Restaurar"
                            
                            class="btn-restore btn btn-primary btn-xs"
                            
                            href="" 
                            role="button">
                            <span class="ion-loop" aria-hidden="true"></span>
                        </a>

                        <a  title="Borrar definitivamente" 
                            
                            class="btn-force-destroy btn btn-danger btn-xs"
                            
                            href="#" 
                            role="button">
                            <span class="ion-close-circled" aria-hidden="true"></span>
                        </a>
                    <?php else: ?>
                        
                        <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-edituser_<?php echo e($user->id); ?>" data-target="#edituser_modal_<?php echo e($user->id); ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        
                        <?php echo $__env->make('admin.users.modal.del_corfirm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        
                        <?php echo $__env->make('admin.users.modal.edituser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-userid_<?php echo e($user->id); ?>" data-target="#modal-del-confirm_<?php echo e($user->id); ?>" data-toggle="modal" role="button">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                        


                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>