
<!-- Modal -->
<div class="modal fade " id="showuser_modal_<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Detalles de Usuario</strong></h5>
      </div>
      <div class="modal-body" align="left">


        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#showuser_tab_<?php echo e($user->id); ?>_general">Detalles</a></li>
          <li><a data-toggle="tab" href="#showuser_tab_<?php echo e($user->id); ?>_other1">Otros 1</a></li>
          <li><a data-toggle="tab" href="#showuser_tab_<?php echo e($user->id); ?>_other2">Otros 2</a></li>
        </ul>

        <div class="tab-content">
          <div id="showuser_tab_<?php echo e($user->id); ?>_general" class="tab-pane fade in active">
            
            
            <?php echo $__env->make('admin.users.partials.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
          <div id="showuser_tab_<?php echo e($user->id); ?>_other1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
          </div>
          <div id="showuser_tab_<?php echo e($user->id); ?>_other2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
          </div>
        </div>

      </div>
      
    </div>
  </div>
</div>