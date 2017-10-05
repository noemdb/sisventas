
<!-- Modal -->
<div class="modal fade " id="showprofile_modal_{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span class="ion-close-round" aria-hidden="true"></span>
        </button>

        <h5 class="modal-title" align="left" id="myModalLabel"><strong>Detalles de Usuario</strong></h5>
      </div>
      <div class="modal-body" align="left">


        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#showprofile_tab_{{$profile->id}}_general">Detalles</a></li>
          <li><a data-toggle="tab" href="#showprofile_tab_{{$profile->id}}_other1">Otros 1</a></li>
          <li><a data-toggle="tab" href="#showprofile_tab_{{$profile->id}}_other2">Otros 2</a></li>
        </ul>

        <div class="tab-content">
          <div id="showprofile_tab_{{$profile->id}}_general" class="tab-pane fade in active">
            {{-- <h3>General</h3> --}}
            {{-- <br> --}}
            @include('admin.profiles.partials.profile')
          </div>
          <div id="showprofile_tab_{{$profile->id}}_other1" class="tab-pane fade">
            <h3>Menu 1</h3>
            <p>Some content in menu 1.</p>
          </div>
          <div id="showprofile_tab_{{$profile->id}}_other2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
          </div>
        </div>

      </div>
      {{--
      <div class="modal-footer">

      </div>
      --}}
    </div>
  </div>
</div>