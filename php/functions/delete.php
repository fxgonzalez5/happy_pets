<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

   // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    // Extracción del identificador del registro
    $id = (int)$_POST['id'];

    if ($_POST['id1']) {
        $id1 = (int)$_POST['id1'];
    }

    switch ($_POST['tabla']) {
        case "mascota":
            // Eliminación del animal
            $sql = "DELETE FROM mascota WHERE idMascota = $id";
            break;
        case "persona":
            // Eliminación del usuario
            $sql = "DELETE FROM persona WHERE idPersona = $id";
            break;
        case "postulante":
            // Eliminación del postulante
            // $sql = "DELETE FROM postulacion WHERE idPostulante = $id AND idMascota = $id1";
            $sql = "DELETE FROM persona WHERE idPersona = $id";
            break;
    }
    
    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sql);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    }
?>