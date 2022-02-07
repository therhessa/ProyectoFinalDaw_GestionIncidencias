<?php

namespace App\Http\Controllers\Admin;
use App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProyectoController extends Controller
{
    public function index(){
        //todos los proyectos
        $proyectos= App\Proyecto::withTrashed()->get();
        return view('admin.proyectos.index')->with(compact('proyectos'));

    }
    public function store(Request $request){
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'start' => ['date']

        ]);
        //asignar varios datos a la vez
        App\Proyecto::create($request->all());
        return back()-> with('notification','el proyecto ha sido creado');




    }
    public function edit($id){
        $proyecto= App\Proyecto::find($id);
        return view('admin.proyectos.edit')-> with(compact('proyecto'));

    }
    public function update($id, Request $request){
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'start' => ['date']

        ]);
        App\Proyecto::find($id)->update($request->all());
        return back()-> with('notification','el proyecto ha sido actualizado');


    }
    public function delete($id){
        App\Proyecto::find($id)->delete();
        return back()-> with('notification','el proyecto ha sido eliminado');

        
    }
    public function restore($id){
        App\Proyecto::withTrashed()->find($id)->restore();
        return back()-> with('notification','el proyecto ha sido habilitado');

        
    }

}
