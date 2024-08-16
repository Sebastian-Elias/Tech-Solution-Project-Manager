<?php

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
})->name('raiz');

Route::get('/Login', [UserController::class, 'formularioLogin'])->name('usuario.login');
Route::post('/Login', [UserController::class, 'login'])->name('usuario.validar');

Route::get('/users/register', [UserController::class, 'formularioNuevo'])->name('usuario.registrar');
Route::post('/users/register', [UserController::class, 'registrar'])->name('usuario.registrar');

Route::get('/backoffice', function(){
    $user = Auth::user();
    if($user == NULL){
        return redirect()->route('usuario.login')->withErrors(['message' => 'No existe una sesión activa']);
    }
    return view('backoffice.dashboard', ['user' => $user]);
})->name('backoffice.dashboard');

Route::get('/backoffice/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::post('/backoffice/proyectos/new', [ProyectoController::class, 'create'])->name('proyectos.create');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('usuario.login')->with('success', 'Has cerrado sesión exitosamente.');
})->name('usuario.logout');