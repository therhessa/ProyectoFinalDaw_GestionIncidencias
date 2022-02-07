@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Editar usuario</div>

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
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" readonly value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar usuario</button>
            </div>
        </form>

        <form action="/proyecto-usuario" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="proyecto_id" class="form-control" id="select-project">
                        <option value="">Seleccione proyecto</option>
                         @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="soporte_id" class="form-control" id="select-level">
                        <option value="">Seleccione soporte</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-block">Asignar proyecto</button>
                </div>
            </div>
        </form>

        <p>Proyectos asignados</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>soporte</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($proyectos_user as $proyecto_user)
                <tr>
                    <td>{{ $proyecto_user->proyecto->name }}</td>
                    <td>{{ $proyecto_user->soporte->name }}</td>
                    <td>
                        <a href="/proyecto-usuario/{{ $proyecto_user->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
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
