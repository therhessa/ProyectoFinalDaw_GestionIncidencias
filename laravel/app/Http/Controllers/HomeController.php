<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
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

    public function config(){
        $user = Auth::user();
    	$id = $user->id;
        return view('user.config',array('user'=>App\User::find($id)));



    }



    public function update(Request $request){
		$user = Auth::user();
    	$id = $user->id;
        // $request->validate( [
        //     'name' => ['required|string|max:255'],
        //     'email' =>['required|string|email|max:255|unique:users,email,'.$id]

        // ]);

    	$name = $request->input('name');
    	$email = $request->input('email');
    	$user->name = $name;
    	$user->email = $email;

    	// Subir la imagen
    	$image_path = $request->file('image_path');
    	if($image_path){
    		// Asignar nombre unico con el timestamp actual como prefijo
    		$image_path_name = time() . $image_path->getClientOriginalName();
    		// Guardar en la carpeta (storage/app/user)
    		Storage::disk('users')->put($image_path_name, File::get($image_path));
    		// Seteo el nombre de la imagen en el objeto
    		$user->image = $image_path_name;
    	}

    	$user->update();


    	return redirect()->route('config')
    					 ->with(['message' => 'Usuario actualizado correctamente']) ;
    }
    public function getImage($filename){
    	$file = Storage::disk('users')->get($filename);
    	return  response($file, 200);
    }
    public function index()
    {
        $user = auth()->user();
        $seleccionar_proyecto_id = $user->seleccionar_proyecto_id;
        // dd( $seleccionar_proyecto_id);
                $mis_incidencias = App\Incidencia::where('proyecto_id', $seleccionar_proyecto_id)->where('tecnico_id', $user->id)->get();
                 ($mis_incidencias);
                $proyectouser = App\ProyectoUser::where('proyecto_id', $seleccionar_proyecto_id)->where('user_id', $user->id)->first();
               // dd($proyectouser);
                if ($proyectouser) {
                    $incidenciasnoresueltas = App\Incidencia::where('tecnico_id', null)->where('soporte_id', $proyectouser->soporte_id)->get();

                } else {
                    $incidenciasnoresueltas = collect(); // Vacío cuando no hay proyecto asociado
                }

              $incidents_by_me = App\Incidencia::where('cliente_id', $user->id)
                                        ->where('proyecto_id', $seleccionar_proyecto_id)->get();



        return view('home')->with(compact('mis_incidencias', 'incidenciasnoresueltas','incidents_by_me'));


    }
    public function seleccionarProyecto($id)
    {


        $user = auth()->user();
        $user->seleccionar_proyecto_id=$id;
        $user->save();
        return back();

    }


}
