<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titulo de la pestaña -->
    <title>HappyPets</title>

    <!-- Carga del logo en la pestaña -->
    <link rel="icon" href="./images/logo.png" sizes="32x32" />
    <link rel="icon" href="./images/logo.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="./images/logo.png" />

    <!-- Carga de estilos -->
    <link rel="stylesheet" type="text/css" href="./css/global_style.css">
    <link rel="stylesheet" type="text/css" href="./css/interface/home_style.css">

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
        include("./php/configuration/config.php");
        include("./php/configuration/connection.php");
    
        $conexion = new class_mysql();
        $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);
    ?>

    <header>
        <div class="cabecera">
            <div class="logo">
                <img src="images/logo_happy_pets.png" title="Logo Happy Pets">
            </div>

            <nav>
                <a href="index.php">Inicio</a></li>
                <a href="./pages/interface/adoption_page.php">Adopción</a>
                <a href="./pages/interface/postulants_page.php">Postulantes</a>
                <a href="./pages/interface/contact_page.html">Contactos</a>
            </nav>

            <div class="botones">
                <a href="./pages/guard/log_in_page.html" class="iniciar-sesion">Iniciar Sesión</a>
                <a href="./pages/guard/sign_in_page.html" class="registrarse">Registrarse</a>
            </div>
        </div>
    </header>

    <div class="tarjeta">
        <p class="titulo">Mascotas Que Anhelan Ser Adoptadas</p>
        <div class="mascotas">
            <?php
                $conexion->mascotaHome();
            ?>
        </div>
    </div>

    <div class="tarjeta">
        <p class="titulo">Indicadores</p>

        <?php
            include("./php/functions/selects.php");
        ?>

        <div class="indicadores">
            <div class="cantidad">
                <p class="numero">
                    <?php
                        echo $completadas;
                    ?>
                </p>
                <p class="tipo">Adopciones</p>
            </div>
            <div class="cantidad">
                <p class="numero">
                    <?php
                        echo $postulaciones;
                    ?>
                </p>
                <p class="tipo">Postulaciones</p>
            </div>
            <div class="cantidad">
                <p class="numero">
                    <?php
                        echo $mascotas;
                    ?>
                </p>
                <p class="tipo">Mascotas</p>
            </div>
        </div>
    </div>

    <div class="tarjeta">
        <p class="titulo">Pasos Para Postular Por Una Mascota</p>
        <div class="proceso">
            <div class="paso">
                <div class="paso-imagen"><img src="./images/home/img_paso1.jpg"></div>
                <p><span>Paso 1: </span>Visita mi perfil y conóceme.</p>
            </div>
            <div class="paso">
                <div class="paso-imagen"><img src="./images/home/img_paso2.jpg"></div>
                <p><span>Paso 2: </span>Llena el formulario y presentas la documentación.</p>
            </div>
            <div class="paso">
                <div class="paso-imagen"><img src="./images/home/img_paso3.jpg"></div>
                <p><span>Paso 3: </span>Me llevas a mi nuevo hogar.</p>
            </div>
        </div>
    </div>
    
    <div class="sponsor">
        <img src="images/home/logo_utpl.png" >
        <p>Ciencias de la Computación y Electrónica</p>
        <img  src="images/home/logo_municipio_loja.png" >
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
    <script src="./js/interface_script.js"></script>
</body>
</html>