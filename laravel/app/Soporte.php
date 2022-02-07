<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    protected $fillable=[
        'name'

    ];

    //relaciones
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }
}
