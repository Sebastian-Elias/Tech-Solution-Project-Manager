<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function formularioLogin()
    {
        if (Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.login');
    }

    public function formularioNuevo()
    {
        if (Auth::check()){
            return redirect()->route('backoffice.dashboard');
        }
        return view('usuario.create');
    }

    public function login(Request $_request){

        $mensajes = [
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.'
        ];

        $_request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $mensajes);

        // Obtener las credenciales del request
        $credenciales = $_request->only('email','password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credenciales)){
            //verifica el usuario activo
            $user = Auth::user();
            if (!$user->activo) {
                Auth::logout();
                return redirect()->route('usuario.login')->withErrors(['email' => 'El usuario se encuentra desactivado.']);
            }
            //Autenticación exitosa
            $_request->session()->regenerate();
            return redirect()->route('backoffice.dashboard');
        } 
        else {
            // Verificar si el email existe en la base de datos
            $email = $_request->input('email');
            $user = \App\Models\User::where('email', $email)->first();
    
            if ($user) {
                // Email registrado pero credenciales incorrectas
                return redirect()->back()->withErrors(['password' => 'La contraseña es incorrecta.']);
            } else {
                // Email no registrado
                return redirect()->back()->withErrors(['email' => 'El email no se encuentra registrado.']);
            }
        }



    }

    public function registrar (Request $_request){
        $mensajes = [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email no tiene un formato válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'rePassword.required' => 'Repetir la contraseña es obligatorio.',
            'dayCode.required' => 'El código del día es obligatorio.'
        ];

        $_request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required',
            'password' => 'required|email',
            'rePassword' => 'required|string',
            'password' => 'required|string',
            'dayCode' => 'required|string'
        ], $mensajes);

        $datos = $_request->only('name','email','password','rePassword','dayCode');

        if ($datos['password'] != $datos['rePassword']){
            return back()->withErrors(['message' => 'Las contraseñas ingresadas no coinciden']);
        }



        if ($datos['dayCode'] != date("d")){
            return back()->withErrors(['message' => 'El código del día no corresponde.']);
        }

        try {
            User:: create([
                'name' => $datos['name'],
                'email' => $datos['email'],
                'password' => Hash::make($datos['password']),
            ]);
            return redirect()->route('usuario.login')->with('success', 'Usuario creado exitosamente');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return back()->withErrors(['message' => 'Error al crear usuario, el email ya existe.']);
            }
            return back()->withErrors(['message' => 'Error desconocido: ' . $e->getMessage()]);
        }

    }
}

