<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //Esto es para validar si el usuario ya esta logueado
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return response()->json(['success' => true, 'user' => $user]);
        }
        return response()->json(['success' => false]);
    }
}
