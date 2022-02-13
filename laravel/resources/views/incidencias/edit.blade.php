@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
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
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" class="form-control">
                    <option value="">General</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if($incidencia->categoria_id == $categoria->id) selected @endif>{{ $categoria->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="severity">Severidad</label>
                <select name="severity" class="form-control">
                    <option value="M" @if($incidencia->severity=='M') selected @endif>Menor</option>
                    <option value="N" @if($incidencia->severity=='N') selected @endif>Normal</option>
                    <option value="A" @if($incidencia->severity=='A') selected @endif>Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $incidencia->title) }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control">{{ old('description', $incidencia->description) }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>

    </div>
</div>
@endsection