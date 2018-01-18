<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
       
        {!! MaterializeCSS::include_full() !!}
        <script>
            $( document ).ready(function(){
                $(".button-collapse").sideNav();
                $('.tooltipped').tooltip({delay: 50});
            });
        </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        {!! MaterializeCSS::include_css() !!}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key')
        ]) !!};
    </script>
    <script>
    jQuery(window).load(function(){
        jQuery(".preloader-wrapper").fadeOut(500);
    });
</script>


    <style type="text/css">
        .preloader-wrapper{
            width: 100px;
            height: 100px;

            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;

            margin: auto;
        }
    </style>
    
</head>
<body>
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
  </div>
    <div id="app">
          <nav class="blue">
            <div class="nav-wrapper">
              <a href="{{ url('/') }}" class="brand-logo"><i class="material-icons">note</i> {{ config('app.name', 'Laravel') }}</a>
              <a href="#" data-target="mobile-demo"  data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{ url('create') }}">Create Note</a></li>
                <li><a href="{{ url('about') }}">About</a></li>
                @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                @else
                            <li>
                                <a href=""> 
                                    <i class="material-icons right">person</i>
                                    {{ Auth::user()->name }} 
                                </a>
                            </li>
                             <li>
                             <a class="text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout <i class="material-icons right">power_settings_new</i>
                            </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </li>
                @endif 
              </ul>
             <ul class="side-nav" id="mobile-demo">
                  @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                     <li>
                <div class="user-view">
                  <div class="background teal">
                  </div>
                  <a href=""><i class="material-icons">person</i></a>
                            <a href=""><span class="white-text name">{{ Auth::user()->name }} </span></a>
                            <a href=""><span class="white-text email">{{ Auth::user()->email }}</span></a>
                </div></li>
                <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                             <i class="material-icons right">power_settings_new</i> Logout
                            </a>
                    </li>
                @endif
                <li><div class="divider"></div></li>
                <li><a class="subheader">Actions</a></li>
                <li><a class="waves-effect" href="{{ url('create') }}">Create Note</a></li>
                <li><a class="waves-effect" href="{{ url('about') }}">About</a></li>
              </ul>
            </div>
          </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  
    <script src="{{ URL::asset('/materialize-css/js/materialize.js') }}"></script>
    
</body>
</html>
