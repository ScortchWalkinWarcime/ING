<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INGENIUM Login</title>
    <style>
        * {
            font-family: Arial;
            color: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: radial-gradient(circle at 1.94% 27.59%, #002c57 0, #002b59 10%, #002959 20%, #002759 30%, #002558 40%, #092256 50%, #1e1f53 60%, #2b1b4f 70%, #34174b 80%, #3c1346 90%, #430e40 100%);
        }
        .header {
            width: 100%;
            background-color: #F6F2E6;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 0;
        }
        .header img {
            height: 60px; /* Ajusta la altura de las imágenes */
            margin: 0 10px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }
        .formulariocaja {
            background: rgb(252, 251, 251);
            backdrop-filter: blur(10px);
            padding: 2em;
            border-radius: 2em;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
        .h1 {
            font-size: 35px;
            margin-bottom: 1em;
        }
        .cajaentradatexto {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            margin-bottom: 1em;
            border-radius: 2em;
            border: 0.1em solid gray;
            text-align: center;
        }
        input::placeholder {
            color: #1E265D;
            font-weight: bold;
        }
        .botonenviar {
            width: 100%;
            padding: 0.8em;
            cursor: pointer;
            border: 1px solid black;
            border-radius: 2em;
            font-size: 1em;
            color: black;
            background: white;
            font-weight: bold;
            margin-bottom: 1em;
        }
        .boton-recuperar {
            background: #2E2F39;
            color: white;
        }
        .recuerdame-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
            margin-bottom: 1em;
        }
        img.logo {
            border-radius: 50%;
            padding: 1em;
            width: 8em;
            height: 8em;
        }
        footer {
            width: 100%;
            text-align: center;
            color: white;
            font-size: 16px;
            margin-top: 1em;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('Itesa-Logo.png') }}" alt="Logo de Itesa">
        <h2>Bienvenido a Portal Escolar</h2>
        <img src="{{ asset('Sec-Educacion.png') }}" alt="Otro Icono">
    </div>

    <div class="container">
        <div class="formulariocaja">
        <form method="POST" action="{{ route('login') }}" id="vaidrollteam">
    @csrf
    @if ($errors->any())
    <div style="color: red; margin-bottom: 1em;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1 class="h1">INGENIUM</h1>
    <img src="{{ asset('Ingenium-Logo.png') }}" class="logo" alt="Ingenium-Logo.png">
    <input type="text" name="usuario" id="usuario" placeholder="&#128100; Usuario" class="cajaentradatexto" required>
    <input type="password" name="password" id="password" placeholder="&#128274; Password" class="cajaentradatexto" required>
    <input type="submit" value="Iniciar sesión" class="botonenviar">
    <div class="recuerdame-container">
        <input type="checkbox" id="rememberMe" name="rememberMe">
        <label for="rememberMe">Recuérdame</label>
    </div>
    <a href="{{ url('/password/recover') }}" class="botonenviar boton-recuperar">Recuperar contraseña</a>
</form>
        </div>
    </div>

    <footer>
        © 2025 INGENIUM Login. Todos los derechos reservados | ITESA 
    </footer>
    <script>
        document.getElementById('vaidrollteam').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que se recargue la página automáticamente
            
            let usuario = document.getElementById('usuario').value;
            
            if (usuario.trim() === '') {
                alert('Por favor, ingresa un nombre de usuario.');
                return;
            }
            
            alert('Bienvenido ' + usuario);
            
            // Redirigir a la página con el menú después de la alerta
            window.location.href = "/Menu";
        });
        </script>
</body>
</html>