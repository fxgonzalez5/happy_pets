<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" type="text/css" href="../../css/admin_panel_persons.css">
    
    <!-- Importación de tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <!-- Importación de librería de iconos -->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

    <!-- Importación de AJAX para envio de datos entre JS y PHP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <!-- Declaración del archivo que contiene todas las funciones para utilizar -->
    <?php
        include("../../php/configuration/config.php");
        include("../../php/configuration/connection.php");
    
        $conexion = new class_mysql();
        $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);
    
        $idUsuario = $_GET['id'];
    ?>

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
            <?php
                echo "<a href='admin_panel_home.php?id=$idUsuario'>";
            ?>
                <div class="boton1">
                    <iconify-icon class="icono-home" icon="fluent:home-24-regular" height="24"></iconify-icon>
                    <p class="titulo2">Inicio</p>
                </div>
            </a>

            <?php
                echo "<a href='admin_panel_animals.php?id=$idUsuario'>";
            ?>
                <div class="boton1">
                    <iconify-icon icon="cil:animal" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Animales</p>
                </div>
            </a>

            <?php
                echo "<a href='admin_panel_persons.php?id=$idUsuario'>";
            ?>
                <div class="boton1">
                    <iconify-icon icon="heroicons:user-group" style="font-size: 24px;"></iconify-icon>
                    <p class="titulo2">Personas</p>
                </div>
            </a>

            <?php
                echo "<a href='admin_panel_postulants.php?id=$idUsuario'>";
            ?>
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
            <!-- <div class="buscador">
                <iconify-icon icon="material-symbols:search-rounded" style="font-size: 24px;"></iconify-icon>
                <input type="search" name="buscar" placeholder="Buscar...">
            </div> -->

            <!-- Creación del Calendario -->
            <!-- <div class="calendario">
                <iconify-icon icon="radix-icons:calendar" style="font-size: 24px;"></iconify-icon>
                <input type="date" name="fecha_inicial" >
                <p>-</p>
                <input type="date" name="fecha_final" >
            </div> -->

            <!-- Creación de las notificaciones -->
            <!-- <div class="notifiacion">
                <iconify-icon icon="ion:notifications-outline" style="font-size: 27px;"></iconify-icon>
            </div> -->

            <!-- Creación del boton para el panel de cuenta -->
            <div class="cuenta">
                <?php
                    $conexion->imagenCuenta();
                ?>
            </div>

        </div>

        <!-- Contenedor de Botones y Filtrados -->
        <div class="opciones">

            <!-- Boton para agregar una nueva mascota -->
            <button id="agregar" class="agregar">
                <iconify-icon icon="material-symbols:add-circle-outline-rounded" style="font-size: 20px;"></iconify-icon>
                Nueva Usuario
            </button>

            <!-- Menú desplegable para elegir el filtrado por la edad de las personas -->
            <!-- <select name="edad" id="edad">
                <option disabled selected>Edad</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select> -->

            <!-- Menú desplegable para elegir el filtrado por el género de las personas -->
            <!-- <select name="genero" id="genero">
                <option disabled selected>Género</option>
                <option value="M">Masculino</option>
                <option value="H">Femenino</option>
            </select> -->
            
            <!-- Menú desplegable para elegir el filtrado por el rol que tienen las personas -->
            <!-- <select name="rol" id="rol">
                <option disabled selected>Rol</option>
                <option value=0>Administrador</option>
                <option value=1>Usuario</option>
            </select> -->

            <!-- Boton para eliminar una o varias mascotas -->
            <button id="eliminar" class="eliminar">
                <iconify-icon icon="ic:round-delete-outline" style="font-size: 20px;"></iconify-icon>
                Eliminar
            </button>
        </div>

        <div class="contenedor">
            <div class="tabla">
                <?php
                    $conexion->personas();
                ?>
            </div>
        </div>

        <!-- Ventana flotante para ver la información de un usuario  -->
        <dialog id="ventana">
            <div class="cuadro">
                <form class="formulario">
                    <img id="cerrar" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Información del Usuario</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label>Número</label>
                            <input type="text" value="1" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Nombre</label>
                            <input type="text" value="Juan" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Apellido</label>
                            <input type="text" value="Pérez" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Usuario</label>
                            <input type="text" value="JuPerez81" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Edad</label>
                            <input type="text" value="28" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Género</label>
                            <select disabled>
                                <option value="M" selected>Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="datolargo">
                        <label>Correo Electrónico</label>
                        <input type="email" value="juperez@hotmail.com" disabled>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Celular</label>
                            <input type="text" value="+593 945671234" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Rol</label>
                            <select disabled>
                                <option value="0" selected>Administrador</option>
                                <option value="1">Usuario</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </dialog>

        <dialog id="ventana-n">
            <div class="cuadro">
                <form class="formulario" method="post" action="../../php/functions/insert_person.php">
                    <img id="cerrar-n" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Nuevo Usuario</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label for="id">Número</label>
                            <input type="text" id="id-n" name="id-n" disabled>
                        </div>

                        <div class="datocorto">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido">
                        </div>

                        <div class="datocorto">
                            <label for="usuario">Usuario</label>
                            <input type="text" id="usuario" name="usuario" placeholder="Ingrese un nombre de usuario">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="edad">Edad</label>
                            <input type="text" id="edad" name="edad" placeholder="Ingrese la edad">
                        </div>

                        <div class="datocorto">
                            <label for="genero">Género</label>
                            <select name="genero" id="genero">
                                <option disabled selected>Seleccione el género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="datolargo">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese el correo electrónico">
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="celular">Celular</label>
                            <input type="text" id="celular" name="celular" placeholder="Ingrese el número celular">
                        </div>

                        <div class="datocorto">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol">
                            <option disabled selected>Seleccione el rol</option>
                                <option value="0">Administrador</option>
                                <option value="1">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <button class="guardar-n">
                        <iconify-icon icon="material-symbols:save-outline-rounded" style="font-size: 25px;"></iconify-icon>
                        Guardar
                    </button>
                </form>
            </div>
        </dialog>

        <dialog id="ventana-e">
            <div class="cuadro">
                <form class="formulario" method="post" action="../../php/functions/insert_person.php">
                    <img id="cerrar-e" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Editar Usuario</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label for="id">Número</label>
                            <input type="text" id="id-e" name="id-e" disabled>
                        </div>

                        <div class="datocorto">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido">
                        </div>

                        <div class="datocorto">
                            <label for="usuario">Usuario</label>
                            <input type="text" id="usuario" name="usuario" placeholder="Ingrese un nombre de usuario">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="edad">Edad</label>
                            <input type="text" id="edad" name="edad" placeholder="Ingrese la edad">
                        </div>

                        <div class="datocorto">
                            <label for="genero">Género</label>
                            <select name="genero" id="genero">
                                <option disabled selected>Seleccione el género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="datolargo">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese el correo electrónico">
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="celular">Celular</label>
                            <input type="text" id="celular" name="celular" placeholder="Ingrese el número celular">
                        </div>

                        <div class="datocorto">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol">
                            <option disabled selected>Seleccione el rol</option>
                                <option value="0">Administrador</option>
                                <option value="1">Usuario</option>
                            </select>
                        </div>
                    </div>

                    <button class="guardar-e">
                        <iconify-icon icon="material-symbols:save-outline-rounded" style="font-size: 25px;"></iconify-icon>
                        Guardar
                    </button>
                </form>
            </div>
        </dialog>
    </div>

    <!-- Importación de código -->
    <script src="../../js/admin_script.js"></script>
</body>
</html>