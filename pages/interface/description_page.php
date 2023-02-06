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
    <link rel="stylesheet" type="text/css" href="../../css/interface/description_style.css">

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
    
        $idMascota = $_GET['id'];

        // Consulta de la información de la mascota
        $sql = "SELECT * FROM mascota WHERE idMascota = $idMascota";
        $data = $conexion->queryFor($sql);

        $nombre = $data['nombre'];
        $imagen = $data['imagen'];

        switch ($data['tipo']) {
            case 1:
                $tipo = "Mamífero";
                break;
            case 2:
                $tipo = "Ave";
                break;
            case 3:
                $tipo = "Pez";
                break;
            case 4:
                $tipo = "Anfibio";
                break;
            case 5:
                $tipo = "Reptil";
                break;
            default:
                $tipo = "Otro";
                break;
        }

        $edad   = $data['edad'];
        
        switch ($data['tiempo']) {
            case 'D':
                $tiempo = "Días";
                break;
            case 'M':
                $tiempo = "Meses";
                break;
            case 'A':
                $tiempo = "Años";
                break;
        }

        if ($data['sexo'] == 'M') {
            $sexo = "Macho";
        } else {
            $sexo = "Hembra";
        }
        
        if ($data['idPostulante']) {
            $estado = "Adoptado";
        } else {
            $estado = "Sin Adoptar";
        }

        $descripcion = $data['descripcion'];
    ?>

    <header>
        <div class="cabecera">
            <div class="logo">
                <img src="../../images/logo_happy_pets.png" title="Logo Happy Pets">
            </div>

            <nav>
                <a href="../../index.php">Inicio</a></li>
                <a href="./adoption_page.php">Adopción</a>
                <a href="./postulants_page.php">Postulantes</a>
                <a href="./contact_page.html">Contactos</a>
            </nav>

            <div class="botones">
                <a href="../../pages/guard/log_in_page.html" class="iniciar-sesion">Iniciar Sesión</a>
                <a href="../../pages/guard/sign_in_page.html" class="registrarse">Registrarse</a>
            </div>
        </div>
    </header>

    <div class="tarjeta">
        <p class="titulo">Conoce a <?php echo $nombre; ?></p>
        <div class="contenido">
            <div class="mascota"><img src="../../images/<?php echo $imagen; ?>"></div>
            <div class="informacion">
                <div class="dato">
                    <p class="subtitulo">Tipo</p>
                    <p class="texto"><?php echo $tipo; ?></p>
                </div>
                <div class="dato">
                    <p class="subtitulo">Edad</p>
                    <p class="texto"><?php echo $edad, " ", $tiempo; ?></p>
                </div>
                <div class="dato">
                    <p class="subtitulo">Sexo</p>
                    <p class="texto"><?php echo $sexo; ?></p>
                </div>
                <div class="dato">
                    <p class="subtitulo">Estado</p>
                    <p class="texto"><?php echo $estado; ?></p>
                </div>
            </div>
        </div>
        <div class="descripcion">
            <p class="subtitulo">Descripción</p>
            <p class="texto"><?php echo $descripcion; ?></p>
        </div>

        <?php 
            if ($estado == "Adoptado") {
                echo "<a href='./postulation_page.php?id=$idMascota' class='disabled'>Adoptar</a>";
            } else {
                echo "<a href='./postulation_page.php?id=$idMascota'>Adoptar</a>";
            }
        ?>
    </div>
    
    <div class="sponsor">
        <img src="../../images/home/logo_utpl.png" >
        <p>Ciencias de la Computación y Electrónica</p>
        <img  src="../../images/home/logo_municipio_loja.png" >
    </div>

    <footer>
        <p>Copyright 2023. Universidad Técnica Particular de Loja</p>
        <nav>
            <a href=""><iconify-icon icon="ic:round-facebook"></iconify-icon></a>
            <a href=""><iconify-icon icon="uil:instagram-alt"></iconify-icon></a>
            <a href=""><iconify-icon icon="mdi:twitter"></iconify-icon></a>
            <a href=""><iconify-icon icon="ic:outline-tiktok"></iconify-icon></a>
        </nav>
    </footer>

    <!-- Importación de código -->
    <script src="../../js/interface_script.js"></script>
</body>
</html>