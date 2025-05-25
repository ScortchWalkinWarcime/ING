<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('auth.login'); 
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'matricula' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate student
        if (Auth::guard('web')->attempt(['matricula' => $credentials['matricula'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/Menu');
        }

        // Attempt to authenticate teacher using the 'docentes' guard and provider  
        if (Auth::guard('docentes')->attempt(['correo' => $credentials['matricula'], 'contrasena' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/MenuMaestros');
        }

        // Attempt to authenticate Jefe de Division using the 'jefes_division' guard and provider 
        if (Auth::guard('jefedivision')->attempt(['matricula' => $credentials['matricula'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/MenuJefesDivision');
        }

        // Authentication failed
        return back()->withErrors([
            'matricula' => 'Invalid credentials.',
        ]);
    }
}