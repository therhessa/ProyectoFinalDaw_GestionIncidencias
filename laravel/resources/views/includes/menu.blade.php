
<div class="panel panel-primary">
    <div class="panel-heading"> Menu</div>
    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                panel de control
                </a>
                <a href="#" class="list-group-item list-group-item-action">Incidencias</a>
                <a href="/registrar" class="list-group-item list-group-item-action">Informar incidencias</a>
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Administración <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/usuarios">Usuarios</a></li>
						<li><a href="/proyectos">Proyectos</a></li>
						<li><a href="/config">Configuración</a></li>
					</ul>
				</li>

            @else
                <a href="#" class="list-group-item list-group-item-action">Bienvenido</a>
                <a href="#" class="list-group-item list-group-item-action">instrucciones</a>
                <a href="#" class="list-group-item list-group-item-action">creditos</a>
            @endif

          </div>





    </div>

</div>
