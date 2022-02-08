<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
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
