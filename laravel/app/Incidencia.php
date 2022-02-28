<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model

{
    protected $appends = ['state'];
    //una incidencia pertenece a una categoria
    public function categoria(){

        return $this->belongsTo('App\Categoria');


    }
    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

    public function soporte()
    {
        return $this->belongsTo('App\soporte');
    }

    public function tecnico()
    {
        return $this->belongsTo('App\User', 'tecnico_id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\User', 'cliente_id');
    }

    public function getSeverityFullAttribute()
    {
    	switch ($this->severity) {
    		case 'M':
    			return 'Menor';

    		case 'N':
    			return 'Normal';

    		default:
    			return 'Alta';
    	}
    }
    public function getCategoriaNameAttribute()
    {
        if ($this->categoria)
            return $this->categoria->name;

        return 'General';
    }
    public function getTecnicoNameAttribute()
    {
        if ($this->tecnico)
            return $this->tecnico->name;

        return 'Sin asignar';
    }
    public function getStateAttribute()
    {
        if ($this->active == 0)
            return 'Resuelto';

        if ($this->tecnico_id)
            return 'Asignado';

        return 'Pendiente';
    }

}
