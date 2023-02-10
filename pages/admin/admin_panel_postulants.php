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
    <link rel="stylesheet" type="text/css" href="../../css/admin/admin_panel_postulants_styles.css">
    
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

            <!-- Menú desplegable para elegir el filtrado por la edad de las mascotas -->
            <!-- <select name="edad" id="edad">
                <option disabled selected>Edad</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select> -->

            <!-- Menú desplegable para elegir el filtrado por tiempo de edad de las mascotas -->
            <!-- <select name="tiempo" id="tiempo">
                <option disabled selected>Tiempo</option>
                <option value="D">Días</option>
                <option value="M">Meses</option>
                <option value="A">Años</option>
            </select> -->

            <!-- Menú desplegable para elegir el filtrado por el sexo de la mascotas -->
            <!-- <select name="sexo" id="sexo">
                <option disabled selected>Sexo</option>
                <option value="M">Macho</option>
                <option value="H">Hembra</option>
            </select> -->

            <!-- Menú desplegable para elegir el filtrado por el estado de la postulación -->
            <!-- <select name="estado" id="estado">
                <option disabled selected>Estado</option>
                <option value=1>Completado</option>
                <option value=2>Pendiente</option>
                <option value=3>Cancelado</option>
            </select> -->

            <!-- <input type="date" name="fecha" id="fecha"> -->

            <!-- Boton para eliminar una o varias mascotas -->
            <button id="eliminar" class="eliminar">
                <iconify-icon icon="ic:round-delete-outline" style="font-size: 20px;"></iconify-icon>
                Eliminar
            </button>
        </div>

        <div class="tabla">
            <?php
                $conexion->postulantes();
            ?>
        </div>

        <!-- Ventana flotante para ver la información de un usuario  -->
        <dialog id="ventana-p">
            <div class="cuadro">
                <form class="formulario" method="post" action="../../php/functions/update_postulation.php?id=<?php echo $idUsuario; ?>">
                    <img id="cerrar-p" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Información de la Postulación</p>
                    <div class="datocorto">
                        <label>Número</label>
                        <input type="text" id="numero" disabled>
                        <input type="hidden" id="idPos" name="idPos">
                        <input type="hidden" id="idMas" name="idMas">
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Persona</label>
                            <input type="text" id="persona" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Mascota</label>
                            <input type="text" id="mascota" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Celular</label>
                            <input type="text" id="celular" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Edad</label>
                            <input type="text" id="edad" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Correo Electrónico</label>
                            <input type="text" id="correo" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Sexo</label>
                            <input type="text" id="sexo" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Estado de la Postulación</label>
                            <select name="estado" id="estado">
                                <option value=0>Activa</option>
                                <option value=1>Completada</option>
                                <option value=2>Pendiente</option>
                                <option value=3>Cancelada</option>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label>Fecha</label>
                            <input type="text" id="fecha" disabled>
                        </div>
                    </div>

                    <button type="submit" class="guardar">
                        <iconify-icon icon="material-symbols:save-outline-rounded" style="font-size: 25px;"></iconify-icon>
                        Guardar
                    </button>
                </form>
            </div>
        </dialog>
    </div>

    <!-- Carga del identificador del usuario iniciado sesión -->
    <script>var idUsuario = <?php echo $idUsuario; ?>;</script>

    <!-- Importación de código -->
    <script src="../../js/admin_script.js"></script>
</body>
</html>