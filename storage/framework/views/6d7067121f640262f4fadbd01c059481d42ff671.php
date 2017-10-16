<!-- Modal -->
<div class="modal fade" id="user-create" role="dialog">
  <div class="modal-dialog" role="document">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info panel panel-info">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>
        <h4 align="left" class="modal-title"><strong>Registrar Usuario</strong></h4>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-info">
              <div class="panel-heading">Formulario para el Registro de Nuevo usuario.</div>
              <div class="panel-body">
                <?php echo Form::open(['route' => 'users.store', 'method' => 'POST', 'id'=>'form-user-create', 'role'=>'form']); ?>

                <?php echo e(csrf_field()); ?>


                
                <?php echo $__env->make('admin.users.partials.field', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div align="center">
                    <div class="btn-group">
                        <button type="submit" class="btn-user-create btn btn-primary" value="create" id="create">
                            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                            Registrar 
                        </button>
                    </div>
                </div>
                
              <?php echo Form::close(); ?>    
              </div>
            </div>

                      

          </div>
          <div></div>
        </div>

        

      </div>
      
    </div>
    
  </div>
</div>