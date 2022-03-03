@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Proyectos</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="app">
            <proyecto-component></proyecto-component>

        </div>

        {{-- <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="date">Fecha inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', date ('y-m-sd')) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar proyecto</button>
            </div>
        </form> --}}

        <table class="table table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th>Nombre Proyecto</th>
                    <th>Descripcion</th>
                    <th>Fecha inicio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->name }}</td>
                    <td>{{ $proyecto->description }}</td>
                    <td>{{ $proyecto->start ? : 'no hay fecha' }}</td>
                    <td>
                        @if ($proyecto->trashed())
                        <a href="/proyecto/{{ $proyecto->id }}/restaurar" class="btn btn-sm btn-success" title="Restaurar">
                            <span class="glyphicon glyphicon-repeat"></span>
                            Restaurar
                        </a>
                        @else
                        <a href="/proyecto/{{ $proyecto->id }}" class="btn btn-sm btn-primary" title="Editar">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Editar
                        </a>
                        <a href="/proyecto/{{ $proyecto->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                            <span class="glyphicon glyphicon-remove"></span>
                            Dar de Baja
                        </a>
                        @endif

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
