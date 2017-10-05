<div class="thumbnail">
    <p>
        <strong>Detalles del Usuario</strong>
        {{--
        <a data-toggle="collapse" class="btn btn-danger btn-xs pull-right" href="#{{'profile_table_collapse'.$profile->id}}" title="Cerrar">
            <span class="ion-close-round" aria-hidden="true"></span>
        </a>
        --}}
    </p>
@php ($class_perfil="")
@if(!is_null($profile->deleted_at))
    @php ($class_perfil="list-group-item-danger")
    <div class="alert alert-danger" role="alert">El perfil asociado a este usuario se encuentra en la papelera</div>
@endif

  
<div class="row">
    <div class="col-md-4">
        <img src="{{$profile->url_img}}" alt="{{$profile->profilename}}" class="img-thumbnail img-rounded">
    </div>
    <div class="col-md-8">
        

        <div align="left">
            {{-- <h4></h4> --}}

            <ul class="list-group" style="margin: 0px;">
                <li class="list-group-item list-group-item-{{$profile->is_active}}">
                    <div class="row">
                        <div class="col-md-4">Usuario:</div>
                        <div class="col-md-8">
                            <strong>{{$profile->profilename}}</strong>
                            <span class="label label-{{$profile->is_active}} pull-right">{{$profile->is_active}}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-4">Email:</div>
                        <div class="col-sm-8"><strong>{{$profile->email}}</strong></div>
                    </div>
                </li>
                @if(!empty($profile->id))
                <li class="list-group-item list-group-item-{{$profile->is_admin}} {{$class_perfil}}" type="">
                    <div class="row">
                        <div class="col-md-4">Roles:</div>
                        <div class="col-md-8">
                            <span class="label label-{{$profile->is_admin}} pull-right">{{$profile->is_admin}}</span>
                            <span class="label label-user{{$profile->is_user1}}">{{$profile->is_user1}}</span>
                            <span class="label label-user{{$profile->is_user2}}">{{$profile->is_user2}}</span>
                            <span class="label label-user{{$profile->is_user3}}">{{$profile->is_user3}}</span>
                        </div>
                    </div>
                </li>
                <li class="list-group-item {{$class_perfil}}">
                    <div class="row">
                        <div class="col-md-4">
                            Nombre
                        </div>
                        <div class="col-md-8">
                            {{$profile->fullname}}
                        </div>
                    </div>
                </li>
                @endif
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Creado</div>
                        <div class="col-md-8">
                            @if(isset($profile->created_at))
                                {{$profile->created_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">Actualizado</div>
                        <div class="col-md-8">
                            @if(isset($profile->created_at))
                                {{$profile->updated_at->format('d-m-Y h:m:s')}}
                            @endif
                        </div>
                    </div>
                </li>
                @if(!empty($profile->id))
                    <li class="list-group-item {{$class_perfil}}">
                        <div class="row">
                            <div class="col-md-4">Usuario Creado</div>
                            <div class="col-md-8">
                                
                                @if(!empty($profile->ucreated_at) && $profile->ucreated_at !='')
                                    {{ date_format(new DateTime($profile->ucreated_at), 'd-m-Y  h:i:s') }}
                                    {{-- {{$profile->pcreated_at->format('d-m-Y  hh:i:s')}} --}}
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item {{$class_perfil}}">
                        <div class="row">
                            <div class="col-md-4">Usuario Actualizado</div>
                            <div class="col-md-8">
                                @if(!is_null($profile->uupdated_at && $profile->uupdated_at !=''))
                                    {{ date_format(new DateTime($profile->uupdated_at), 'd-m-Y  h:i:s') }}
                                    {{-- {{$profile->pupdated_at->format('d-m-Y h:m')}} --}}
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