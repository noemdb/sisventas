@extends('layouts.admin.app')

@section('content')
    {{-- @include('admin.modal.dialoge_confirm') --}}
    {{-- @include('admin.modal.operok') --}}
    {{-- @include('admin.modal.opernook') --}}
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>
                    Listados de Estados de Usuarios Registrados<br>
                    <small class="text-default">Se encontraron {{$status_users->total()}} Estados de Usuarios</small>
                    {{-- <div class="btn-group pull-right">
                        <a title="Listado de Estados de Usuarios" class="btn btn-info" href="{{ route('users.index') }}" role="button">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        </a>
                        <a title="Listado de Perfiles" class="btn btn-info" href="{{ route('profiles.index') }}" role="button">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        </a>
                    </div> --}}

                </h3>
            </div>

            <div class="panel-body">                    

                {{-- INI Barra de busqueda Filtros --}}
                @include('admin.status_users.partials.field_search',['route'=>'statususer.index'])
                {{-- FIN Barra de busqueda Filtros --}}

                {{-- partial con el listado de los Estados --}}
                @include('admin.status_users.partials.table')

                {{-- botones de paginacon --}}
                <div align="right">                        
                    {{ $status_users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{-- script para realizar peticiones ajax --}}  
    <script>
        $(document).ready(function () {

        });
    </script>

@endsection