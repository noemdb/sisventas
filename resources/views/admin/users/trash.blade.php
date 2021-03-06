@extends('layouts.admin.app')

@section('content')
@include('admin.modal.operok')
@include('admin.modal.opernook')
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3>
                Listados de Usuarios eliminados<br>
                <small class="text-default">{{$users->total()}} Usuarios</small>
                <div class="btn-group pull-right">
                    {{-- <a title="Crear nuevo Usuario" class="btn btn-primary" href="{{ route('users.create') }}" role="button">
                        <span class="ion-person-add" aria-hidden="true"></span>
                    </a> --}}

                    <a title="Listado de Usuarios" class="btn btn-info" href="{{ route('users.index') }}" role="button">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </a>
                </div>

            </h3>
        </div>

        <div class="panel-body">

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
            @include('admin.users.partials.field_search',['route'=>'users.trash'])
            {{-- FIN Barra de busqueda Filtros --}}

            {{-- botones de paginacon --}}
            <div class="row" align="right">
              <div class="col-md-12">
                  {{ $users->links() }} 
              </div>
            </div>    

            {{-- partial con el listado de los usuarios --}}
            @include('admin.users.partials.table')

        </div>
    </div>
</div>
{!! Form::open(['route' => ['users.restore',':USER_ID'], 'method' => 'HEAD', 'id'=>'form-restore', 'role'=>'form']) !!}
{!! Form::close() !!}
{!! Form::open(['route' => ['users.force_destroy',':USER_ID'], 'method' => 'HEAD', 'id'=>'form-force_destroy', 'role'=>'form']) !!}
{!! Form::close() !!}
@endsection

@section('scripts')

    {{-- script para realizar el borrado y actualizacion de registros usando peticiones ajax --}}  
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

@endsection