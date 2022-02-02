@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Usuarios</div>

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
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8)) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Registrar usuario</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>soporte</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>proyecto1</td>
                    <td>soporte telefonico</td>
                    <td>
                        <a href="" class="btn btn-primary">Editar</a>
                        <a href="" class="btn btn-danger">Dar de baja</a>


                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
