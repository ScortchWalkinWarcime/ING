<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'txtusuario' => 'required',
            'txtpassword' => 'required'
        ]);

        $credentials = [
            'email' => $request->txtusuario, // Asegúrate de que el campo en la BD sea 'email'
            'password' => $request->txtpassword
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/Menu'); // Redirige al menú si los datos son correctos
        }

        return back()->withErrors(['message' => 'Usuario o contraseña incorrectos']);
    }
}