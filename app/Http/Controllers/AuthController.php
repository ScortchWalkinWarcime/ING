<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illiuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Verificar si el usuario existe en la base de datos
        $email = email::where('email', $request->email)->first();

        if (!$email || !Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors(['email' => 'Email o contraseña incorrectos.']);
        }

        // Redirigir al menú si la autenticación es exitosa
        return redirect('/Menu');
    }
}
