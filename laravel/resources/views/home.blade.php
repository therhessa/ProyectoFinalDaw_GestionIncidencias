@extends('layouts.app')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        
          @if (auth() ->user()-> role=="Tecnico"  )
        <div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias asignadas a mí</h3>
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
								<td>{{ $incidencia->categoria_name  }}</td>
								<td>{{$incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{ $incidencia->created_at }}</td>
								<td>{{ $incidencia->description }}</td>
                                <td>
									<a href="/ver/{{ $incidencia->id }}"
										{{ $incidencia->id }} class="btn btn-primary btn-sm">
										Atender
									</a>
								</td>

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
					<tbody id="dashboard_pending_incidents">
						@foreach ($incidenciasnoresueltas as $incidencia)
                        
							<tr>
								<td>
									<a href="/ver/{{ $incidencia->id }}">
										{{$incidencia->id }}
									</a>
								</td>
                             
								<td>{{ $incidencia->categoria_name }}</td>
								<td>{{$incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{ $incidencia->created_at }}</td>
								<td>{{ $incidencia->description }}</td>
								<td>
									<a href="/ver/{{ $incidencia->id }}"
										{{ $incidencia->id }} class="btn btn-primary btn-sm">
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

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Incidencias reportadas por mí</h3>
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
							<th>Responsable</th>
						</tr>
					</thead>
					<tbody id="dashboard_by_me">
						@foreach ($incidents_by_me as $incidencia)
							<tr>
								<td>
									<a href="/ver/{{ $incidencia->id }}">
										{{ $incidencia->id }}
									</a>
								</td>
								<td>{{$incidencia->categoria_name  }}</td>
								<td>{{$incidencia->severity_full }}</td>
								<td>{{ $incidencia->state }}</td>
								<td>{{$incidencia->created_at }}</td>
								<td>{{$incidencia->description }}</td>
								 <td>
									{{ $incidencia->tecnico_id ? $incidencia->tecnico->name : 'Sin asignar' }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>

    </div>
</div>
@endsection
