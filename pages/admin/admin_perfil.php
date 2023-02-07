<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Titulo de la pestaña -->
    <title>HappyPets</title>

    <!-- Carga del logo en la pestaña -->
    <link rel="icon" href="../../images/logo.png" sizes="32x32" />
    <link rel="icon" href="../../images/logo.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="../../images/logo.png" />

    <!-- Carga de estilos -->
    <link rel="stylesheet" type="text/css" href="../../css/global_style.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin/admin_perfil_style.css">

    <!-- Importación de tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <!-- Importación de librería de iconos -->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

</head>

<body>
    <div class="contenido-general">
        <!-- Contenedor del Menu -->
        <div class="menu">

            <!-- Contenedor del Logo -->
            <div class="img-logo">
                <img src="../../images/logo_happy_pets.png" alt="Logo HappyPets" height="75">
            </div>

            <!-- Título del Menu -->
            <p class="titulo1">Menu</p>

            <!-- Opciones del Menu -->
            <a href="admin_panel_home.html">
                <div class="boton1">
                    <iconify-icon class="icono-home" icon="fluent:home-24-regular" height="24"></iconify-icon>
                    <p class="titulo2">Inicio</p>
                </div>
            </a>

            <a href="admin_panel_animals.html">
                <div class="boton1">
                    <iconify-icon icon="cil:animal" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Animales</p>
                </div>
            </a>

            <a href="admin_panel_persons.html">
                <div class="boton1">
                    <iconify-icon icon="heroicons:user-group" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Personas</p>
                </div>
            </a>

            <a href="admin_panel_postulants.html">
                <div class="boton1">
                    <iconify-icon icon="teenyicons:text-document-outline" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Postulantes</p>
                </div>
            </a>

            <a class="btn-salir" href="../../index.html">
                <div class="boton1">
                    <iconify-icon icon="humbleicons:logout" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Cerrar Sesión</p>
                </div>
            </a>

        </div>

        <!-- Contenedor del Navegador -->
        <div class="barra-navegacion">

            <!-- Creación del Buscador -->
            <div class="buscador">
                <iconify-icon icon="material-symbols:search-rounded" style="font-size: 24px;"></iconify-icon>
                <input type="search" name="buscar" placeholder="Buscar...">
            </div>

            <!-- Creación del Calendario -->
            <div class="calendario">
                <iconify-icon icon="radix-icons:calendar" style="font-size: 24px;"></iconify-icon>
                <input type="date" name="fecha_inicial">
                <p>-</p>
                <input type="date" name="fecha_final">
            </div>

            <!-- Creación de las notificaciones -->
            <div class="notifiacion">
                <iconify-icon icon="ion:notifications-outline" style="font-size: 27px;"></iconify-icon>
            </div>

            <!-- Creación del boton para el panel de cuenta -->
            <div class="cuenta">
                <img src="../../images/admin/cuenta.jpg" alt="Cuenta">
            </div>

        </div>

        <div class="contenedor">
            <h3>Editar Perfil</h3>
            <img src="/images/admin/perfil.png" alt="">
            <div class="edit">
                <a href="">Cambiar imgen</a>
            </div>
            <form class="perfil" action="">
                <div class="N">
                    <label for="nombre">Nombre <span class="obligatorio"></span></label>
                    <input type="text" id="nombre" name="nombre" placeholder="jose" required>
                </div>

                <div class="A">
                    <label for="apellido">Apellido <span class="obligatorio"></span></label>
                    <input type="text" id="apellido" name="apellido" placeholder="Perez" required>
                </div>
                <div class="U">
                    <label for="usuario">Nombre de Usuario <span class="obligatorio"></span></label>
                    <input type="text" id="usuario" name="usuario" placeholder="esmeralda456" required>
                </div>
                <div class="C">
                    <label for="genero">Género</label>
                        <select id="genero" name="genero">
                            <option disabled selected>Seleccione su género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                </div>
                <div class="G">
                    <label for="Correo">Correo Electrónico <span class="obligatorio">*</span></label>
                    <input type="email" id="email" name="email" placeholder="happypets@utpl.edu.ec" required>
                </div>
                <div class="Nu">
                    <label for="Numero">Numero de Telefono <span class="obligatorio">*</span></label>
                    <input type="text" id="Numero" name="Numero" placeholder="0258722" required>
                </div>
                <div class="Fe">
                    <label for="fecha">Fecha de Nacimiento <span class="obligatorio">*</span></label>
                    <input type="date" id="fecha" name="fecha" placeholder="08/12/2004" required>
                </div>
                <div class="Co">
                    <label for="Contraseña">Contraseña <span class="obligatorio"></span></label>
                    <input type="text" id="contraseña" name="password" placeholder="********" required>
                </div>
            </form>
            <div class="gua">
                <a href="">Guardar</a>
            </div>

        </div>
    </div>
    </div>
</body>

</html>