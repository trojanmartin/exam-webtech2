<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>WEBTECH - @yield('title')</title>
     <!-- MDB icon -->
  <link rel="icon" href="{{ asset('md/img/mdb-favicon.ico') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('md/css/bootstrap.min.css') }}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{ asset('md/css/mdb.min.css') }}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{ asset('md/css/style.css') }}">

    @section('head')
    @show

</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-dark red lighten-1">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">{{ __('web.main_route') }} <span class="sr-only">(current)</span></a>        
      </li>

      <li class="nav-item">
       <a class="nav-link" href="{{ url('octave') }}">{{ __('web.octave_console') }} <span class="sr-only">(current)</span></a>       
      </li>

      <li class="nav-item">
       <a class="nav-link" href="{{ url('work') }}">{{ __('web.work') }} <span class="sr-only">(current)</span></a>       
      </li>

      <li class="nav-item">
       <a class="nav-link" href="{{ url('documentation') }}">{{ __('web.documentation') }} <span class="sr-only">(current)</span></a>       
      </li>
    
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('web.dropdown') }}
        </a>
        <div class="dropdown-menu red lighten-1" id="dm" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white" href="{{ url('ball') }}">{{ __('web.ball') }}</a>
          <a class="dropdown-item text-white" href="{{ url('plane') }}">{{ __('web.plane_title') }}</a>
          <a class="dropdown-item text-white" href="{{ url('suspension') }}">{{ __('web.suspension') }}</a>
          <a class="dropdown-item text-white" href="{{ url('inverted_pendulum') }}">{{ __('web.pendulum') }}</a>
        </div>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false">{{ __('web.language') }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('locale/en') }}" ><img src="{{ asset('md/img/uk.png') }}" alt="uk" width="20" height="20"> EN</a></li>
                    <li><a href="{{ url('locale/sk') }}" ><img src="{{ asset('md/img/sk.png') }}" alt="sk" width="20" height="20"> SK</a></li>
                </ul>
            </li>
        </ul>
    
  </div>
</nav>

   
    <div class="container">
        @section('content')
        @show
    </div>
    




    <!-- jQuery -->
<script type="text/javascript" src="{{ asset('md/js/jquery.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('md/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('md/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('md/js/mdb.min.js') }}"></script>
  <!-- Your custom scripts (optional) -->
  

@section('scripts')

    @show

    
</body>
</html>
