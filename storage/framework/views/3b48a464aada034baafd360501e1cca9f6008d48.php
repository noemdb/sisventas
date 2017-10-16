

<?php if(empty($id_profile)): ?>
    <?php ($id_profile='p'.$user_id); ?>
<?php endif; ?>


<div class="row">
    <div class="col-md-10 col-md-offset-1">

        
        <div class="form-group<?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
            <label for="firstname">Primer Nombre</label>
            <?php echo Form::text('firstname', old('firstname'), ['class' => 'form-control','placeholder'=>'1er Nombre']);; ?>


            <div class="alert alert-danger" id="error_msg_firstname_<?php echo e($id_profile); ?>" role="alert" align="center" style="display: none;">
                <small><strong id="msg_firstname_<?php echo e($id_profile); ?>"></strong></small>
            </div>
        </div>

        
        <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
            <label for="lastname">Segundo Nombre</label>
            <?php echo Form::text('lastname', old('lastname'), ['class' => 'form-control','placeholder'=>'2do Nombre']);; ?>


            <div class="alert alert-danger" id="error_msg_lastname_<?php echo e($id_profile); ?>" role="alert" align="center" style="display: none;">
                <small><strong id="msg_lastname_<?php echo e($id_profile); ?>"></strong></small>
            </div>
        </div>

        
        <div class="form-group">
            <label for="is_admin">Tipo de Usuario</label>
            <?php echo Form::select('is_admin',[ 'Usuario' => 'Usuario','Administrador' => 'Administrador'],null,['class' => 'form-control']);; ?>

        </div>

        
        <div class="form-group">
            <label for="is_user1">Rol 1</label>
            <?php echo Form::select('is_user1',[ '1' => 'Si','' => 'No'],null,['class' => 'form-control']);; ?>

        </div>

        
        <div class="form-group">
            <label for="is_user2">Rol 2</label>
            <?php echo Form::select('is_user2',[ '2' => 'Si','' => 'No'],null,['class' => 'form-control']);; ?>

        </div>

        
        <div class="form-group">
            <label for="is_user3">Rol 3</label>
            <?php echo Form::select('is_user3',[ '3' => 'Si','' => 'No'],null,['class' => 'form-control']);; ?>

        </div>
        

</div>
</div>
