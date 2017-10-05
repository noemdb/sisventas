<div class="modal fade" id="modal_create" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear nuevo usuario</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                            {{ csrf_field() }}

                            @include('admin.users.partials.field');

                            <div align="center">
                                <div class="btn-group">
         
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Estas seguro');">
                                        <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
                                        Registrar 
                                    </button>

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
            </div>
        </div>
    </div>
    
  </div>
</div>