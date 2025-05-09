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
            background: rgba(255, 255, 255, 0.9);
        }

        .logo-container {
            position: absolute;
            top: 250px;
            left: 500px;
            width: 1000px;
            z-index: 100;
        }

        .logo-container img {
            width: 100%;
            height: auto;
            opacity: 0.6;
        }

        .header {
            background-color: rgba(245, 222, 179, 0.8);
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
            background: rgba(51, 51, 51, 0.8);
            width: 200px;
            padding: 10px;
            border-radius: 5px;
            z-index: 10;
        }

        .menu-item {
            background: rgba(68, 68, 68, 0.8);
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
            background: rgba(85, 85, 85, 0.8);
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
            background: rgba(102, 102, 102, 0.8);
        }

        #calificaciones-container {
            position: absolute;
            top: 70px;
            left: 230px;
            background: rgba(249, 249, 249, 0.9);
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="logo-container">
        <img src="{{ asset('Itesa-Logo.png') }}" alt="Logo ITESA">
    </div>

    <div class="header">
        Bienvenido Alumno
    </div>

    <div class="menu">
        <button class="menu-item" onclick="toggleMenu('semestre')">Semestre Actual</button>
        <div id="semestre" class="submenu">
            <a href="#" onclick="cargarCalificaciones('parcial')">Calificaciones Parciales</a>
            <a href="#" onclick="cargarCalificaciones('final')">Calificaciones Finales</a>
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

    <div id="calificaciones-container"></div>

    <script>
        function toggleMenu(id) {
            var menu = document.getElementById(id);
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            function cargarCalificaciones(tipo) {
                fetch(`/calificaciones/${tipo}`)
                    .then(response => response.json())
                    .then(data => {
                        let contenedor = document.getElementById("calificaciones-container");
                        contenedor.innerHTML = `<h2>Calificaciones (${tipo === 'parcial' ? 'Parciales' : 'Finales'})</h2>`;

                        if (data.length === 0) {
                            contenedor.innerHTML += "<p>No hay calificaciones disponibles.</p>";
                            return;
                        }

                        let lista = document.createElement("ul");
                        data.forEach(calificacion => {
                            let item = document.createElement("li");
                            item.textContent = `${calificacion.materia}: ${calificacion.calificacion}`;
                            lista.appendChild(item);
                        });
                        contenedor.appendChild(lista);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Hubo un error al cargar las calificaciones.');
                    });
            }

            // Exponer la función para que pueda ser llamada desde los botones
            window.cargarCalificaciones = cargarCalificaciones;
        });
    </script>
</body>
</html>