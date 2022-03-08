
<div class="panel panel-primary">

    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
                <a  href="{{ route('home') }}" class="list-group-item list-group-item-action active" aria-current="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                      </svg>
                panel de control
                </a>
                @if (auth() ->user()-> role=="Admin" || auth() ->user()-> role=="Tecnico" )
                <a href="/listaincidencias" class="list-group-item list-group-item-action">Incidencias</a>
                @endif
                <a href="/registrar" class="list-group-item list-group-item-action">Informar incidencias</a>
                @if(@auth() ->user()-> role=="Admin")

                     <div id="app">
                        <listaadmin-component></listaadmin-component>


                    </div>
					{{-- <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Administración <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/usuarios">Usuarios</a></li>
						<li><a href="/proyectos">Proyectos</a></li>

					</ul> --}}

                @endif

            @else
            <lista-component></lista-component>

                {{-- <a href="#" class="list-group-item list-group-item-action">Bienvenido</a>
                <a href="#" class="list-group-item list-group-item-action">instrucciones</a>
                <a href="#" class="list-group-item list-group-item-action">informacion</a> --}}
            @endif

          </div>





    </div>

</div>
