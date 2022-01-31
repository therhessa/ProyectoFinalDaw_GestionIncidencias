<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Categoria;
use App\Incidencia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getregistrar(){
        //hacemos consulta para obtener categoria del proyecto que queremos
        $categorias= Categoria:: where('proyecto_id',1)->get();
        return view('registrar')->with((compact('categorias')));
    }
    public function postregistrar(Request $request){
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
