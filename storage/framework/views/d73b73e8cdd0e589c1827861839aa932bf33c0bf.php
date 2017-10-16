<div class="btn-group pull-right">
    <a title="Crear nuevo Usuario" class="btn btn-primary" href="<?php echo e(route('users.create')); ?>" role="button">
        <span class="ion-person-add" aria-hidden="true"></span>
    </a>
    <a title="Eliminados" class="btn btn-default" href="<?php echo e(route('users.trash')); ?>" role="button">
        <span class="ion-ios-trash-outline" aria-hidden="true"></span>
    </a>
</div>