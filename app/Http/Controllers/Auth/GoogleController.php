<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleController extends Controller
{
    // Redirigir al usuario a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar la respuesta de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Buscar si el usuario ya existe
            $user = User::where('email', $googleUser->getEmail())->first();

            // Si no existe, crearlo
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('password'), // Puedes mejorarlo
                ]);
            }

            // Iniciar sesión con el usuario
            Auth::login($user);

            return redirect('http://localhost:8000/Menu');

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'No se pudo autenticar con Google.');
        }
    }
}