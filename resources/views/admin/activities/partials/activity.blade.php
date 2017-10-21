<div>
    <p>
        <strong>Detalles de la Actividad.</strong>
        {{--
        <a data-toggle="collapse" class="btn btn-danger btn-xs pull-right" href="#{{'activity_table_collapse'.$activity->id}}" title="Cerrar">
            <span class="ion-close-round" aria-hidden="true"></span>
        </a>
        --}}
    </p>
  
<div class="row">
    {{-- <div class="col-md-4">
        <img src="{{$activity->url_img}}" alt="{{$activity->username}}" class="img-thumbnail img-rounded">
    </div> --}}
    <div class="col-md-12">
        

        <div align="left">
            {{-- <h4></h4> --}}

            <ul class="list-group" style="margin: 0px;">
                <li class="list-group-item list-group-item-{{$activity->is_active}}">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Usuario:</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <strong>{{$activity->username}}</strong>
                            {{-- <span class="label label-info pull-right">{{$activity->model_class}}</span> --}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Modelo:</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">{{$activity->model_class}}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">IP:</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">{{$activity->ip}}</div>
                    </div>
                </li>
                <li class="list-group-item" type="">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Action:</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <span class="label label-{{$activity->action}}">{{$activity->action}}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            url
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            {{$activity->url}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            pathInfo
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            {{$activity->pathInfo}}
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Data</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            <span class="text text-wrap">{{$activity->data}}</span>
                              
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Creado</div>
                        <div class="col-md-8 col-sm-7 col-xs-7">
                            @if(isset($activity->created_at))
                                {{$activity->created_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">Actualizado</div>
                        <div class="col-md-7 col-sm-7 col-xs-7">
                            @if(isset($activity->created_at))
                                {{$activity->updated_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
            </ul>

        </div>

    </div>
</div>


    
</div>