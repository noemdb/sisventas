

<?php $__env->startSection('content'); ?>

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">

                      <?php if(Session::has('operp_ok')): ?>

                          <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                              </button>
                              <?php echo e(Session::get('operp_ok')); ?>.
                          </div>

                      <?php endif; ?>

                      <h3>
                          Detalles de Usuario
                          <small class="text-info"><?php echo e($user->id.'. '.$user->username); ?></small>
                          <a title="Crear nuevo Usuario" class="btn btn-primary pull-right" href="<?php echo e(route('users.create')); ?>" role="button">
                              <span class="ion-person-add" aria-hidden="true"></span>
                          </a>
                      </h3>
                  </div>

                  <div class="panel-body">

                      <?php echo $__env->make('admin.users.partials.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                      <a class="btn btn-primary" href="<?php echo e(url()->previous()); ?>">
                          <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                          Ir al listado
                      </a>
                      
                      

                  </div>

              </div>
          </div>
      </div>
  </div>

<?php $__env->stopSection(); ?>

