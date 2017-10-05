@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">

                    @if (Session::has('operp_ok'))

                        <div class="alert alert-warning alert-dismissible show" role="alert" align="center">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            {{Session::get('operp_ok')}}.
                        </div>

                    @endif

                    Bienvenido, Ya ingresaste correctamente!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
