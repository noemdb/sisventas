<div align="right">
    {!! Form::open(['route' => [$route], 'method' => 'GET', 'role'=>'search']) !!}
        <div class="form-row">
            <div class="form-group col-md-4">
                {!! Form::text('username', old('username'), ['class' => 'form-control','placeholder'=>'Buscar Usuario o Email']); !!}
            </div>
            
            <div class="form-group col-md-3">
                {!! Form::select('is_admin',[ '' => 'Seleccione','Administrador' => 'Administrador','Usuario' => 'Usuario'],old('is_admin'),['class' => 'form-control']); !!}
            </div>

            <div class="form-group col-md-3">
                {!! Form::select('is_active',[ '' => 'Estado','Activo' => 'Activo','Desactivo' => 'Desactivo'],old('is_active'),['class' => 'form-control']); !!}
            </div>

            <div class="form-group col-md-2">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-info">
                    <span class="ion-search" aria-hidden="true"></span>
                        Buscar
                    </button> 
                    <button type="reset" class="btn btn-default" onclick="window.location='{{ URL::current() }}'" >
                    <span class="ion-refresh" aria-hidden="true"></span>
                        {{-- Reset --}}
                    </button>
                </div>
            </div>

        </div> 

    {!! Form::close() !!}
</div>