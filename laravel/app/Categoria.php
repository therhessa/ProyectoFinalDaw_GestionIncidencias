<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=[
        'name','proyecto_id'

    ];
//uno a muchos
//para cada proyecto hay varias categorias
    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }
}
