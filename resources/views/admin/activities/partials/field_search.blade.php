<div align="right">
    {!! Form::open(['route' => [$route], 'method' => 'GET', 'role'=>'search']) !!}
        <div class="form-row">

            <div class="form-group col-md-2">
                @php ($username = array_add($username, '', 'Usuario'))
                {!! Form::select('user_id',$username,old('username'),['class' => 'form-control']); !!}
            </div>

            <div class="form-group col-md-2">
                @php ($action = array_add($action, '', 'Acción'))
                {!! Form::select('action',$action,old('action'),['class' => 'form-control']); !!}
            </div>

            <div class="form-group col-md-2">
                @php ($model_class = array_add($model_class, '', 'Modelo'))
                {!! Form::select('model_class',$model_class,old('model_class'),['class' => 'form-control']); !!}
            </div>

            <div class="form-group col-md-4">
                {!! Form::date('created_at', old('created_at'), ['class' => 'form-control','placeholder'=>'Buscar por fecha. Ej:(aaaa-mm-dd)']); !!}
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