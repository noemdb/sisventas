@extends('layouts.admin.app')

@section('content')
{{-- @include('admin.modal.dialoge_confirm') --}}
@include('admin.modal.operok')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>
                        Listados de Usuarios Registrados<br>
                        <small class="text-default">Se encontraron {{$users->total()}} Usuarios</small>
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
                    @include('admin.users.partials.field_search')
                    {{-- FIN Barra de busqueda Filtros --}}

                    {{-- botones de paginacon --}}
                    {{-- <div class="row" align="right">
                      <div class="col-md-12">
                          {{ $users->links() }} 
                      </div>
                    </div>  --}}   

                    {{-- partial con el listado de los usuarios --}}
                    @include('admin.users.partials.table')

                    {{-- botones de paginacon --}}
                    <div align="right">                        
                        {{ $users->links() }}
                    </div>


                </div>
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


            // script para realizar para registrar nuevo usuario usando peticiones ajax
            $('.btn-create').click(function (e) {
                e.preventDefault();

                // var row = $(this).parents('div');//fila contentiva de la data
                var id = $(this).attr('id');  //alert(id);
                var form = $('#form-create'); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);

                $.post(url, data, function (result){
                    //alert(result);
                    // var nuevaFila="<tr><td></td>";
                    // $.each(result,function(index,valor){
                    //     nuevaFila+='<td class="alert alert-'+valor+'">'+valor+'</td>';
                    // });
                    // nuevaFila+="<td></td><td></td><td></td>";
                    // nuevaFila+="</tr>"; //alert(nuevaFila);
                    // $("#table-data-user").append(nuevaFila);

                    location.reload();
                    // $("#user-create").modal('toggle');
                    // $("#admin_operok").modal('toggle');
                    // $('#showuser_modal_'+id).load('http://sisventas.app/admin/users #showuser_modal_'+id);
                }).fail(function (result) {

                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id).html(valor);
                        $("#error_msg_"+index+"_"+id).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar para actualizar registros usando peticiones ajax
            $('.btn-update').click(function (e) {
                e.preventDefault();

                var row = $(this).parents('tr');//fila contentiva de la data
                var id = row.data('id');  //alert(id);
                var form = $('#form-update-'+id); //alert(form.attr('action'));
                var url = form.attr('action'); //alert(url);
                var data = form.serialize(); //alert(data);

                $.post(url, data, function (result){
                    // row.find("td:eq(1)").text(result['username']);
                    $.each(result,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        //row.find("#"+index).text(valor);
                        //row.find("#"+index).attr('class','alert alert-'+valor);
                    });

                    //$("#edituser_modal_"+id).modal('toggle');
                     //alert('Registro Actualizado');
                     location.reload();
                     // $("#admin_operok").modal('toggle');
                     // setTimeout(location.reload.bind(location), 2000);
                    //$( "#panel-body" ).load(window.location.href + " #panel-body" );                   
                    
                    // $("#admin_operok").modal('toggle');
                    // $('#showuser_modal_'+id).load('http://sisventas.app/admin/users #showuser_modal_'+id);
                }).fail(function (result) {

                    $.each(result.responseJSON.errors,function(index,valor){
                        // alert('Index: '+index+' - Valor: '+valor);
                        $("#msg_"+index+"_"+id).html(valor);
                        $("#error_msg_"+index+"_"+id).fadeIn();
                    });
                });

            });//fin del evento clic

            // script para realizar el borrado de registros usando peticiones ajax
            $('.btn-delete').click(function (e) {
                e.preventDefault();
                var row = $(this).parents('tr');//fila contentiva de la data
                
                if(confirm('Estas seguro? se borrará el usuario y el perfil')){
                    var row = $(this).parents('tr');//fila contentiva de la data
                    var id = row.data('id'); // alert(id);
                    var row_info = $('#user_table_collapse'+id).parents('tr');//fila contentiva del collapsible
                    var form = $('#form-delete'); //alert(form.attr('action'));
                    var url = form.attr('action').replace(':USER_ID',id); //alert(url);
                    var data = form.serialize(); //alert(data);

                    $.post(url, data, function (result){
                        row.fadeOut();
                        row_info.fadeOut();
                        // $("#admin_operok").modal('toggle');
                    }).fail(function () {
                        alert('El usuario no fué eliminado');
                    });
                }
            });//fin del evento clic

            $('#btn-close-ok-operp').click(function (e) {
                location.reload();
            });//fin del evento clic

        });
    </script>

@endsection