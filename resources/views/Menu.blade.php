<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingenium</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .menu {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #333;
            width: 200px;
            padding: 10px;
            border-radius: 5px;
        }
        .menu-item {
            background: #444;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            text-align: left;
            width: 100%;
            display: block;
        }
        .submenu {
            display: none;
            background: #555;
            margin-top: 5px;
            padding-left: 10px;
        }
        .submenu a {
            display: block;
            color: white;
            padding: 5px 0;
            text-decoration: none;
        }
        .submenu a:hover {
            background: #666;
        }
    </style>
</head>
<body>
    <div class="menu">
        <button class="menu-item" onclick="toggleMenu('semestre')">Semestre Actual</button>
        <div id="semestre" class="submenu">
            <a href="#">Calificaciones Parciales</a>
            <a href="#">Calificaciones Finales</a>
            <a href="#">Mi Horario de Clases</a>
            <a href="#">Avisos Importantes</a>
        </div>
        
        <button class="menu-item" onclick="toggleMenu('generales')">Generales</button>
        <div id="generales" class="submenu">
            <a href="#">Mi Kardex</a>
            <a href="#">Cambio de Contraseña</a>
        </div>

        <button class="menu-item" onclick="location.href='/Itesa'">Salir del Portal</button>
    </div>

    <script>
        function toggleMenu(id) {
            var menu = document.getElementById(id);
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }
    </script>
</body>
</html>
