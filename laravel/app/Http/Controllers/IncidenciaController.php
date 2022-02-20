<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;


class IncidenciaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listincident(){
        $incidencias = App\Incidencia::all();
        return view('incidencias.list')->with(compact('incidencias'));
        }
    public function show($id){
        $incidencia = App\Incidencia::findOrFail($id);
        $mensajes = $incidencia->messages;
        return view('incidencias.show')->with(compact('incidencia', 'mensajes'));
        }

    public function create(){
        //hacemos consulta para obtener categoria del proyecto que queremos
        $categorias= App\Categoria:: where('proyecto_id', auth()->user()->seleccionar_proyecto_id)->get();
        return view('incidencias.create')->with((compact('categorias')));
    }
    public function store(Request $request){
            $this->validate($request, [
            'categoria_id' => 'sometimes|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'

        ]);


        $incidencia= new App\Incidencia();
        $incidencia->categoria_id=$request->input('categoria_id') ?: null;
        $incidencia->severity=$request-> input('severity');
        $incidencia->title=$request-> input('title');
        $incidencia->description=$request-> input('description');
        $user=auth()->user();
        $incidencia->cliente_id=$user->id;
        $incidencia->proyecto_id=$user->seleccionar_proyecto_id;
        $incidencia->soporte_id= App\Proyecto::find($user->seleccionar_proyecto_id)->first_soporte_id;

        //dd($incidencia);
        $incidencia->save();
        return back();

    }
   

    public function attend($id)
    {
        $user = auth()->user();

        if (! auth() ->user()-> role=="Tecnico")
            return back();

        $incidencia = App\Incidencia::findOrFail($id);

        // There is a relationship between user and project?
        $proyecto_user = App\ProyectoUser::where('proyecto_id', $incidencia->proyecto_id)
                                        ->where('user_id', $user->id)->first();

        if (! $proyecto_user)
            return back();

        // soporte is the same?
        if ($proyecto_user->soporte_id != $incidencia->soporte_id)
            return back();

        $incidencia->tecnico_id = $user->id;
        $incidencia->save();

        return back();
    }

    public function solve($id)
    {
        $incidencia = App\Incidencia::findOrFail($id);

        // Is the user authenticated the author of the incident?
        if ($incidencia->cliente_id != auth()->user()->id)
            return back();

        $incidencia->active = 0; // false
        $incidencia->save();

        return back();
    }

    public function open($id)
    {
        $incidencia = App\Incidencia::findOrFail($id);

        // Is the user authenticated the author of the incident?
        if ($incidencia->cliente_id != auth()->user()->id)
            return back();

        $incidencia->active = 1; // true
        $incidencia->save();

        return back();
    }

    public function nextSoporte($id)
    {
        $incidencia = App\Incidencia::findOrFail($id);
        $soporte_id = $incidencia->soporte_id;

        $proyecto = $incidencia->proyecto;
        $soportes = $proyecto->soportes;

        $next_soporte_id = $this->getNextSoporteId($soporte_id, $soportes);

        if ($next_soporte_id) {
            $incidencia->soporte_id = $next_soporte_id;
            $incidencia->tecnico_id = null;
            $incidencia->save();
            return back();
        }

        return back()->with('notification', 'No es posible derivar porque no hay un siguiente soporte.');
    }

    public function getNextSoporteId($soporte_id, $soportes)
    {
        if (sizeof($soportes) <= 1)
            return null;

        $position = -1;
        for ($i=0; $i<sizeof($soportes)-1; $i++) { // -1
            if ($soportes[$i]->id == $soporte_id) {
                $position = $i;
                break;
            }
        }

        if ($position == -1)
            return null;



        return $soportes[$position+1]->id;
    }

    public function edit($id)
    {
        $incidencia = App\Incidencia::findOrFail($id);
        $categorias = $incidencia->proyecto->categorias;
        return view('incidencias.edit')->with(compact('incidencia', 'categorias'));
    }

    public function update(Request $request, $id)
    {


        $incidencia = App\Incidencia::findOrFail($id);

        $incidencia->categoria_id = $request->input('categoria_id') ?: null;
        $incidencia->severity = $request->input('severity');
        $incidencia->title = $request->input('title');
        $incidencia->description = $request->input('description');

        $incidencia->save();
        return redirect("/ver/$id");
    }



}
