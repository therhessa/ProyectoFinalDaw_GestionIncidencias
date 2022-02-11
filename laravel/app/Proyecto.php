<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'name', 'description','start'

    ];

    //Relaciones
    public function users(){
        return $this-> belongsToMany('App\User');


    }
    public function categorias()
    {
        return $this->hasMany('App\Categoria');
    }
    //un proyecto tiene varios tipos de soporte
    public function soportes()
    {
        return $this->hasMany('App\Soporte');
    }
   

}
