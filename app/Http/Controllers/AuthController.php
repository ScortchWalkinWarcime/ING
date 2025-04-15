<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Verificar si el usuario existe en la base de datos
        $user = User::where('username', $request->usuario)->first();

        if (!$user || !Auth::attempt(['username' => $request->usuario, 'password' => $request->password])) {
            return back()->withErrors(['usuario' => 'Usuario o contraseña incorrectos.']);
        }

        // Redirigir al menú si la autenticación es exitosa
        return redirect('/Menu');
    }
}
