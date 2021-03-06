@extends('layouts.admin.app')

@section('content')
{{-- @include('admin.modal.dialoge_confirm') --}}
@include('admin.modal.operok')
@include('admin.modal.opernook')
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Perfiles Registrados<br>
                <small class="text-default">Se encontraron {{$profiles->total()}} Perfiles</small>
                
                <div class="btn-group pull-right">
                    <a title="Crear nuevo Usuario" class="btn btn-primary" href="#" data-toggle="modal" data-target="#user-create" role="button">
                        <span class="ion-person-add" aria-hidden="true"></span>
                    </a>
                    <a title="Listado de Usuarios" class="btn btn-info" href="{{ route('users.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                    <a title="Eliminados" class="btn btn-danger" href="{{ route('profiles.trash') }}" role="button">
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
            @include('admin.profiles.partials.field_search',['route'=>'profiles.index'])
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- partial con el listado de los Perfiles --}}
            @include('admin.profiles.partials.table')

            {{-- botones de paginacon --}}
            <div align="right">                        
                {{ $profiles->links() }}
            </div>
        </div>
    </div>
</div>
{!! Form::open(['route' => ['profiles.destroy',':USER_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'role'=>'form']) !!}
{!! Form::close() !!}
@endsection

@section('scripts')

    {{-- script para realizar el borrado y actualizacion de registros usando peticiones ajax --}}
    <script>
        $(document).ready(function () {

            // script para realizar para registrar nuevo usuario usando peticiones ajax
            $('.btn-user-create').click(function (e) {
                e.preventDefault();

                var id = $(this).attr('id'); //alert(id);
                var form = $('#form-user-create'); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);

                $.post(url, data, function (result){
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#user-create").modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {

                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id).html(valor);
                        $("#error_msg_"+index+"_"+id).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar para actualizar registros de usuario usando peticiones ajax
            $('.btn-update-user').click(function (e) {
                e.preventDefault();

                var row = $(this).parents('tr');//fila contentiva de la data
                var id_user = row.data('user');  //alert('id_user: '+id_user);
                var id_profile = row.data('id');  //alert('id_profile: '+id_profile);
                var form = $('#form-update-user_'+id_user); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edit_profile_modal_'+id_profile; //alert(modal_active);

                $.post(url, data, function (result){
                    $("#"+modal_active).modal('hide');
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        //alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar para actualizar registros del perfil usando peticiones ajax
            $('.btn-update-profile').click(function (e) {
                e.preventDefault();

                var row = $(this).parents('tr');//fila contentiva de la data
                // var id = row.data('id');  //alert(id);
                var id_user = row.data('user');  //alert('id_user: '+id_user);
                var id_profile = row.data('id');  //alert('id_profile: '+id_profile);
                var form = $('#form-update-profile_'+id_profile); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);
                var modal_active = 'edit_profile_modal_'+id_profile;

                $.post(url, data, function (result){
                     // location.reload();
                    $("#msg_modal_admin_operok").text(result.messenge);
                    $("#"+modal_active).modal('hide');
                    $("#admin_operok").modal('show');
                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id_profile).html(valor);
                        $("#error_msg_"+index+"_"+id_profile).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar el borrado del registro
            $('.btn-profile-delete-confir').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr');//fila contentiva de la data
                var id = row.data('id');  //alert(id);
                var row_info = $('#profile_table_collapse'+id).parents('tr');//fila contentiva del collapsible
                var form = $('#form-delete'); //alert(form.attr('action'));
                var url = form.attr('action').replace(':USER_ID',id); //alert(url);
                var data = form.serialize(); //alert(data);

                $.post(url, data, function (result){
                    row.fadeOut();
                    row_info.fadeOut();
                    $("#msg_modal_admin_operok").text(result);
                    $("#admin_operok").modal('show');
                }).fail(function () {
                    $("#msg_"+index+"_"+id_profile).html(valor);
                    $("#error_msg_"+index+"_"+id_profile).fadeIn();                  
                });
            });//fin del evento clic

            //ventala de información: resultados de la operación
            $('#btn-acept-operok').click(function (e) {
                e.preventDefault();
                // location.reload();
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