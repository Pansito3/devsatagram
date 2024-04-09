<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');   
    }
    public function store(Request $request)
    {
        ///modificar el reques.. para el usuario duplicado
        $request->request->add(['username'=> Str::slug($request->username)]);
        ///solo se hace si es la ultima opcion
        ///

        //validacion de informacion
        $this->validate($request,
        [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);
      
        //para insertar en la base de datos
        User::create([
            'name' =>$request->name,
            'username'=> $request->username,
            'email' =>$request->email,
            'password' => $request->password
            //para hashear
            //'password' => Hash::make($request->password) sin embargo en laravel 10 ya esta esto
        ]);
        //Para autenticar un usuario
     /*   auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/
        //otra forma
        auth()->attempt($request->only('email','password'));
        //redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
