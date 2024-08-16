<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        .login-page {
            background-color: #f4f6f9; /* Fondo gris claro */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content {
            width: 100%; /* Asegura que el contenedor ocupa todo el ancho disponible */
            max-width: 500px; /* Establece un ancho máximo para el contenedor */
            padding: 20px; /* Opcional: agrega relleno interno */
            box-sizing: border-box; /* Asegura que el padding no aumente el ancho total */
        }
        .card {
            border-radius: 0.5rem; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Sombra más sutil para profundidad */
        }
        .card-header {
            background-color: #007bff; /* Color del fondo del encabezado */
            color: white; /* Color del texto en el encabezado */
            text-align: center;
            padding: 0.75rem; /* Reduce el relleno del encabezado */
        }
        .card-body {
            padding: 1.5rem; /* Reduce el relleno del cuerpo de la tarjeta */
        }
        .card-footer {
            text-align: center;
            padding: 0.75rem; /* Reduce el relleno del pie de la tarjeta */
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.25rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .input-group-text {
            border-radius: 0.25rem;
        }
        .mb-3 {
            margin-bottom: 0.75rem; /* Reduce el margen inferior de los elementos del formulario */
        }
    </style>
</head>
<body class="hold-transition login-page">

    <!-- Main content -->
    <div class="content">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="mt-2">Crear Usuario</h5>
            </div>
            <div class="card-body">
                <!-- errores -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ Route('usuario.registrar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="Elias" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="sebatianelias1808@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" value="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="rePassword" class="form-label">Repetir Contraseña</label>
                        <input type="password" name="rePassword" id="rePassword" class="form-control" value="hola" required>
                    </div>
                    <div class="mb-3">
                        <label for="dayCode" class="form-label">Código de Día</label>
                        <input type="text" name="dayCode" id="dayCode" class="form-control" value="09" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>






