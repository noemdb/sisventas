@extends('layouts.app_main')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">

                      @if (Session::has('operp_ok'))

                          <div class="alert alert-success alert-dismissible show" role="alert" align="center">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                              </button>
                              {{Session::get('operp_ok')}}.
                          </div>

                      @endif

                      <h3>
                          Detalles de Usuario
                          <small class="text-info">{{$user->id.'. '.$user->username}}</small>
                          <a title="Crear nuevo Usuario" class="btn btn-primary pull-right" href="{{ route('users.create') }}" role="button">
                              <span class="ion-person-add" aria-hidden="true"></span>
                          </a>
                      </h3>
                  </div>

                  <div class="panel-body">

                      @include('admin.users.partials.user')

                      <a class="btn btn-primary" href="{{ url()->previous() }}">
                          <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                          Ir al listado
                      </a>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                  </div>

              </div>
          </div>
      </div>
  </div>

@endsection

