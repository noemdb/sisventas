<table class="table table-striped" id="table-data-user">
    <tr>
        <th>N</th>
        <th>Usuario</th>
        <th>Acción</th>
        <th class="hidden-xs hidden-sm">Mensaje</th>
        <th>Creado</th>
        <th class="hidden-xs" title="IP">IP</th>
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        @php ($n=1)
    @foreach($status_users as $status_user)
        
        <tr data-id="{{$status_user->id}}" data-profile="{{$status_user->user_id}}">
            <td>{{$n++}}</td>
            <td id="username">
                {{$status_user->username}}
            </td>
            <td id="action">
                <span class="label label-{{$status_user->action}}">{{$status_user->action}}</span>
            </td>
            <td id="message" class="hidden-xs hidden-sm">
                {{$status_user->message}}
            </td>
            <td id="created_at">

                @if(!empty($status_user->created_at) && $status_user->created_at !='')
                    {{ date_format(new DateTime($status_user->created_at), 'd-m-Y') }}
                @endif

                {{-- {{$status_user->created_at}} --}}
            </td>
            <td id="IP" class="hidden-xs">
                {{$status_user->ip}}
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" data-target="#showstatus_user_modal_{{$status_user->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.status_users.modal.showstatus_user')

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>