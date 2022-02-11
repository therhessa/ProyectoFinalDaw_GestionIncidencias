<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Incidencia;

class IncidenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        //hacemos consulta para obtener categoria del proyecto que queremos
        $categorias= App\Categoria:: where('proyecto_id',1)->get();
        return view('registrar')->with((compact('categorias')));
    }
    public function store(Request $request){
            $this->validate($request, [
            'categoria_id' => 'sometimes|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
           
        ]);


        $incidencia= new Incidencia();
        $incidencia->categoria_id=$request->input('categoria_id') ?: null;
        $incidencia->severity=$request-> input('severity');
        $incidencia->title=$request-> input('title');
        $incidencia->description=$request-> input('description');
        $incidencia->cliente_id=auth()->user()->id;
        $incidencia->save();
        return back();

    }


}