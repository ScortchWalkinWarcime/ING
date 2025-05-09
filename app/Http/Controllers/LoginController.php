<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoninController extends Controller
{
    public function show(){
        return view('wecome');
    }

    public function login(LoginRequest $request){
        $credentials = $request->getcredentiasls();

        if(!Auth::validate($credentials)){
            return redirect()->to('/Itesa')->withErrors('auth.failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user){
        if($user->hasRole('admin')){
            return redirect()->to('/admin');
        } elseif($user->hasRole('maestro')){
            return redirect()->to('/MenuMaestro');
        } elseif($user->hasRole('jefe_de_division')){
            return redirect()->to('/MenuJefe');
        } else {
            return redirect()->to('/Menu');
        }
    }
}
