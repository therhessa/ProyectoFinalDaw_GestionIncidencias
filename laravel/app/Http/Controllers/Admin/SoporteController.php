<?php

namespace App\Http\Controllers\Admin;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SoporteController extends Controller

{
    public function AsignarProyecto($id)
    {
        return App\Soporte::where('proyecto_id', $id)->get();
    }
    public function store(Request $request)
    {
        $request->validate( [
            'name' => ['required']

        ]);
    	

    	App\Soporte::create($request->all());

    	return back();
    }

    public function update(Request $request)
    {
        $request->validate( [
            'name' => ['required']

        ]);

        $soporte_id = $request->input('soporte_id');
        
        $soporte = App\Soporte::find($soporte_id);
        $soporte->name = $request->input('name');
        $soporte->save();

        return back();
    }

    public function delete($id)
    {
        App\Soporte::find($id)->delete();
        return back();
    }
}
