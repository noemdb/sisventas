{{--
@if(empty($user->id_profile))
    @php ($id_profile='p'.$user->id)
@else
    @php ($id_profile=$user->id_profile)
@endif
 --}}

@if(empty($id_profile))
    @php ($id_profile='p'.$user_id)
@endif


<div class="row">
    <div class="col-md-10 col-md-offset-1">

        {{-- firstname --}}
        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
            <label for="firstname">Primer Nombre</label>
            {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','placeholder'=>'1er Nombre']); !!}

            <div class="alert alert-danger" id="error_msg_firstname_{{$id_profile}}" role="alert" align="center" style="display: none;">
                <small><strong id="msg_firstname_{{$id_profile}}"></strong></small>
            </div>
        </div>

        {{-- lastname --}}
        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label for="lastname">Segundo Nombre</label>
            {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','placeholder'=>'2do Nombre']); !!}

            <div class="alert alert-danger" id="error_msg_lastname_{{$id_profile}}" role="alert" align="center" style="display: none;">
                <small><strong id="msg_lastname_{{$id_profile}}"></strong></small>
            </div>
        </div>

        {{-- is_admin --}}
        <div class="form-group">
            <label for="is_admin">Tipo de Usuario</label>
            {!! Form::select('is_admin',[ 'Usuario' => 'Usuario','Administrador' => 'Administrador'],null,['class' => 'form-control']); !!}
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
