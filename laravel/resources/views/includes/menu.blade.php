
<div class="panel panel-primary">
   
    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
            <a  href="{{ route('home') }}" class="list-group-item list-group-item-action active" aria-current="true">
                panel de control
                </a>
                <a href="/ver" class="list-group-item list-group-item-action">Incidencias</a>
                <a href="/registrar" class="list-group-item list-group-item-action">Informar incidencias</a>
            
                @if(@auth() ->user()-> role=="Admin")
                <lista2-component></lista2-component>
				
                @endif

            @else
            <div id="app">
                <lista-component></lista-component>


            </div>
                {{-- <a href="#" class="list-group-item list-group-item-action">Bienvenido</a>
                <a href="#" class="list-group-item list-group-item-action">instrucciones</a>
                <a href="#" class="list-group-item list-group-item-action">informacion</a> --}}
            @endif

          </div>





    </div>

</div>
