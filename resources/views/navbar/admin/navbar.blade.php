<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          {{-- <a class="navbar-brand" href="#">Project name</a> --}}
          <a href="#menu-toggle" {{-- href="{{ url('/') }}" --}} class="navbar-brand btn-under" id="menu-toggle">
            {{-- <span class="glyphicon glyphicon-menu-hamburger"></span> --}}
            <img alt="Brand" src="{{ asset('logo/shapes.png') }}" height="24px" width="24px">
            <img alt="Brand" src="{{ asset('logo/letters.png') }}" height="24px" width="90px">
            {{-- <img alt="Brand" src="{{ asset('logo/iniciales.png') }}" height="24px" width="24px">Project name --}}
            {{-- {{ config('app.name', 'Laravel') }} --}}
            {{-- <a href="#menu-toggle" class="btn btn-lg" id="menu-toggle">
                <span class="glyphicon glyphicon-menu-hamburger"></span>
            </a> --}}
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li {{-- class="active" --}}><a href="#">Inicio</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraciones <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.index') }}">Usuario</a></li>
                <li><a href="{{ route('profiles.index') }}">Perfiles</a></li>
                <li><a href="{{ route('activities.index') }}">Actividades</a></li>
                <li><a href="{{ route('statususer.index') }}">Estados</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            {{-- <li><a href="#contact">Contato</a></li> --}}
            {{-- <li><a href="#about">Acerca de...</a></li> --}}
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li>
              <a href="#">
                <span class="label label-primary">
                  <span class="glyphicon glyphicon-envelope"></span>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="label label-info">
                  <span class="glyphicon glyphicon-cloud"></span>
                </span>
              </a>
            </li>
            <li {{-- class="active" --}}>
              <a href="#">
                <span class="label label-warning">
                  <span class="glyphicon glyphicon-alert"></span>
                </span>
              </a>
            </li>
            @if (Auth::guest())
              <li><a href="{{ route('login') }}">Ingresar</a></li>
            @else
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span class="label label-danger">
                    <span class="glyphicon glyphicon-off"></span>
                  </span>
                </a>
                {!! Form::open(['route' => 'logout', 'method' => 'POST', 'id'=>'logout-form', 'role'=>'form']) !!}
                {{ csrf_field() }}
                {!! Form::close() !!}
              </li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>