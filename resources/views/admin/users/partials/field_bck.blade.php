
<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col-md-4 control-label">Username</label>
    {!! Form::text('username', old('username'), ['class' => 'form-control','required','autofocus']); !!}

    @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert" align="center">
            <small><strong>{{ $errors->first('username') }}</strong></small>
        </div>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">{{ trans('validation.attributes.email') }}</label>
    {!! Form::text('email', old('email'), ['class' => 'form-control','required','type'=>'email']); !!}

    @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert" align="center">
            <small><strong>{{ $errors->first('email') }}</strong></small>
        </div>
    @endif
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">{{ trans('validation.attributes.password') }}</label>
    {!! Form::password('password', ['class' => 'form-control']); !!}

    @if ($errors->has('password'))
        <div class="alert alert-danger" role="alert" align="center">
            <small><strong>{{ $errors->first('password') }}</strong></small>
        </div>
    @endif
</div>

<div class="form-group">
    <label for="is_active" class="col-md-4 control-label">{{ trans('validation.attributes.is_active') }}</label>
    {!! Form::select('is_active',[ '0' => 'Desactivo','1' => 'Activo'],null,['class' => 'form-control']); !!}
</div>