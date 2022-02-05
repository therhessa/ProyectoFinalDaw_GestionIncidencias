<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App;

class UserController extends Controller
{
    public function index(){
        $users= App\User::where('role','Tecnico')->get();
        return view('admin.usuarios.index')->with(compact('users'));

    }
    public function store(Request $request){

        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);
        $user=new App\User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->role= "Tecnico";
        $user-> save();



       // dd($request->all());

        return back()->with('notification','usuario registrado');

    }
    public function edit($id){
        $user= App\User::find($id);
        return view('admin.usuarios.edit')-> with(compact('user'));

    }
    public function update($id, Request $request){
        $user=App\User::find($id);
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['string', 'min:8'],

        ]);
        $user->name=$request->input('name');
        $password=$request->input('password');
        if ($password)
            $user-> password= bcrypt($password);

        $user->save();


        return back()->with('notification','usuario actualizado');


    }
    public function delete($id){
        $user= App\User::find($id);
        $user->delete();
        return back()->with('notification','usuario eliminado');

        

    }

}
