<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoUser extends Model
{
    protected $table = 'proyecto_user';

    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }

    public function soporte()
    {
    	return $this->belongsTo('App\Soporte');
    }
}
