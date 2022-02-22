@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Proyecto</th>
                <th>Categoría</th>
                <th>Fecha de envío</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
            <tr>
                <td id="incidencia_key">{{ $incidencia->id }}</td>
                <td id="incidencia_proyecto">{{ $incidencia->proyecto->name }}</td>
                <td id="incidencia_categoria">{{ $incidencia->categoria_name }}</td>
                <td id="incidencia_created_at">{{ $incidencia->created_at }}</td>
        
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Asignada a</th>
                <th>Nivel</th>
                <th>Estado</th>
                <th>Severidad</th>
            </tr>
        </thead>
        <tbody>
         
            <tr>
                <td id="incidencia_responsible">{{ $incidencia->tecnico_name }}</td>
                <td id=incidencia_soporte>{{ $incidencia->soporte->name }}</td>
                <td id="incidencia_state">{{ $incidencia->state }}</td>
                <td id="incidencia_severity">{{ $incidencia->severity_full }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
    
</div>
@endsection