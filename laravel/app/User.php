<?php

namespace App;
use App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relaciones
    public function proyectos(){
        return $this->belongsToMany('App\Proyecto');
    }
    public function resolveAttend(Incidencia $incidencia)
    {
        return App\ProyectoUser::where('user_id', $this->id)
                        ->where('soporte_id', $incidencia->soporte_id)
                        ->first();
    }

    public function getListaProyectosAttribute(){
        if(auth()->user()->role =="Tecnico")
        {
            return $this->proyectos;

        }
        return Proyecto::all();
    }



}
