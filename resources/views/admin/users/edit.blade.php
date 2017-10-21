@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar usuario {{$user->username}}</div>
                    <div class="panel-body">
                        {!! Form::model($user,['route' => ['users.update', $user->id], 'method' => 'PUT', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                            {{ csrf_field() }}

                            @include('admin.users.partials.field');

                            <div align="center">
                                <div class="btn-group">
         
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro');">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        Actualizar 
                                    </button>

                                    <a class="btn btn-primary" href="{{ route('profiles.show',$user->id) }}">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        Perfil 
                                    </a>

                                    <a class="btn btn-primary" href="{{ route('users.index') }}">
                                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                                        Ir al listado
                                    </a>

                                </div>
                            </div>
                        {{-- </form> --}}
                        {!! Form::close() !!}
                        

                    </div>
                </div>
                @include('admin.users.partials.delete');
            </div>
        </div>
    </div>
@endsection
