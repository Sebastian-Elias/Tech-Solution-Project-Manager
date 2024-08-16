@extends('layouts.app')

@section('title', 'Dashboard')

@section('css')
<!-- Agregar CSS personalizado aquí -->
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Dashboard</h1>

    <div class="card">
        <div class="card-header">
            Datos del Usuario
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            
        </div>
    </div>

    <hr>

    <h3>Mantenedores</h3>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('proyectos.index') }}">Proyecto</a>
        </li>
        <!-- Puedes agregar más enlaces aquí -->
    </ul>
</div>
@endsection
