
<div class="panel panel-primary">
<<<<<<< HEAD

=======
   
>>>>>>> 40a25adf21e685aacbc75f00160cfc867822614a
    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
            <a  href="{{ route('home') }}" class="list-group-item list-group-item-action active" aria-current="true">
                panel de control
                </a>
                <a href="/ver" class="list-group-item list-group-item-action">Incidencias</a>
                <a href="/registrar" class="list-group-item list-group-item-action">Informar incidencias</a>
            
                @if(@auth() ->user()-> role=="Admin")
<<<<<<< HEAD
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Administración <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/usuarios">Usuarios</a></li>
						<li><a href="/proyectos">Proyectos</a></li>

					</ul>
				</li>
                @endif

            @else
            <lista-component></lista-component>
=======
                <lista2-component></lista2-component>
				
                @endif

            @else
            <div id="app">
                <lista-component></lista-component>


            </div>
>>>>>>> 40a25adf21e685aacbc75f00160cfc867822614a
                {{-- <a href="#" class="list-group-item list-group-item-action">Bienvenido</a>
                <a href="#" class="list-group-item list-group-item-action">instrucciones</a>
                <a href="#" class="list-group-item list-group-item-action">informacion</a> --}}
            @endif

          </div>





    </div>

</div>
