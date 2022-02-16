
<div class="panel panel-primary">
   
    <div class="panel-body">
        <div class="list-group">
            @if(@auth() ->check())
            <b-list-group>
                <b-list-group-item  href="{{ route('home') }}" variant="primary">Panel de Control
                </b-list-group-item>
                <b-list-group-item href="/registrar"  variant="primary">Informar incidencias</b-list-group-item>
  
            </b-list-group>
            
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
