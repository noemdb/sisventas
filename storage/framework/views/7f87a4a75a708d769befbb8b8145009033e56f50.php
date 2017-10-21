<table class="table table-striped" id="table-data-profile">
    <tr>
        <th class="hidden-xs">N</th>
        <th>Usuario</th>
        <th class="hidden-xs hidden-sm">Nom. Completo</th>
        <td class="hidden-xs" align="center"><strong>Estado</strong></td>
        <th title="Tipo de usuario">Tipo</th>
        <th title="Roles">Roles</th>
        
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        <?php ($n=1); ?>
    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr data-id="<?php echo e($profile->id); ?>" data-user="<?php echo e($profile->user_id); ?>">
            <td class="hidden-xs"><?php echo e($n++); ?></td>
            <td id="profilename">
                 <?php if($profile->is_active=="Desactivo"): ?>
                    <span class="text text-danger"><?php echo e($profile->username); ?></span>
                <?php else: ?>
                    <span class="text text-primary"><?php echo e($profile->username); ?></span>
                <?php endif; ?>

            </td>
            <td class="hidden-xs hidden-sm" id="fullname"><?php echo e($profile->fullname); ?></td>
            <td class="hidden-xs alert alert-<?php echo e($profile->is_active); ?>" id="is_active">
                <?php echo e($profile->is_active); ?>

            </td>
            <td align="left" class="alert alert-<?php echo e($profile->is_admin); ?>">
                <?php echo e($profile->is_admin); ?>

            </td>

            <td id="rol">
                <div class="label-group">
                    <span class="label label-user<?php echo e($profile->is_user1); ?>"><?php echo e($profile->is_user1); ?></span>
                    <span class="label label-user<?php echo e($profile->is_user2); ?>"><?php echo e($profile->is_user2); ?></span>
                    <span class="label label-user<?php echo e($profile->is_user3); ?>"><?php echo e($profile->is_user3); ?></span>
                </div>
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showprofile_modal" data-target="#showprofile_modal_<?php echo e($profile->id); ?>">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    <?php echo $__env->make('admin.profiles.modal.showprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if($profile->trashed()): ?>
                        

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
                        
                        <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-editprofile_<?php echo e($profile->id); ?>" data-target="#edit_profile_modal_<?php echo e($profile->id); ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        
                        <?php echo $__env->make('admin.profiles.modal.editprofile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        
                        <?php echo $__env->make('admin.profiles.modal.del_corfirm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-profileid_<?php echo e($profile->id); ?>" data-target="#modal-del-confirm_<?php echo e($profile->id); ?>" data-toggle="modal" role="button">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>