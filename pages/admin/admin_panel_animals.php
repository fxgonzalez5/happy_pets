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
    <link rel="stylesheet" type="text/css" href="../../css/admin/admin_panel_animals_style.css">
    
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

        // Importación de los selects para obtener los datos de la mascota
        include("../../php/functions/selects.php");
        include("../../php/functions/select_data.php");
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

            <!-- Boton para agregar una nueva mascota -->
            <button id="agregar" class="agregar">
                <iconify-icon icon="material-symbols:add-circle-outline-rounded" style="font-size: 20px;"></iconify-icon>
                Nueva Mascota
            </button>
            
            <!-- Menú desplegable para elegir el filtrado por tipo de mascota -->
            <!-- <select name="tipo" id="tipo">
                <option disabled selected>Tipo de Animal</option>
                <option value=1>Mamífero</option>
                <option value=2>Ave</option>
                <option value=3>Pez</option>
                <option value=4>Anfibio</option>
                <option value=5>Reptil</option>
            </select> -->

            <!-- Menú desplegable para elegir el filtrado por la edad de las mascotas -->
            <!-- <select name="edad" id="edad">
                <option disabled selected>Edad</option>
                <?php
                    //for ($i=1; $i <= 31; $i++) { 
                    //    echo "<option value=$i>$i</option>";
                    //}
                ?>
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

            <!-- Boton para eliminar una o varias mascotas -->
            <button id="eliminar" class="eliminar">
                <iconify-icon icon="ic:round-delete-outline" style="font-size: 20px;"></iconify-icon>
                Eliminar
            </button>
        </div>

        <div class="tabla">
            <?php
                $conexion->animales();
            ?>
        </div>

    
        <!-- Ventana flotante para ver la información de la mascota  -->
        <dialog id="ventana">
            <div class="cuadro">
                <form class="formulario">
                    <img id="cerrar" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Información de la Mascota</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label>Número</label>
                            <input type="text" value="<?php echo $idMascota ?>" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Nombre</label>
                            <input type="text" value="<?php echo $mascota; ?>" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Tipo</label>
                            <select disabled>
                                <?php
                                    switch ($tipo) {
                                        case 1:
                                            echo "<option value=1 selected>Mamífero</option>";
                                            break;
                                        case 2:
                                            echo "<option value=2 selected>Ave</option>";
                                            break;
                                        case 3:
                                            echo "<option value=3 selected>Pez</option>";
                                            break;
                                        case 4:
                                            echo "<option value=4 selected>Anfibio</option>";
                                            break;
                                        case 5:
                                            echo "<option value=5 selected>Reptil</option>";
                                            break;
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label>Edad</label>
                            <input type="number" value="<?php echo $edad; ?>" disabled>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Sexo</label>
                            <select disabled>
                                <?php 
                                    if ($sexo == "M") {
                                        echo "<option value='M' selected>Macho</option>";
                                    } else {
                                        echo "<option value='H'>Hembra</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label>Tiempo</label>
                            <select disabled>
                                <?php 
                                    switch ($tiempo) {
                                        case 'D':
                                            echo "<option value='D' selected>Días</option>";
                                            break;
                                        case 'M':
                                            echo "<option value='M' selected>Meses</option>";
                                            break;
                                        case 'A':
                                            echo "<option value='A' selected>Años</option>";
                                            break;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Descripción</label>
                            <textarea cols="22" rows="5" disabled><?php echo $descripcion; ?></textarea>
                        </div>

                        <div class="datocorto">
                            <label>Imagen de la Mascota</label>
                            <div class="mascota"><img src="../../images/<?php echo $imagen; ?>"></div>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label>Adoptante</label>
                            <input type="text" value="<?php echo $adoptante; ?>" disabled>
                        </div>

                        <div class="datocorto">
                            <label>Fecha de Adpción</label>
                            <input type="date" value="<?php echo $fechaAdopcion; ?>" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </dialog>

        <dialog id="ventana-n">
            <div class="cuadro">
                <form class="formulario" method="post" action="../../php/functions/insert_pet.php?id=<?php echo $idUsuario ?>" enctype="multipart/form-data">
                    <img id="cerrar-n" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Nueva Mascota</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label>Número</label>
                            <input type="text" value="<?php echo $idUltimaMascota + 1; ?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $idUltimaMascota + 1; ?>">
                        </div>

                        <div class="datocorto">
                            <label for="mascota">Nombre</label>
                            <input type="text" id="mascota" name="mascota" placeholder="Ingrese el nombre de la mascota" required>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" class="tipo" name="tipo" required>
                                <option disabled selected>Seleccione un tipo</option>
                                <option value=1>Mamífero</option>
                                <option value=2>Ave</option>
                                <option value=3>Pez</option>
                                <option value=4>Anfibio</option>
                                <option value=5>Reptil</option>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label for="edad">Edad</label>
                            <input type="number" id="edad" name="edad" placeholder="Ingrese la edad de la mascota" required>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label form="sexo">Sexo</label>
                            <select id="sexo" name="sexo" required>
                                <option disabled selected>Seleccione el sexo de la mascota</option>
                                <option value='M'>Macho</option>
                                <option value='H'>Hembra</option>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label for="tiempo">Tiempo</label>
                            <select id="tiempo" name="tiempo" required>
                                <option disabled selected>Seleccione el tiempo de la edad</option>
                                <option value='D'>Días</option>
                                <option value='M'>Meses</option>
                                <option value='A'>Años</option>
                            </select>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" cols="22" rows="3" required></textarea>
                        </div>

                        <div class="datocorto">
                            <label for="imagen">Seleccione la imagen:</label>
                            <input type="file" class="input-file" name="imagen" id="imagen" required>
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
                <form class="formulario" method="post" action="../../php/functions/update_pet.php?id=<?php echo $idUsuario ?>" enctype="multipart/form-data">
                    <img id="cerrar-e" src="../../images/admin/icons/cancel.png" alt="Cerrar" width="35px">
                    <p class="titulo3">Editar Mascota</p>
                    <div class="fila">
                        <div class="datocorto">
                            <label>Número</label>
                            <input type="text" value="<?php echo $idMascota;?>" disabled>
                            <input type="hidden" name="id" value="<?php echo $idMascota; ?>">
                        </div>

                        <div class="datocorto">
                            <label for="mascota">Nombre</label>
                            <input type="text" id="mascota" name="mascota" value="<?php echo $mascota; ?>" placeholder="Ingrese el nombre de la mascota" required>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" class="tipo" name="tipo" required>
                                <?php
                                    switch ($tipo) {
                                        case 1:
                                            echo "<option value=1 selected>Mamífero</option>";
                                            echo "<option value=2>Ave</option>";
                                            echo "<option value=3>Pez</option>";
                                            echo "<option value=4>Anfibio</option>";
                                            echo "<option value=5>Reptil</option>";
                                            break;
                                        case 2:
                                            echo "<option value=1>Mamífero</option>";
                                            echo "<option value=2 selected>Ave</option>";
                                            echo "<option value=3>Pez</option>";
                                            echo "<option value=4>Anfibio</option>";
                                            echo "<option value=5>Reptil</option>";
                                            break;
                                        case 3:
                                            echo "<option value=1>Mamífero</option>";
                                            echo "<option value=2>Ave</option>";
                                            echo "<option value=3 selected>Pez</option>";
                                            echo "<option value=4>Anfibio</option>";
                                            echo "<option value=5>Reptil</option>";
                                            break;
                                        case 4:
                                            echo "<option value=1>Mamífero</option>";
                                            echo "<option value=2>Ave</option>";
                                            echo "<option value=3>Pez</option>";
                                            echo "<option value=4 selected>Anfibio</option>";
                                            echo "<option value=5>Reptil</option>";
                                            break;
                                        case 5:
                                            echo "<option value=1>Mamífero</option>";
                                            echo "<option value=2>Ave</option>";
                                            echo "<option value=3>Pez</option>";
                                            echo "<option value=4>Anfibio</option>";
                                            echo "<option value=5 selected>Reptil</option>";
                                            break;
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label for="edad">Edad</label>
                            <input type="number" id="edad" name="edad" value="<?php echo $edad ?>" placeholder="Ingrese la edad de la mascota" required>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label form="sexo">Sexo</label>
                            <select id="sexo" name="sexo" required>
                                <?php 
                                    if ($sexo == "M") {
                                        echo "<option value='M' selected>Macho</option>";
                                        echo "<option value='H'>Hembra</option>";
                                    } else {
                                        echo "<option value='M'>Macho</option>";
                                        echo "<option value='H' selected>Hembra</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label for="tiempo">Tiempo</label>
                            <select id="tiempo" name="tiempo" required>
                                <?php 
                                    switch ($tiempo) {
                                        case 'D':
                                            echo "<option value='D' selected>Días</option>";
                                            echo "<option value='M'>Meses</option>";
                                            echo "<option value='A'>Años</option>";
                                            break;
                                        case 'M':
                                            echo "<option value='D'>Días</option>";
                                            echo "<option value='M' selected>Meses</option>";
                                            echo "<option value='A'>Años</option>";
                                            break;
                                        case 'A':
                                            echo "<option value='D'>Días</option>";
                                            echo "<option value='M'>Meses</option>";
                                            echo "<option value='A' selected>Años</option>";
                                            break;
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" cols="22" rows="3" required><?php echo $descripcion; ?></textarea>
                        </div>

                        <div class="datocorto">
                            <label for="imagen">Seleccione la imagen:</label>
                            <input type="file" class="input-file" name="imagen" id="imagen">
                        </div>
                    </div>

                    <div class="fila">
                        <div class="datocorto">
                            <label for="adoptante">Adoptante</label>
                            <select name="adoptante" id="adoptante">
                                <option disabled selected>Ninguno</option>";
                                <?php
                                    $conexion->seleccionPostulante();
                                ?>
                            </select>
                        </div>

                        <div class="datocorto">
                            <label class="fecha">Fecha de Adpción</label>
                            <input type="date" id="fecha" name="fecha" value="<?php echo date("Y-m-d" , strtotime($fechaAdopcion)); ?>">
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