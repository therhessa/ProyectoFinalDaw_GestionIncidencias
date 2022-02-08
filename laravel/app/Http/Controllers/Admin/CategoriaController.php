<?php

namespace App\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate( [
            'name' => ['required']

        ]);

    	App\Categoria::create($request->all());

    	return back();
    }

    public function update(Request $request)
    {
        $request->validate( [
            'name' => ['required']
            
        ]);

        $categoria_id = $request->input('categoria_id');
        $categoria = App\Categoria::find($categoria_id);
        $categoria->name = $request->input('name');
        $categoria->save();

        return back();
    }

    public function delete($id)
    {
        App\Categoria::find($id)->delete();
        return back();
    }
}
