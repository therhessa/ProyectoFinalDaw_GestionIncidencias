<?php

namespace App\Http\Controllers\Auth;
use App;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



     protected function authenticated()
     {
          $user = auth()->user();

         if(! $user->seleccionar_proyecto_id)
         {
             if (auth()->user()-> role=="Admin" ||auth() ->user()-> role=="Cliente"  ) {
                 $user->seleccionar_proyecto_id = App\Proyecto::first()->id;
               
                }
              
              
                 else
                {  // si el usuario de soporte no está asociado a ningún proyecto?
               $primer_proyecto = $user->proyectos->first();

                 if ($primer_proyecto)
                        ($user->seleccionar_proyecto_id = $primer_proyecto->id);

              }
              $user->save();
         }
     }

}
