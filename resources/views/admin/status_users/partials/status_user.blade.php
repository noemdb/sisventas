<div>
    <p>
        <strong>Detalles del Registro del Estado del Usuario.</strong>
    </p>
  
    <div class="row">
        {{-- <div class="col-md-4">
            <img src="{{$status_user->url_img}}" alt="{{$status_user->username}}" class="img-thumbnail img-rounded">
        </div> --}}
        <div class="col-md-12">
            
            <div align="left">
                {{-- <h4></h4> --}}

                <ul class="list-group" style="margin: 0px;">
                    <li class="list-group-item list-group-item-{{$status_user->action}}">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Usuario:</div>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <strong>{{$status_user->username}}</strong>
                                {{-- <span class="label label-info pull-right">{{$status_user->model_class}}</span> --}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Acción:</div>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <span class="label label-{{$status_user->action}}">{{$status_user->action}}</span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">IP:</div>
                            <div class="col-md-7 col-sm-7 col-xs-7">{{$status_user->ip}}</div>
                        </div>
                    </li>
                    <li class="list-group-item" type="">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Mensaje:</div>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                {{$status_user->message}}
                            </div>
                        </div>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Creado</div>
                            <div class="col-md-8 col-sm-7 col-xs-7">
                                @if(isset($status_user->created_at))
                                    {{$status_user->created_at->format('d-m-Y h:m:s')}}
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">Actualizado</div>
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                @if(isset($status_user->created_at))
                                    {{$status_user->updated_at->format('d-m-Y h:m:s')}}
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>


    
</div>