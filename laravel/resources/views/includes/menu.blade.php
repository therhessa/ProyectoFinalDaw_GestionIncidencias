
<div class="panel panel-primary">
    <div class="panel-heading"> Menu</div>
    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                panel de control
                </a>
                <a href="#" class="list-group-item list-group-item-action">Incidencias</a>
                <a href="#" class="list-group-item list-group-item-action">Informar incidencias</a>
                <a href="#" class="list-group-item list-group-item-action">Administracion</a>

            @else
                <a href="#" class="list-group-item list-group-item-action">Bienvenido</a>
                <a href="#" class="list-group-item list-group-item-action">instrucciones</a>
                <a href="#" class="list-group-item list-group-item-action">creditos</a>
            @endif

          </div>





    </div>

</div>
