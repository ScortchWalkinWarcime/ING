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

        .header {
            background-color: #f5deb3;
            color: #333;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
        }

        .menu {
            position: absolute;
            top: 70px;
            left: 10px;
            background: #333;
            width: 200px;
            padding: 10px;
            border-radius: 5px;
            z-index: 10;
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

        #calificaciones-container {
            position: absolute;
            top: 70px;
            left: 230px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="header">
        Bienvenido Jefe de Division
    </div>

    <div class="menu">
        <button class="menu-item" onclick="toggleMenu('grupos')">Admin De Mis Grupos</button>
        <div id="grupos" class="submenu">
            <a href="#" onclick="cargarCalificaciones('parcial')">Detalle de Maestros</a>
            <a href="#">Horario de Clases</a>
        </div>

        <button class="menu-item" onclick="toggleMenu('generales')">Generales</button>
        <div id="generales" class="submenu">
            <a href="#">Mi Kardex</a>
            <a href="#">Cambio de Contraseña</a>
        </div>

        <button class="menu-item" onclick="location.href='/Itesa'">Salir del Portal</button>
    </div>

    <div id="calificaciones-container"></div>

    <script>
        function toggleMenu(id) {
            var menu = document.getElementById(id);
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            function cargarCalificaciones(tipo) {
                fetch(`/calificaciones/${tipo}`)
                    .then(response => response.json())
                    .then(data => {
                        let contenedor = document.getElementById("calificaciones-container");
                        contenedor.innerHTML = "<h2>Materias</h2>";

                        if (data.length === 0) {
                            contenedor.innerHTML += "<p>No hay materias disponibles.</p>";
                            return;
                        }

                        let lista = document.createElement("ul");
                        data.forEach(item => {
                            let li = document.createElement("li");
                            li.textContent = `${item.materia}: ${item.calificacion}`;
                            lista.appendChild(li);
                        });
                        contenedor.appendChild(lista);
                    })
                    .catch(error => console.error('Error:', error));
            }

            window.cargarCalificaciones = cargarCalificaciones;
        });
    </script>
</body>
</html>
