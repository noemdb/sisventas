@if(empty($user->id_profile))
    @php ($id_profile='create')
@else
    @php ($id_profile=$user->id_profile)
@endif


<div class="row">
    <div class="col-md-10 col-md-offset-1">

        {{-- firstname --}}
        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
            <label for="firstname">Primer Nombre</label>
            {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','autofocus','placeholder'=>'1er Nombre']); !!}
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}

            
            
            @if ($errors->has('firstname'))
                <div class="alert alert-danger" role="alert" align="center">
                    <small><strong>{{ $errors->first('firstname') }}</strong></small>
                </div>
            @endif

        </div>

        {{-- lastname --}}
        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="lastname">Segundo Nombre</label>
            {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','autofocus','placeholder'=>'2do Nombre']); !!}
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}

            @if ($errors->has('lastname'))
                <div class="alert alert-danger" role="alert" align="center">
                    <small><strong>{{ $errors->first('lastname') }}</strong></small>
                </div>
            @endif
        </div>


        {{-- is_admin --}}
        <div class="form-group">
            <label for="is_admin">Tipo de Usuario</label>
            {!! Form::select('is_admin',[ 'Usuario' => 'Usuario','Administrador' => 'Administrador'],null,['class' => 'form-control']); !!}
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
        </div>

        {{-- is_user1 --}}
        <div class="form-group">
            <label for="is_user1">Rol 1</label>
            {!! Form::select('is_user1',[ '1' => 'Si','' => 'No'],null,['class' => 'form-control']); !!}
        </div>

        {{-- is_user2 --}}
        <div class="form-group">
            <label for="is_user2">Rol 2</label>
            {!! Form::select('is_user2',[ '2' => 'Si','' => 'No'],null,['class' => 'form-control']); !!}
        </div>

        {{-- is_user3 --}}
        <div class="form-group">
            <label for="is_user3">Rol 3</label>
            {!! Form::select('is_user3',[ '3' => 'Si','' => 'No'],null,['class' => 'form-control']); !!}
        </div>

</div>
</div>
