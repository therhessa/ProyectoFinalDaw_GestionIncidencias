<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class ProyectoUserController extends Controller
{
    public function store(Request $request)
    {
    	// Elsoporte pertenezca al proyecto.
    	// Asegurar que el proyecto exista.
    	// Asegurar que el nivel exista.
    	// Asegurar que el usuario exista.

    	$proyecto_id = $request->input('proyecto_id');
    	$user_id = $request->input('user_id');

		$proyecto_user = App\ProyectoUser::where('proyecto_id', $proyecto_id)
										->where('user_id', $user_id)->first();

		if ($proyecto_user)
			return back()->with('notification', 'El usuario ya pertenece a este proyecto.');

    	$proyecto_user = new App\ProyectoUser();
    	$proyecto_user->proyecto_id = $proyecto_id;
    	$proyecto_user->user_id = $user_id;
    	$proyecto_user->soporte_id = $request->input('soporte_id');
    	$proyecto_user->save();

    	return back();
    }

    public function delete($id)
    {
    	App\ProyectoUser::find($id)->delete();
       

    	return back();
    }
}
