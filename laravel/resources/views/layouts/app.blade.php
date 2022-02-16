<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles --><!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <b-navbar toggleable="lg" type="dark" variant="info">
            <div class="container">
                <b-navbar-brand href="{{ url('/') }}">
                    {{ config('app.name', 'Sistema gestion incidencias') }}
                </b-navbar-brand>
                <b-navbar-toggle target="navbar-toggle-collapse">
                    <template #default="{ expanded }">
                      <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
                      <b-icon v-else icon="chevron-bar-down"></b-icon>
                    </template>
                  </b-navbar-toggle>

                <b-collapse id="navbar-toggle-collapse" is-nav>
                    <!-- Left Side Of Navbar -->
                    <b-navbar-nav class="ml-auto">
                        @if(Auth()->check())
                        <form class="navbar-form">
                            <div class="form-group">
                              <select id="lista-proyectos" class="form-control">
                                @foreach (auth()->user()->lista_proyectos as $proyecto)
                                  <option value="{{ $proyecto->id }}" @if($proyecto->id==auth()->user()->seleccionar_proyecto_id) selected @endif>{{ $proyecto->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </form>
                        @endif

                    </b-navbar-nav>

                    <!-- Right Side Of Navbar -->
                    <b-navbar-nav class="ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                            <b-nav-item class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</b-nav-item>
                            @if (Route::has('register'))
                               
                                    <b-nav-item class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>
                                
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </b-navbar-nav>
                </b-collapse>
            </div>
        </b-navbar>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        @include('includes.menu')

                    </div>
                    <div class="col-md-9">
                        @yield('content')

                    </div>

                </div>


            </div>


        </main>
    </div>
    <script src="/js/app1.js"></script>
    @yield('scripts')
</body>
</html>
