<div class="table-responsive">
    <table class="table">
      <tr>
        <th rowspan="4" width="30%">
            <img src="{{$user->profile['url_img']}}" alt="{{$user->username}}" class="img-thumbnail">
        </th>
        <th width="30%">
            Nombre de Usuario
        </th>
        <td width="40%">
            {{$user->username}}
        </td>
      </tr>
      <tr>
        <th>Activo</th>
        
        @if ($user->is_active=='1')
            <td class="info">
                {{trans('db_oper_result.user_is_active')}}
            </td>
        @else
            <td class="danger">
                {{trans('db_oper_result.user_no_active')}}
            </td>
        @endif


      </tr>
      <tr>
        <th>Tip.Usuario</th>
        
            @if ($user->profile['is_admin']=='1')
                <td class="info">
                    {{trans('db_oper_result.user_is_admin')}}
                </td>
            @else
                <td class="warning">

                    {{trans('db_oper_result.user_no_admin')}}
                    @if ($user->profile['is_user1']=='1')
                        {{' 1'}}
                    @endif

                    @if ($user->profile['is_user2']=='1')
                        {{' 2'}}
                    @endif

                    @if ($user->profile['is_user3']=='1')
                        {{' 3'}}
                    @endif

                </td>
            @endif

      </tr>

      <tr>
            <th>Nombre Completo</th>
            <td>
                {{$user->profile['firstname'].' '.$user->profile['lastname']}}
            </td>
      </tr>

      <tr>
        <th>Email</th>
        <td colspan="2">
            {{$user->email}}
        </td>
      </tr>
      <tr>
        <th>Creado</th>
        <td colspan="2">
            {{$user->created_at}}
        </td>
      </tr>
      <tr>
        <th>Actualizado</th>
        <td colspan="2">
            {{$user->updated_at}}
        </td>
      </tr>
    </table>
</div>

{{-- <div class="table-responsive">
    <table class="table">
        <tr>
            <td colspan="2">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <img src="{{$user->profile['url_img']}}" alt="{{$user->username}}" class="img-thumbnail">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{$user->username}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Nombre Completo</th>
            <td>{{$user->profile['firstname'].' '.$user->profile['lastname']}}</td>
        </tr>
        <tr>
            <th>Activo</th>

            @if ($user->is_active=='1')
                <td class="info">
                    {{trans('db_oper_result.user_is_active')}}
                </td>
            @else
                <td class="danger">
                    {{trans('db_oper_result.user_no_active')}}
                </td>
            @endif

        </tr>
        <tr>
            <th>Tip.Usuario</th>

            @if ($user->is_admin=='1')
                <td class="info">
                    {{trans('db_oper_result.user_is_admin')}}
                </td>
            @else
                <td class="danger">

                    {{trans('db_oper_result.user_no_admin')}}
                    @if ($user->profile['is_user1']=='1')
                        {{' 1'}}
                    @endif

                    @if ($user->profile['is_user2']=='1')
                        {{' 2'}}
                    @endif

                    @if ($user->profile['is_user3']=='1')
                        {{' 3'}}
                    @endif


                </td>
            @endif

        </tr>
        <tr>
            <th>Creado</th>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <th>Actualizado</th>
            <td>{{$user->updated_at}}</td>
        </tr>
    </table>
</div> --}}