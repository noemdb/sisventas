<!-- INI navbar top -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>


      <!-- Branding Image -->
      <div  class="navbar-brand" id="main">

          <a href="#" data-toggle="offcanvas">
            <i class="glyphicon glyphicon-menu-hamburger"></i>
          </a>

          <a class="" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
      </div>

    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
{{--  <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul> --}}

      <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Private</a></li>
        <li><a href="#">Pictures</a></li>
        <li class="active">Vacation</li>        
      </ul>

      <!-- INI Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">

          <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
          @else
              {{-- Link de información de usuario --}}
              <li>{{ Auth::user()->username }}</li>
              <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>

              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('users.index') }}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Listado de Usuarios
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('profiles.index') }}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Listado de Perfiles
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('loggs.index') }}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Listado de Logs
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('statususer.index') }}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Listado de statususer
                          </a>
                      </li>
                  </ul>
              </li>
          @endif
      </ul>
      <!-- FIN Right Side Of Navbar -->
    </div>
  </div>
</nav>
<!-- FIN navbar top -->