<?php
 	include("../configuration/config.php");
 	include("../configuration/connection.php");

    // Se realiza la respectiva conexión
 	$conexion = new class_mysql();
 	$conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    // Datos para registrarse en el sistema
    $nombre     = $_POST['nombre'];
    $apellido   = $_POST['apellido'];
    $celular    = $_POST['celular'];
    $correo     = $_POST['correo'];
    $idMascota  = $_POST['mascota'];

    // Insersión de los datos de la persona
    $sqlp = "INSERT INTO persona (`idPersona`, `nombre`, `apellido`, `celular`) values ('','$nombre','$apellido','$celular')";
    
    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sqlp);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    }


    // Consulta de la última persona insertada
    $id = "SELECT MAX(idPersona) AS max_id FROM persona";

    // Extracción del identificador de la última persona ingresada
    $idPersona = $conexion->queryFor($id)['max_id'];

    // Insersión de los datos del postulante
    $sqlpo = "INSERT INTO postulante (`idPostulante`, `correo`) values ('$idPersona', '$correo')";

    // Obtención del resultado de la consulta sql
    $resSQL = $conexion->query($sqlpo);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    }


    // Insersión de la postulación a la mascota
    $sqlpos = "INSERT INTO postulacion (`idPostulante`, `idMascota`) values ('$idPersona', '$idMascota')";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sqlpos);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo '<script>alert("Se ha registrado exitosamente su postulación");</script>';
        echo "<script>location.href='../../pages/interface/postulation_page.php?id=$idMascota'</script>";
    }
?>