@extends('layouts.admin.app')

@section('content')
{{-- @include('admin.modal.dialoge_confirm') --}}
@include('admin.modal.operok')
@include('admin.modal.opernook')
<div class="container-fluid">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Usuarios Registrados<br>
                <small class="text-default">{{$users->total()}} Usuarios</small>
                
                <div class="btn-group pull-right">
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#user-create" role="button">
                        <span class="ion-person-add" aria-hidden="true"></span>
                    </a>
                    <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('users.trash') }}" role="button">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </div>

            </h3>
        </div>

        <div class="panel-body">
            @include('admin.users.modal.createuser')                    
            
            {{-- Mensaje flash sobreo operaciones con base de datos --}}
            @if (Session::has('operp_ok'))
                <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    {{Session::get('operp_ok')}}.
                </div>
            @endif

            {{-- INI Barra de busqueda Filtros --}}
            @include('admin.users.partials.field_search',['route'=>'users.index'])
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los usuarios --}}
            @include('admin.users.partials.table')

            {{-- botones de paginacon --}}
            <div align="right">                        
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
{!! Form::open(['route' => ['users.destroy',':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
{!! Form::close() !!}
@endsection

@section('scripts')

    {{-- script para realizar el borrado y actualizacion de registros usando peticiones ajax --}}  
    <script>
        $(document).ready(function () {

            // script para realizar para registrar nuevo perfil usando peticiones ajax
            $('.btn-create-profile').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //fila contentiva de la data
                var id_user = row.data('id'); //alert(id);
                var form = $('#form-create-profile_'+id_user); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edituser_modal_'+id_user; //alert('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_p"+id_user).html(valor);
                        $("#error_msg_"+index+"_p"+id_user).fadeIn();
                    });
                });
            });//fin del evento clic


            // script para realizar para actualizar registros usando peticiones ajax
            $('.btn-update-profile').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //fila contentiva de la data
                var id_user = row.data('id');  //alert('id_user: '+id_user);
                var id_profile = row.data('profile');  //alert('id_profile: '+id_profile);
                var form = $('#form-update-profile_'+id_profile); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edituser_modal_'+id_user; //alert('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        //alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_profile).html(valor);
                        $("#error_msg_"+index+"_"+id_profile).fadeIn();
                    });
                });

            });//fin del evento clic


            // script para realizar para registrar nuevo usuario usando peticiones ajax
            $('.btn-user-create').click(function (e) {
                e.preventDefault();
                var id_user = $(this).attr('id'); //alert(id);
                var form = $('#form-user-create'); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edituser_modal_'+id_user; //alert('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#user-create").modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar para actualizar registros usando peticiones ajax
            $('.btn-update-user').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr'); //fila contentiva de la data
                var id_user = row.data('id');  //alert('id_user: '+id_user);
                var id_profile = row.data('profile');  //alert('id_profile: '+id_profile);
                var form = $('#form-update-user_'+id_user); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edituser_modal_'+id_user; //alert('modal_active: '+modal_active);

                $.post(url, data, function (result){
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar el borrado del registro
            $('.btn-user-delete-confir').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr');//fila contentiva de la data
                var id = row.data('id');  //alert(id);
                var row_info = $('#user_table_collapse'+id).parents('tr');//fila contentiva del collapsible
                var form = $('#form-delete'); //alert(form.attr('action'));
                var url = form.attr('action').replace(':USER_ID',id); //alert(url);
                var data = form.serialize(); //alert(data);

                $.post(url, data, function (result){
                    row.fadeOut();
                    row_info.fadeOut();
                    $("#msg_modal_admin_operok").text('Registro eliminado');
                    $("#admin_operok").modal('show');
                }).fail(function () {
                    // alert('El usuario no fué eliminado');
                    $("#admin_oper_nook").modal('toggle');                    
                });
            });//fin del evento clic

            //ventala de información: resultados de la operación
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

@endsection