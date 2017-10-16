<?php if(empty($user->id)): ?>
    <?php ($user_id='create'); ?>
<?php else: ?>
    <?php ($user_id=$user->id); ?>
<?php endif; ?>


<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
            <label for="username">Username</label>
            <?php echo Form::text('username', old('username'), ['class' => 'form-control','required','autofocus']);; ?>


            <div class="alert alert-danger" id="error_msg_username_<?php echo e($user_id); ?>" role="alert" align="center" style="display: none;">
                <small><strong id="msg_username_<?php echo e($user_id); ?>"></strong></small>
            </div>

            <?php if($errors->has('username')): ?>
                <div class="alert alert-danger" role="alert" align="center">
                    <small><strong><?php echo e($errors->first('username')); ?></strong></small>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email"><?php echo e(trans('validation.attributes.email')); ?></label>
            <?php echo Form::text('email', old('email'), ['class' => 'form-control','required','type'=>'email']);; ?>


            <div class="alert alert-danger" id="error_msg_email_<?php echo e($user_id); ?>" role="alert" align="center" style="display: none;">
                <small><strong id="msg_email_<?php echo e($user_id); ?>"></strong></small>
            </div>

            <?php if($errors->has('email')): ?>
                <div class="alert alert-danger" role="alert" align="center">
                    <small><strong><?php echo e($errors->first('email')); ?></strong></small>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label for="password"><?php echo e(trans('validation.attributes.password')); ?></label>
            <?php echo Form::password('password', ['class' => 'form-control']);; ?>


            <div class="alert alert-danger" id="error_msg_password_<?php echo e($user_id); ?>" role="alert" align="center" style="display: none;">
                <small><strong id="msg_password_<?php echo e($user_id); ?>"></strong></small>
            </div>

            <?php if($errors->has('password')): ?>
                <div class="alert alert-danger" role="alert" align="center">
                    <small><strong><?php echo e($errors->first('password')); ?></strong></small>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="is_active"><?php echo e(trans('validation.attributes.is_active')); ?></label>
            <?php echo Form::select('is_active',[ 'Desactivo' => 'Desactivo','Activo' => 'Activo'],null,['class' => 'form-control']);; ?>

        </div>

    </div>
</div>