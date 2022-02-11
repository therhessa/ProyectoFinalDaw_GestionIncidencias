@extends('layouts.app')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        @if (auth() ->user()-> role=="Tecnico")
        <div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias asignadas</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Título</th>
						</tr>
					</thead>
					<tbody id="dashboard_my_incidents">
						@foreach ($mis_incidencias as $incidencia)
							<tr>
								<td>
									<a href="/ver/{{ $incidencia->id }}">
										{{ $incidencia->id }}
									</a>
								</td>
								<td>{{ $incidencia->categoria->name }}</td>
								<td>{{ $incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{ $incidencia->created_at }}</td>
								<td>{{ $incidencia->description }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

        <div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias sin asignar</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Título</th>
							<th>Opción</th>
						</tr>
					</thead>
					<tbody id="dashboard_pendientes">
                      
						    @foreach ($incidenciasnoresueltas as $incidencia)
							{{-- <tr>
								  <td>
									<a href="/ver/{{ $incident->id }}">
										{{ $incident->id }}
									</a>
								</td>  --}}

								<td>{{ $incidencia->categoria->name }}</td>
								<td>{{ $incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{ $incidencia->created_at }}</td>
								<td>{{ $incidencia->description }}</td>
								<td>
									<a href="" class="btn btn-primary btn-sm">
										Atender
									</a>
								</td>
							</tr>
						@endforeach   
                         
					</tbody>
				</table>
			</div>
		</div>
		@endif
       </div> 
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias realizadas cliente</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoría</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Título</th>
						
						</tr>
					</thead>
					<tbody id="dashboard_by_me">
						 @foreach ($incidents_by_me as $incidencia)
							<tr>
                                <td>{{$incidencia->id}}</td>
                                <td>{{$incidencia->categoria->name}}</td>
                                <td>{{$incidencia->severity_full}}</td>
                                <td>{{$incidencia->id}}</td>
                                <td>{{$incidencia->created_at}}</td>
                                <td>{{$incidencia->description}}</td>

								 {{-- <td>
									<a href="/ver/{{ $incidencia->id }}">
										{{ $incidencia->id }}
									</a>
								</td> --}}
								<td>{{ $incidencia->categoria_name }}</td>
								<td>{{ $incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{ $incidencia->created_at }}</td>
								<td>{{ $incidencia->title_short }}</td>
								<td>
									{{ $incidencia->soporte_id ? $incidencia->soporte->name : 'Sin asignar' }}
								</td> 
							</tr>
						@endforeach 
					</tbody>
				</table>
			
		</div>

















    </div>


	















<p>hola</p>

  
           
       
   

@endsection
