<div class="thumbnail">
    <p>
        <strong>Detalles del Usuario</strong>
        {{--
        <a data-toggle="collapse" class="btn btn-danger btn-xs pull-right" href="#{{'user_table_collapse'.$user->id}}" title="Cerrar">
            <span class="ion-close-round" aria-hidden="true"></span>
        </a>
        --}}
    </p>
@php ($class_perfil="")
@if(!is_null($user->pdeleted_at))
    @php ($class_perfil="list-group-item-danger")
    <div class="alert alert-danger" role="alert">El perfil asociado a este usuario se encuentra en la papelera</div>
@endif

  
<div class="row">
    <div class="col-md-4">
        <img src="{{$user->url_img}}" alt="{{$user->username}}" class="img-thumbnail img-rounded">
    </div>
    <div class="col-md-8">
        

        <div align="left">
            {{-- <h4></h4> --}}

            <ul class="list-group" style="margin: 0px;">
                <li class="list-group-item list-group-item-{{$user->is_active}}">
                    <div class="row">
                        <div class="col-md-4">Usuario:</div>
                        <div class="col-md-8">
                            <strong>{{$user->username}}</strong>
                            <span class="label label-{{$user->is_active}} pull-right">{{$user->is_active}}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">Email:</div>
                        <div class="col-sm-8"><strong>{{$user->email}}</strong></div>
                    </div>
                </li>
                @if(!empty($user->id_profile))
                <li class="list-group-item list-group-item-{{$user->is_admin}} {{$class_perfil}}" type="">
                    <div class="row">
                        <div class="col-md-4">Roles:</div>
                        <div class="col-md-8">
                            <span class="label label-{{$user->is_admin}} pull-right">{{$user->is_admin}}</span>
                            <span class="label label-user{{$user->is_user1}}">{{$user->is_user1}}</span>
                            <span class="label label-user{{$user->is_user2}}">{{$user->is_user2}}</span>
                            <span class="label label-user{{$user->is_user3}}">{{$user->is_user3}}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item {{$class_perfil}}">
                    <div class="row">
                        <div class="col-md-4">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            {{$user->fullname}}
                        </div>
                    </div>
                </li>
                @endif
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Creado</div>
                        <div class="col-md-8">
                            @if(isset($user->created_at))
                                {{$user->created_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Actualizado</div>
                        <div class="col-md-8">
                            @if(isset($user->created_at))
                                {{$user->updated_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                @if(!empty($user->id_profile))
                    <li class="list-group-item {{$class_perfil}}">
                        <div class="row">
                            <div class="col-md-4">Perfil Creado</div>
                            <div class="col-md-8">
                                
                                @if(!empty($user->pcreated_at) && $user->pcreated_at !='')
                                    {{ date_format(new DateTime($user->pcreated_at), 'd-m-Y  h:i:s') }}
                                    {{-- {{$user->pcreated_at->format('d-m-Y  hh:i:s')}} --}}
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item {{$class_perfil}}">
                        <div class="row">
                            <div class="col-md-4">Perfil Actualizado</div>
                            <div class="col-md-8">
                                @if(!is_null($user->pupdated_at))
                                    {{ date_format(new DateTime($user->pupdated_at), 'd-m-Y  h:i:s') }}
                                    {{-- {{$user->pupdated_at->format('d-m-Y h:m')}} --}}
                                @endif
                            </div>
                        </div>
                    </li>
                @endif

            </ul>

        </div>

    </div>
</div>


    
</div>