<div class="thumbnail">
    <p>
        <strong>Detalles del Usuario</strong>
    </p>



    <div class="row">
        <div class="col-md-4">


            <img src="<?php echo e($user->profile['url_img']); ?>" alt="<?php echo e($user->username); ?>" class="img-thumbnail img-rounded">     



        </div>
        <div class="col-md-8">
            


            <ul class="list-group bs-callout bs-callout-primary" style="margin: 0px;">
                <?php if($user->is_active=='1'): ?>
                <li class="list-group-item list-group-item-info">
                <?php else: ?>
                <li class="list-group-item list-group-item-danger">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4">Usuario:</div>
                        <div class="col-md-8">
                            <strong><?php echo e($user->username); ?></strong>
                            <?php if($user->is_active=='1'): ?>
                                <span class="label label-info pull-right">Activo</span>
                            <?php else: ?>
                                <span class="label label-danger pull-right">Desactivo</span>                                
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">Email:</div>
                        <div class="col-sm-8"><strong><?php echo e($user->email); ?></strong></div>
                    </div>
                </li>

                <?php if($user->profile->is_admin=='1'): ?>
                <li class="list-group-item list-group-item-success" type="">
                <?php else: ?>
                <li class="list-group-item list-group-item-warning">
                <?php endif; ?>
                    <div class="row">
                        <div class="col-md-4">Roles:</div>
                        <div class="col-md-8">
                            <?php if($user->profile->is_user1=='1'): ?>
                                <span class="label label-info">1</span>
                            <?php endif; ?>
                            <?php if($user->profile->is_user2=='1'): ?>
                                <span class="label label-success">2</span>
                            <?php endif; ?>
                            <?php if($user->profile->is_user3=='1'): ?>
                                <span class="label label-warning">3</span>
                            <?php endif; ?>

                            <?php if($user->profile->is_admin=='1'): ?>
                                <span class="label label-success pull-right">Administrador</span>
                            <?php elseif($user->profile->is_admin=='0'): ?>
                                 <span class="label label-warning pull-right">Usuario</span>
                            <?php endif; ?>

                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            <?php echo e($user->profile['fullname']); ?>

                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Creado</div>
                        <div class="col-md-8">
                            <?php if(!is_null($user->profile->created_at)): ?>
                                <?php echo e($user->profile->created_at->format('d-m-Y h:m')); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Actualizado</div>
                        <div class="col-md-8">
                            <?php if(!is_null($user->profile->updated_at)): ?>
                                <?php echo e($user->profile->updated_at->format('d-m-Y h:m')); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            </ul>


        </div>
    </div>

</div>
