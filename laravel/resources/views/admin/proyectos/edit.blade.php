@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Editar proyecto</div>

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

        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $proyecto->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $proyecto->description) }}">
            </div>
            <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input type="date" name="start" class="form-control" value="{{ old('start', $proyecto->start) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar proyecto</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <p>Categorías</p>
                <form action="/categorias" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                    </div>
                    <button class="btn btn-primary">Añadir</button>                    
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-categoria="{{ $categoria->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/categoria/{{ $categoria->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <p>Niveles</p>
                <form action="/soportes" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                    </div>
                    <button class="btn btn-primary">Añadir</button>                    
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Soporte</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soportes as $key => $soporte)
                        <tr>
                            <td>N{{ $key+1 }}</td>
                            <td>{{ $soporte->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" title="Editar" data-soporte="{{ $soporte->id }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="/nivel/{{ $soporte->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
       
    </div>
</div>





@endsection
