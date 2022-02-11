<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;

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
        $user = auth()->user();
        $seleccionar_proyecto_id = $user->seleccionar_proyecto_id;

        if ($seleccionar_proyecto_id) {

            if(auth()->user()-> role=="Tecnico") {
                $mis_incidencias = App\Incidencia::where('proyecto_id', $seleccionar_proyecto_id)->where('tecnico_id', $user->id)->get();

                $proyectouser = App\ProyectoUser::where('proyecto_id', $seleccionar_proyecto_id)->where('user_id', $user->id)->first();

                if ($proyectouser) {
                    $incidenciasnoresueltas = App\Incidencia::where('tecnico_id', null)->where('soporte_id', $proyectouser->level_id)->get();
                } else {
                    $incidenciasnoresueltas = collect(); // empty when no project associated
                }
            }

              $incidents_by_me = App\Incidencia::where('cliente_id', $user->id)
                                        ->where('proyecto_id', $seleccionar_proyecto_id)->get();
        } else {
            $mis_incidencias = [];
            $incidenciasnoresueltas = [];
            $incidents_by_me = [];
        }

        return view('home')->with(compact('mis_incidencias', 'incidenciasnoresueltas','incidents_by_me'));


    }
    public function seleccionarProyecto($id)
    {
         // Validar que el usuario esté asociado con el proyecto

         $user = auth()->user();

            $user->seleccionar_proyecto_id=$id;
            $user->save();
            return back();

    }

}
