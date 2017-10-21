<?php $__env->startSection('content'); ?>
<div class="container body-login">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 Absolute-Center is-Responsive">
            <div class="panel panel-info panel-shadow">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('auth.title_login'); ?></div>

                <div class="panel-body">
                    <?php echo Form::open(['route' => 'login', 'method' => 'POST', 'role'=>'form', 'class'=>'form-horizontal']); ?>

                    
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                            

                            <div class="col-md-12">
                                
                                <?php echo Form::text('username', old('username'), ['class' => 'form-control','placeholder'=>'Username']);; ?>


                                <?php if($errors->has('username')): ?>
                                    <small class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </small>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            

                            <div class="col-md-12">
                                
                                <?php echo Form::password('password', ['class' => 'form-control','placeholder'=>'password']);; ?>


                                <?php if($errors->has('password')): ?>
                                    <small class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label class="checkbox text-primary text-right">
                                    <?php echo Form::checkbox( 'remember', old('remember') );; ?> 
                                    Recordarme
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <?php echo app('translator')->getFromJson('auth.btn_login'); ?>
                            </button>

                            
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                <?php echo app('translator')->getFromJson('auth.lnk_forget_pass'); ?>
                            </a>
                            
                        
                        </div>

                    <?php echo Form::close(); ?>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>