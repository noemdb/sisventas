<table class="table table-striped" id="table-data-profile">
    <tr>
        <th class="hidden-xs">N</th>
        <th>Usuario</th>
        <th class="hidden-xs hidden-sm">Nom. Completo</th>
        <td class="hidden-xs" align="center"><strong>Estado</strong></td>
        <th title="Tipo de usuario">Tipo</th>
        <th title="Roles">Roles</th>
        
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        @php ($n=1)
    @foreach($profiles as $profile)
        
        <tr data-id="{{$profile->id}}" data-user="{{$profile->user_id}}">
            <td class="hidden-xs">{{$n++}}</td>
            <td id="profilename">
                 @if($profile->is_active=="Desactivo")
                    <span class="text text-danger">{{$profile->username}}</span>
                @else
                    <span class="text text-primary">{{$profile->username}}</span>
                @endif

            </td>
            <td class="hidden-xs hidden-sm" id="fullname">{{$profile->fullname}}</td>
            <td class="hidden-xs alert alert-{{$profile->is_active}}" id="is_active">
                {{$profile->is_active}}
            </td>
            <td align="left" class="alert alert-{{$profile->is_admin}}">
                {{$profile->is_admin}}
            </td>

            <td id="rol">
                <div class="label-group">
                    <span class="label label-user{{$profile->is_user1}}">{{$profile->is_user1}}</span>
                    <span class="label label-user{{$profile->is_user2}}">{{$profile->is_user2}}</span>
                    <span class="label label-user{{$profile->is_user3}}">{{$profile->is_user3}}</span>
                </div>
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" id="showprofile_modal" data-target="#showprofile_modal_{{$profile->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.profiles.modal.showprofile')

                    @if ($profile->trashed())
                        {{-- <a title="Restaurar" onclick="return confirm('Estas seguro? se restaurará el usuario y su perfil')" class="btn btn-primary btn-xs" href="{{route('profiles.restore',$profile->id)}}" role="button"><span class="ion-loop" aria-hidden="true"></span></a> --}}

                        <a title="Restaurar"
                            {{-- onclick="return confirm('Estas seguro? se restaurará el usuario y su perfil asociado')" --}}
                            class="btn-restore btn btn-primary btn-xs"
                            {{-- href="{{route('users.restore',$user->id)}}" --}}
                            href="" 
                            role="button">
                            <span class="ion-loop" aria-hidden="true"></span>
                        </a>

                        <a  title="Borrar definitivamente" 
                            {{-- onclick="return confirm('Estas seguro? Se eliminará definitivamente usuario y su perfile asociado')" --}}
                            class="btn-force-destroy btn btn-danger btn-xs"
                            {{-- href="{{route('users.force_destroy',$user->id)}}" --}}
                            href="#" 
                            role="button">
                            <span class="ion-close-circled" aria-hidden="true"></span>
                        </a>

                    @else
                        {{-- boton para mostrar en un modal de edicion de regsitro --}}
                        <a title="Editar resgistro" class="btn btn-warning btn-xs" href="#" data-toggle="modal" id="btn-editprofile_{{$profile->id}}" data-target="#edit_profile_modal_{{$profile->id}}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        {{-- modal para la edición del registro --}}
                        @include('admin.profiles.modal.editprofile')

                        {{-- modal confirmacion de borrado del registro --}}
                        @include('admin.profiles.modal.del_corfirm')

                        <a title="Eliminar" class="btn-delete btn btn-danger btn-xs" href="" id="btn-delete-profileid_{{$profile->id}}" data-target="#modal-del-confirm_{{$profile->id}}" data-toggle="modal" role="button">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>