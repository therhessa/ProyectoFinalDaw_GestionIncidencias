<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Soporte extends Model
{ 
    use SoftDeletes;
    protected $fillable=[
        'name','proyecto_id'

    ];

    //relaciones
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }
}
