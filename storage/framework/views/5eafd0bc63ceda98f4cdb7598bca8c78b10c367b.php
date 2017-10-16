<!-- Modal -->
<div class="modal fade" id="edituser_modal_<?php echo e($user->id); ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header upgrade">

        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>
        <h5 align="left" class="modal-title">
            <strong>Usuario:</strong> <?php echo e($user->username); ?>

        </h5>
      </div>
      <div class="modal-body" align="left">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#edituser_tab_<?php echo e($user->id); ?>_form">Información General</a></li>
          <li><a data-toggle="tab" href="#editprofile_tab_<?php echo e($user->id); ?>_form">Perfil</a></li>
          <li><a data-toggle="tab" href="#edituser_tab_<?php echo e($user->id); ?>_other">Otros</a></li>
        </ul>

        <div class="tab-content">
          <div id="edituser_tab_<?php echo e($user->id); ?>_form" class="tab-pane fade in active">

            <div class="panel panel-warning">
              <div class="panel-heading">Formulario para la edición del Usuario: <strong><?php echo e($user->username); ?></strong></div>
              <div class="panel-body">
                  <?php echo Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT', 'id'=>'form-update-user_'.$user->id, 'role'=>'form']); ?>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(Form::hidden('id', '', array('id' => 'id'))); ?>


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

          <div id="editprofile_tab_<?php echo e($user->id); ?>_form" class="tab-pane fade">
            


                <?php if(!empty($user->id_profile)): ?>
                  <div class="panel panel-warning">
                    <div class="panel-heading">Formulario para la edición del perfil asociado a: <strong><?php echo e($user->username); ?></strong></div>
                    <div class="panel-body">
                      <?php echo Form::model($user->profile,['route' => ['profiles.update', $user->profile->id], 'method' => 'PUT', 'role'=>'form', 'id'=>'form-update-profile_'.$user->id_profile ]); ?>

                        <?php echo e(csrf_field()); ?>

                        <?php echo $__env->make('admin.profiles.partials.field',['id_profile'=>$user->id_profile,'user_id'=>$user->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div align="center">
                            <div class="form-group">
                                <button type="submit" class="btn-update-profile btn btn-warning" id="btn-update-profile">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    Actualizar 
                                </button>
                            </div>
                        </div>
                      
                      <?php echo Form::close(); ?>

                    </div>
                  </div>
                <?php else: ?>
                 <div class="panel panel-info">
                    <div class="panel-heading">Formulario para registrar un perfil asociado a: <strong><?php echo e($user->username); ?></strong></div>
                    <div class="panel-body">
                      <?php echo Form::open(['route' => 'profiles.store', 'method' => 'POST', 'role'=>'form', 'id'=>'form-create-profile_'.$user->id ]); ?>

                        <?php echo e(csrf_field()); ?>

                        <?php echo Form::hidden('user_id', $user->id); ?>


                        <?php echo $__env->make('admin.profiles.partials.field',['user_id'=>$user->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div align="center">
                            <div class="form-group">
                                <button type="submit" class="btn-create-profile btn btn-primary" id="btn-create-profile">
                                    <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                    Registrar 
                                </button>
                            </div>
                        </div>
                      
                      <?php echo Form::close(); ?> 
                    </div>
                  </div> 
                <?php endif; ?>

          </div>
          <div id="edituser_tab_<?php echo e($user->id); ?>_other" class="tab-pane fade">
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