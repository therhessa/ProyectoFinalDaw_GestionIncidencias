<?php

namespace App\Http\Controllers\Admin;
use App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProyectoController extends Controller
{
    public function index(){
        $proyectos= App\Proyecto::all();
        return view('admin.proyectos.index')->with(compact('proyectos'));

    }
    public function edit($id){
        $proyecto= App\Proyecto::find($id);
        return view('admin.proyectos.edit')-> with(compact('proyecto'));

    }

}
