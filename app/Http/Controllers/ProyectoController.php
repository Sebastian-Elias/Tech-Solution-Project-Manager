<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProyectoController extends Controller
{
    public function index(){
        $user = Auth::user();
        if ($user == NULL){
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe sesión activa.']);
        }
        $datos = Proyecto::all();
        return view('backoffice.mantenedor.proyecto', [
            'user' => $user, 
            'datos' => $datos
        ]);
    }

    public function getById(){

    }

    public function create(Request $_request){
        $user = Auth::user();
        if ($user == NULL){
            return redirect()->route('usuario.login')->withErrors(['message' => 'No existe sesión activa.']);
        }
    
        // Validar solicitud
        $mensajes = [
            'name.required' => 'El nombre del proyecto es obligatorio.',
            'name.unique' => 'El nombre del proyecto ya existe.'
        ];
    
        $_request->validate([
            'name' => 'required|string|max:255|unique:proyectos,name'
        ], $mensajes);
        
        // Verificar datos recibidos
        // dd($_request->all());
        //dd('Validation passed'); // Si ves este mensaje, la validación fue exitosa.
        //Log::info('Intentando crear un proyecto', $_request->all());

    
        try {
            // Insertar el registro en la base de datos
            $proyecto = Proyecto::create([
                'name' => $_request->name,
                'activo' => false,
                'user_id' => $user->id
            ]);
            
            // Verifica si el objeto Proyecto fue creado
            //dd($proyecto); 
    
            return redirect()->back()->with('success', 'Proyecto creado exitosamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear el proyecto: ' . $e->getMessage());
        } 
    }
    

    public function enable(){

    }

    public function disable(){

    }

    public function delete(){

    }

    public function update(){

    }


}
