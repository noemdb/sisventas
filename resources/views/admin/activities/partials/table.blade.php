<table class="table table-striped" id="table-data-user">
    <tr>
        <th class="hidden-xs">N</th>
        <th>Usuario</th>
        <th>Acción</th>
        <th>Modelo</th>
        <th class="hidden-xs">Creadot</th>
        <th class="hidden-xs hidden-sm" title="pathInfo">pathInfo</th>
        <td align="right"><strong>Aciones</strong></td>
    </tr>

    <tbody id="tdatos">
        @php ($n=1)
    @foreach($activities as $activity)
        
        <tr data-id="{{$activity->id}}" data-profile="{{$activity->user_id}}">
            <td class="hidden-xs">{{$n++}}</td>
            <td id="username">
                {{$activity->username}}
            </td>
            <td id="action">
                <span class="label label-{{$activity->action}}">{{$activity->action}}</span>
            </td>
            <td id="model_class">
                {{$activity->model_class}}
            </td>
            <td class="hidden-xs" id="created_at">

                @if(!empty($activity->created_at) && $activity->created_at !='')
                    {{ date_format(new DateTime($activity->created_at), 'd-m-Y') }}
                @endif

                {{-- {{$activity->created_at}} --}}
            </td>
            <td id="pathInfo" class="hidden-xs hidden-sm">
                {{$activity->pathInfo}}
            </td>

            <td align="right" style="padding: 2px; vertical-align: middle;" id="action">
                <div class="btn-group">
                    
                    {{-- boton para mostrar en un modal de info de regsitro --}}
                    <a title="Mostrar detalles" class="btn btn-info btn-xs" href="#" data-toggle="modal" data-target="#showactivity_modal_{{$activity->id}}">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </a>
                    @include('admin.activities.modal.showactivity')

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>