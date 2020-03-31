<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title', 'Pequitas Lenceria')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link href="{{asset('css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-select.css') }}" rel="stylesheet" />

</head>

<body class="@yield('body-class')">

<nav class="navbar navbar navbar-color-on-scroll fixed-top navbar-expand-lg bg-rose" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">Pequitas Lenceria<i class="material-icons">favorite</i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
           @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarme') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/home')}}">Dashboard</a>
                       @if (auth()->user()->admin)
                        <a class="dropdown-item" href="{{ url('/admin/products')}}">Administrar Productos</a>
                        <a class="dropdown-item" href="{{ url('/admin/categories')}}">Administrar Categorias</a>
                       @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com" target="_blank" data-original-title="Síguenos en Twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com" target="_blank" data-original-title="Me gusta en Facebook">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/" target="_blank" data-original-title="Síguenos en Instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@yield('content')

  <!--   Core JS Files   -->
  <script src="{{ asset('/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>
<!-- Funciones Adicionales para los formularios-->
 <script src="{{ asset('/js/functions.js')}}" type="text/javascript"></script>
 <!-- BOOTSTRAP SELECT PARA LAS LISTAS DEPLEGABLES-->
 <script src="{{ asset('/js/bootstrap-select.js')}}" type="text/javascript"></script>
<!-- PARA LAS MASCARAS A LOS INPUTS-->
<script src="{{ asset('/js/jquery.mask.js')}}" type="text/javascript"></script>
<!-- PARA FLASH LARACAST-->
<script>
    $('#flash-overlay-modal').modal();
</script>
</body>

</html>
