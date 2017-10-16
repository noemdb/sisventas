

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.modal.operok', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.modal.opernook', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>
                        Listados de Usuarios eliminados<br>
                        <small class="text-default">Se encontraron <?php echo e($users->total()); ?> Usuarios</small>
                        <div class="btn-group pull-right">
                            <a title="Crear nuevo Usuario" class="btn btn-primary" href="<?php echo e(route('users.create')); ?>" role="button">
                                <span class="ion-person-add" aria-hidden="true"></span>
                            </a>

                            <a title="Listado de Usuarios" class="btn btn-info" href="<?php echo e(route('users.index')); ?>" role="button">
                                <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            </a>
                        </div>

                    </h3>
                </div>

                <div class="panel-body">

                    
                    <?php if(Session::has('operp_ok')): ?>
                        <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            <?php echo e(Session::get('operp_ok')); ?>.
                        </div>
                    <?php endif; ?>

                    
                    <?php echo $__env->make('admin.users.partials.field_search',['route'=>'users.trash'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    

                    
                    <div class="row" align="right">
                      <div class="col-md-12">
                          <?php echo e($users->links()); ?> 
                      </div>
                    </div>    

                    
                    <?php echo $__env->make('admin.users.partials.table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo Form::open(['route' => ['users.restore',':USER_ID'], 'method' => 'HEAD', 'id'=>'form-restore', 'role'=>'form']); ?>

<?php echo Form::close(); ?>

<?php echo Form::open(['route' => ['users.force_destroy',':USER_ID'], 'method' => 'HEAD', 'id'=>'form-force_destroy', 'role'=>'form']); ?>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

      
    <script>
        $(document).ready(function () {

            // script para realizar el borrado del registro
            $('.btn-restore').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //fila contentiva de la data
                var id = row.data('id');  //alert(id);
                var form = $('#form-restore'); //alert(form.attr('action'));
                var url = form.attr('action').replace(':USER_ID',id); //alert(url);
                var data = form.serialize(); //alert(data);

                $.get(url, data, function (result){
                    row.fadeOut();
                    $("#msg_modal_admin_operok").text(result);
                    $("#admin_operok").modal('show');
                }).fail(function () {
                    $("#msg_modal_admin_opernook").text(result);
                    $("#admin_opernook").modal('show');                   
                });
            });//fin del evento clic

            //ventala de información: resultados de la operación (ok)
            $('#btn-acept-operok').click(function (e) {
                e.preventDefault();
                window.location.reload(true);//hard_refersh
            });//fin del evento clic

            //ventala de información: resultados de la operación (no ok)
            $('#btn-acept-opernook').click(function (e) {
                e.preventDefault();
                window.location.reload(true);//hard_refersh
            });//fin del evento clic

            // script para realizar el borrado del registro
            $('.btn-force-destroy').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //fila contentiva de la data
                var id = row.data('id');  //alert(id);
                var form = $('#form-force_destroy'); //alert(form.attr('action'));
                var url = form.attr('action').replace(':USER_ID',id); //alert(url);
                var data = form.serialize(); //alert(data);

                $.get(url, data, function (result){
                    row.fadeOut();
                    $("#msg_modal_admin_operok").text(result);
                    $("#admin_operok").modal('show');
                }).fail(function () {
                    $("#msg_modal_admin_opernook").text(result);
                    $("#admin_opernook").modal('show');                   
                });
            });//fin del evento clic

            //ventala de información: resultados de la operación (ok)
            $('#btn-acept-operok').click(function (e) {
                e.preventDefault();
                window.location.reload(true);//hard_refersh
            });//fin del evento clic

            //ventala de información: resultados de la operación (no ok)
            $('#btn-acept-opernook').click(function (e) {
                e.preventDefault();
                window.location.reload(true);//hard_refersh
            });//fin del evento clic

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>