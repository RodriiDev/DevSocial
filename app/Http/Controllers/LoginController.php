<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Comprobar si las credenciales son correctas (el with es una forma de llenar valores a una variable de sesion)
        //back para redireccionar a pagina anterior
        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
