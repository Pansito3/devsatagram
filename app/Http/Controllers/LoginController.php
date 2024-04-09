<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
        
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('mensaje','Credenciales Incorrectas');
        }
        //Se bien lo que hace, pero posts no se donde se encuentra esto--
        //nos dirigira a la la pagina muro, pero en el route se tiene como name posts.
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
