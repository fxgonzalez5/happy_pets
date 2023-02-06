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
    <link rel="stylesheet" type="text/css" href="../../css/admin/admin_panel_home_style.css">
    
    <!-- Importación de tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

    <!-- Importación de librería de iconos -->
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

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

            <a class="btn-salir" href="../../index.php">
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
            <!-- <div class="calendario">
                <iconify-icon icon="radix-icons:calendar" style="font-size: 24px;"></iconify-icon>
                <input type="date" name="fecha_inicial" >
                <p>-</p>
                <input type="date" name="fecha_final" >
            </div> -->

            <!-- Creación de las notificaciones -->
            <!-- <div class="notifiacion">
                <iconify-icon icon="ion:notifications-outline" style="font-size: 27px;"></iconify-icon>
                <div class="circulo">
                    <p>1</p>
                </div>
            </div> -->

            <!-- Creación del boton para el panel de cuenta -->
            <div class="cuenta">
                <?php
                    $conexion->imagenCuenta();
                ?>
            </div>

        </div>

        <!-- Contenedor de la Tarjeta del Nuevo Usuario -->
        <div class="tarjeta-usuario">

            <!-- Creación de la parte superior de la tarjeta -->
            <div class="cabecera-tarjeta">
                <img src="../../images/admin/icons/add-user.png" width="24">
                <p class="titulo-tarjeta">Nuevo Usuario</p>
            </div>
            
            <!-- Creación de la parte central de la tarjeta -->
            <?php
                $conexion->nuevoUsuario();
            ?>

            <!-- Creación de la parte inferior de tarjeta -->
            <div class="pie-tarjeta">
                <div class="contenido">
                    <p class="porcentaje">50%&ThinSpace;</p>
                    <p>Información Completada</p>
                </div>

                <div class="boton2">
                    <p>Ver Perfil</p>
                </div>
            </div>
        </div>

        <!-- Contenedor de la Tarjeta de la Nueva Mascota -->
        <div class="tarjeta-mascota">

            <!-- Creación de la parte superior de la tarjeta -->
            <div class="cabecera-tarjeta">
                <img src="../../images/admin/icons/pet-care.png" width="24">
                <p class="titulo-tarjeta">Nueva Mascota</p>
            </div>
            
            <!-- Creación de la parte central de la tarjeta -->
            <?php
                $conexion->nuevaMascota();
            ?>

            <!-- Creación de la parte inferior de tarjeta -->
            <div class="pie-tarjeta">
                <div class="contenido">
                    <p class="porcentaje">80%&ThinSpace;</p>
                    <p>Completado</p>
                </div>

                <div class="boton2">
                    <p>Ver Información</p>
                </div>
            </div>
        </div>

        <!-- Contenedor de la Tarjeta de la Cantidades de Adopciones -->
        <div class="tarjeta-adopciones">
            
            <!-- Creación de la parte superior de la tarjeta -->
            <div class="cabecera-tarjeta">
                <img src="../../images/admin/icons/house.png" width="24">
                <p class="titulo-tarjeta">Adopciones</p>
            </div>

            <!-- Creación de la parte central de la tarjeta -->
            <div class="contenido">
                <?php
                    include("../../php/functions/selects.php");
                ?>
                
                <!-- Icono -->
                <img src="../../images/admin/icons/thunderbolt.png" width="30">
                
                <!-- Texto -->
                <div class="contenedor-cantidad">
                    <p class="cantidad">
                        <?php
                            echo $activas;
                        ?>
                    </p>
                    <p>Activas</p>
                </div>

                <img src="../../images/admin/icons/tick.png" width="30">
                <div class="contenedor-cantidad">
                    <p class="cantidad">
                        <?php
                            echo $completadas;
                        ?>
                    </p>
                    <p>Completadas</p>
                </div>

                <img src="../../images/admin/icons/pending.png" width="30">
                <div class="contenedor-cantidad">
                    <p class="cantidad">
                        <?php
                            echo $pendientes;
                        ?>
                    </p>
                    <p>Pendientes</p>
                </div>

                <img src="../../images/admin/icons/close.png" width="30">
                <div class="contenedor-cantidad">
                    <p class="cantidad">
                        <?php
                            echo $canceladas;
                        ?>
                    </p>
                    <p>Canceladas</p>
                </div>
            </div>
        </div>

        <!-- Contenedor de la Tarjeta del Listado de los Postulantes -->
        <div class="tarjeta-postulantes">

            <!-- Creación de la parte superior de la tarjeta -->
            <div class="cabecera-tarjeta">
                <img src="../../images/admin/icons/verify.png" width="24">
                <p class="titulo-tarjeta">Postulantes</p>
                <?php
                    echo "<a class='subtitulo-tarjeta' href='admin_panel_postulants.php?id=$idUsuario'>Ver todo</a>";
                ?>
                <a class="subtitulo-tarjeta" href="admin_panel_postulants.html">Ver todo</a>
            </div>

            <!-- Creación del contenido central de la tarjeta que corresponde a la tabla que contiene el listado de los postulantes -->
            <?php
                $conexion->postulantesInicio();
            ?>
        </div>

        <!-- Contenedor de las dos tarjetas de la parte inferior -->
        <div class="tablas">
            <!-- Contenedor de la tarjeta del Listado de los Usuarios -->
            <div class="tarjeta-inferior">

                <!-- Creación de la parte superior de la tarjeta -->
                <div class="cabecera-tarjeta">
                    <img src="../../images/admin/icons/persons.png" width="24">
                    <p class="titulo-tarjeta">Usuarios</p>
                    <?php
                        echo "<a class='subtitulo-tarjeta' href='admin_panel_persons.php?id=$idUsuario'>Ver todo</a>";
                    ?>
                </div>

                <!-- Creación del contenido central de la tarjeta que corresponde a la tabla que contiene el listado de los usuarios -->
                <?php
                    $conexion->usuariosInicio();
                ?>
            </div>

            <!-- Contenedor de la tarjeta del Listado de las Mascotas -->
            <div class="tarjeta-inferior">

                <!-- Creación de la parte superior de la tarjeta -->
                <div class="cabecera-tarjeta">
                    <img src="../../images/admin/icons/pets.png" width="24">
                    <p class="titulo-tarjeta">Mascotas</p>
                    <?php
                        echo "<a class='subtitulo-tarjeta' href='admin_panel_animals.php?id=$idUsuario'>Ver todo</a>";
                    ?>
                </div>

                <!-- Creación del contenido central de la tarjeta que corresponde a la tabla que contiene el listado de los usuarios -->
                <?php
                    $conexion->mascotasInicio();
                ?>
            </div>
        </div>
    </div>
</body>
</html>