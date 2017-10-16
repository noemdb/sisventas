<!-- Modal -->

<?php if(empty($user) && isset($profile->user)): ?>
    <?php ($user = $profile->user); ?>
<?php endif; ?>

<div class="modal fade" id="edit_profile_modal_<?php echo e($profile->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header upgrade">

        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>
        <h5 align="left" class="modal-title">
            <strong>Usuario:</strong> <?php echo e($profile->username); ?>

        </h5>
      </div>
      <div class="modal-body" align="left">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#editprofile_tab_<?php echo e($profile->id); ?>_form">Perfil</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_<?php echo e($profile->user->id); ?>_form">Información General</a></li>
          <li><a data-toggle="tab" href="#infoprofile_tab_<?php echo e($profile->id); ?>_other">Otros</a></li>
        </ul>

        <div class="tab-content">
          <div id="editprofile_tab_<?php echo e($profile->id); ?>_form" class="tab-pane fade in active">

            <div class="panel panel-warning">
              <div class="panel-heading">Formulario para la edición del perfil: <strong><?php echo e($profile->username); ?></strong></div>
              <div class="panel-body">
                  <?php echo Form::model($profile,['route' => ['profiles.update', $profile->id], 'method' => 'PUT', 'id'=>'form-update-profile_'.$profile->id, 'role'=>'form']); ?>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(Form::hidden('id', '', array('id' => 'id'))); ?>


                    <?php echo $__env->make('admin.profiles.partials.field',['id_profile'=>$profile->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div align="center">
                        <div class="form-group">
                            <button type="submit" class="btn-update-profile btn btn-warning" id="btn-update-user">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                Actualizar 
                            </button>
                        </div>
                    </div>
                  
                  <?php echo Form::close(); ?>

                </div>
              </div>
          </div>

          <div id="edituser_tab_<?php echo e($profile->user->id); ?>_form" class="tab-pane fade">
            
            <div class="panel panel-warning">
              <div class="panel-heading">Formulario para la edición del usuario: <strong><?php echo e($profile->username); ?></strong></div>
              <div class="panel-body">

                <?php echo Form::model($profile->user,['route' => ['users.update', $profile->user->id], 'method' => 'PUT', 'role'=>'form', 'id'=>'form-update-user_'.$profile->user->id ]); ?>

                  <?php echo e(csrf_field()); ?>

                  <?php echo $__env->make('admin.users.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <div align="center">
                      <div class="form-group">
                          <button type="submit" class="btn-update-user btn btn-warning" id="btn-update-user">
                              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                              Actualizar 
                          </button>
                      </div>
                  </div>
                
                <?php echo Form::close(); ?>

              </div>
            </div>

          </div>
          <div id="infoprofile_tab_<?php echo e($profile->id); ?>_other" class="tab-pane fade">
            <div class="panel panel-info">
              <div class="panel-heading">Panel heading without title</div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>