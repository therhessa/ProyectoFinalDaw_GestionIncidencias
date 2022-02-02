<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('admin.usuarios.index');

    }
    public function store(){
        return back();

    }
    public function edit(){
        return view('admin.usuarios.edit');

    }
    public function update(){
        return back();


    }

}
