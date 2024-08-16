<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
    <style>
        .login-page {
            background-color: #f4f6f9; /* Fondo gris claro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 50%; /* Asegura que la tarjeta no se expanda más allá del contenedor */
            max-width: 320px; /* Máximo ancho para la tarjeta */
            height: 60%;
            border-radius: 0.5rem; /* Bordes redondeados */
            box-shadow: 0 0 15px rgba(0,0,0,0.1); /* Sombra para profundidad */
        }
        .card-header {
            color: white; /* Color del texto en el encabezado */
            text-align: center;
            padding: 1rem;
        }
        .card-body {
            padding: 2rem;
        }
        .card-footer {
            text-align: center;
            padding: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.25rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .login-box-msg {
            margin-bottom: 1rem;
            font-size: 1.2rem;
            color: #333;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .input-group-text {
            border-radius: 0.25rem;
        }
        .mb-1, .mb-0 {
            margin-bottom: 0.5rem;
        }
        .card-header img {
            max-width: 100%; /* Ajusta el tamaño de la imagen según sea necesario */
            height: 200px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="{{ asset('img/LogoTech.png') }}" alt="logo Tech" class="card-img-top " width="">
        </div>
        <div class="card-body">
            <p class="login-box-msg">Ingrese sus credenciales</p>

            <!-- errores -->
            @if ($errors->any())
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <!-- success -->
            @if (session('success'))
                <ul class="list-unstyled">
                    <li class="text-success">{{ session('success') }}</li>
                </ul>
            @endif

            <form action="{{ route('usuario.validar') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Ingrese su Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Ingrese su Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recuerdame
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </div>
                </div>
            </form>

            <p class="mb-1">
                <a href="#">Olvidé mi contraseña</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('usuario.registrar') }}" class="text-center">Crear cuenta</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
