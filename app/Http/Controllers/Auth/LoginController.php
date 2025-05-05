<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController
{
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Verifica si el usuario ya existe
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Si no existe, lo registramos (ajusta según tu modelo)
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(24)), // contraseña aleatoria
                ]);
            }

            // Autenticar al usuario
            Auth::login($user);

            // Redirigir al menú
            return redirect('/Menu');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al iniciar sesión con Google');
        }
    }
}
