<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

   // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);
    
    session_start();
    $id = (int)$_POST['id'];
    $tabla = $_POST['tabla'];

    switch ($_POST['tabla']) {
        case "mascota":
            // Consulta de los datos de la mascota
            $sql = "SELECT * FROM mascota WHERE idMascota = $id";
            break;
        case "persona":
            // Consulta de los datos de la persona
            $sql = "SELECT p.idPersona, p.nombre, p.apellido, p.genero, p.celular, p.fechaNacimiento, u.nombreUsuario, u.correo, u.rol FROM persona p INNER JOIN usuario u ON (p.idPersona = u.idUsuario) WHERE idPersona = $id";
            break;
        case "postulante":
            // Consulta de los datos del postulante
            break;
    }

    $_SESSION['data'] = $conexion->queryFor($sql);
    $_SESSION['tb'] = $tabla;
?>