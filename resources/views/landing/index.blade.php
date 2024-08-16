<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Custom CSS -->
    
    @yield('css')
    <style>
        /* CSS personalizado para centrar el contenido */
        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura completa de la ventana */
            padding-top: 50px; 
            box-sizing: border-box; /* Incluye padding en el cálculo de altura */
        }
        .card {
            width: 50%; /* Asegura que la tarjeta no se expanda más allá del contenedor */
            max-width: 320px; /* Máximo ancho para la tarjeta */
            height: 60%;
            border-radius: 0.5rem; /* Bordes redondeados */
            box-shadow: 0 0 15px rgba(0,0,0,0.1); /* Sombra para profundidad */
            
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
    <div class="card card-outline">
        <div class="card-header ">
            <img src="{{ asset('img/LogoTech.png')}}" alt="logo Tech" class="card-img-top " width="">
            
        </div>
        <div class="card-body d-flex justify-content-center align-items-center">
            
            <b>Grupo Akatsuki</b>
        </div>
        <div class="card-footer ">
            <a href="{{ route('usuario.login')}}" class="btn btn-primary w-100">Iniciar Sesión</a>
        </div>
    </div>

   
</body>
</html>
