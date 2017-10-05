<!-- Modal -->
<div id="modal-del-confirm_{{$user->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content" align="center">
      <div class="modal-header danger">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>
        <h5 align="center" class="modal-title">Confirmación: <strong>Usuario:</strong> {{$user->username}}</h5>
      </div>
      <div class="modal-body" align="center">
      	{{-- <br> --}}
        <p class="text-danger text-center">Se borrará el Usuario:<br><strong>{{$user->username}}</strong><br>y su perfil asociado</p>
        <a href="#" class="btn-user-delete-confir btn btn-danger" id="modal-del-confirm-ok_{{$user->id}}">Aceptar</a>
      </div>
      
      {{-- 
      <div class="modal-footer">
      </div>
      --}}
    </div>

  </div>
</div>