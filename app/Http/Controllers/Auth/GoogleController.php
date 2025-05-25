<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\JefeDivision;

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

            $email = $googleUser->getEmail();

            // Attempt to find user in Estudiante model
            $estudiante = Estudiante::where('correo', $email)->first();
            if ($estudiante) {
                Auth::guard('web')->login($estudiante);
                return redirect('/Menu');
            }

            // Attempt to find user in Docente model
            $docente = Docente::where('correo', $email)->first();
            if ($docente) {
                Auth::guard('docentes')->login($docente);
                return redirect('/MenuMaestros');
            }

            // Attempt to find user in JefeDivision model
            $jefeDivision = JefeDivision::where('correo', $email)->first();
            if ($jefeDivision) {
                Auth::guard('jefedivision')->login($jefeDivision);
                return redirect('/MenuJefesDivision');
            }

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'No se pudo autenticar con Google.');
        }
    }
}