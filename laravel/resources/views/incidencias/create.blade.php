@extends('layouts.app')

@section('content')



            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="fw-bold">Registrar incidencia</p>
                </div>
                <div class="panel-body">
                    @if(count($errors)> 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors ->all() as $error )
                            <li> {{ $error}}</li>

                            @endforeach
                        </ul>

                    </div>
                    @endif

                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category_id"> Categoria</label>
                            <select name="category_id" class="form-control">
                                <option value="">General</option>
                                @foreach ($categorias as $categoria )
                                <option value="{{ $categoria->id}}">{{$categoria->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="severity">Severidad</label>
                            <select name="severity"  class="form-control">
                            <option value="M">Menor</option>
                            <option value="N">Normal</option>
                            <option value="A">Alta</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="title"> Titulo</label>
                            <input type="text" name="title"class="form-control form-control-lg">


                        </div>
                        <div class="form-group">
                            <label for="description"> Descripcion</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                           <button class="btn btn-primary"> Registrar incidencias</button>
                        </div>
                    </form>
                </div>

            </div>






@endsection
