
<!-- Modal -->
<div class="modal fade" id="<?php echo e($profile->user_id); ?>_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" align="left" id="myModalLabel">Detalles de Usuario</h4>
      </div>
      <div class="modal-body">

          <?php echo $__env->make('admin.profiles.partials.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="wrapper text-center">
              <div class="btn-group">

                  <?php if(!$profile->trashed()): ?>
                    <a class="btn btn-primary" href="<?php echo e(route('profiles.show',$user->id)); ?>">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        Editar Perfil 
                    </a>
                  <?php endif; ?>

              </div>
            </div>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>