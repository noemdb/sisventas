@extends('layouts.login')

@section('content')
<div class="container body-login">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 Absolute-Center is-Responsive">
            <div class="panel panel-info panel-shadow">
                <div class="panel-heading">@lang('auth.title_login')</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'login', 'method' => 'POST', 'role'=>'form', 'class'=>'form-horizontal']) !!}
                    {{-- <form method="POST" action="{{ route('login') }}" class="form-horizontal"> --}}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {{-- <label for="username" class="col-md-4 control-label">@lang('auth.txt_username')</label> --}}

                            <div class="col-md-12">
                                {{-- <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus> --}}
                                {!! Form::text('username', old('username'), ['class' => 'form-control','placeholder'=>'Username']); !!}

                                @if ($errors->has('username'))
                                    <small class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{-- <label for="password" class="col-md-4 control-label">@lang('auth.txt_password')</label> --}}

                            <div class="col-md-12">
                                {{-- <input id="password" type="password" class="form-control" name="password" required> --}}
                                {!! Form::password('password', ['class' => 'form-control','placeholder'=>'password']); !!}

                                @if ($errors->has('password'))
                                    <small class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label class="checkbox text-primary text-right">
                                    {!! Form::checkbox( 'remember', old('remember') ); !!} 
                                    Recordarme
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                @lang('auth.btn_login')
                            </button>

                            
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                @lang('auth.lnk_forget_pass')
                            </a>
                            
                        
                        </div>

                    {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
