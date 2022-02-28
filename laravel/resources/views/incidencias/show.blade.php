@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Incidencias</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

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
                    <td id="incidencia_soporte"> {{ $incidencia->soporte->name }}</td>
                    <td id="incidencia_state">{{ $incidencia->state }}</td>
                    <td id="incidencia_severity">{{ $incidencia->severity_full }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Título</th>
                    <td id="incidencia_summary">{{ $incidencia->title }}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td id="incidencia_description">{{ $incidencia->description }}</td>
                </tr>

            </tbody>
        </table>

        @if ($incidencia->tecnico_id == null && $incidencia->active && auth()->user()->resolveAttend($incidencia))
        <a href="/incidencia/{{ $incidencia->id }}/atender" class="btn btn-primary btn-sm" id="incidencia_btn_apply">
            Atender incidencia
        </a>
        @endif

        @if (auth()->user()->id == $incidencia->cliente_id)
            @if ($incidencia->active)
                <a href="/incidencia/{{ $incidencia->id }}/resolver" class="btn btn-info btn-sm" id="incident_btn_solve">
                    Marcar como resuelto
                </a>
                <a href="/incidencia/{{ $incidencia->id }}/editar" class="btn btn-success btn-sm" id="incident_btn_edit">
                    Editar incidencia
                </a>
            @else
                <a href="/incidencia/{{ $incidencia->id }}/abrir" class="btn btn-info btn-sm" id="incident_btn_open">
                    Volver a abrir incidencia
                </a>
            @endif
        @endif

        @if (auth()->user()->id == $incidencia->cliente_id && $incidencia->active)
        <a href="/incidencia/{{ $incidencia->id }}/derivar" class="btn btn-danger btn-sm" id="incidencia_btn_derive">
            Derivar al siguiente soporte
        </a>
        @endif

    </div>
</div>
@endsection
