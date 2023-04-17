<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        //Esto es para validar si el usuario ya esta logueado
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    public function register(Request $request)
    {
        $messages = [
            'nombre.required' => 'El nombre es requerido.',
            'nombre.min' => 'El nombre debe tener más de 2 caracteres.',
            'apellidos.required' => 'Los apellidos son requeridos.',
            'apellidos.min' => 'Los apellidos deben tener al menos 5 caracteres.',
            'edad.required' => 'La edad es requerida.',
            'email.required' => 'El correo electrónico es requerido.',
            'email.min' => 'El correo electrónico debe tener al menos 5 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 2 caracteres.',
            'password_confirm.required' => 'La confirmación de contraseña es requerida.',
            'password_confirm.same' => 'La confirmación de contraseña no coincide con la contraseña.'
        ];

        $reglas = [
            'nombre' => 'required|min:2',
            'apellidos' => 'required|min:5',
            'edad' => 'required',
            'email' => 'required|min:5|unique:users,email',
            'password' => 'required|min:2',
            'password_confirm' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $reglas, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'inputs' => $request->except('_token'),
            ]);
        }

        $newUser = User::create([
            'nombre' => trim($request->nombre),
            'apellidos' => trim($request->apellidos),
            'edad' => trim($request->edad),
            'email' => trim($request->email),
            'password' => Hash::make(trim($request->password)),
        ]);

        if ($newUser->exists) {
            return response()->json([
                'status' => 'success',
                'message' => 'usuario creado con exito',
            ]);
        } else {
            return response()->json([
                'status' => 'danger',
                'message' => 'Error al crear el usuario',
            ]);
        }
    }
}
