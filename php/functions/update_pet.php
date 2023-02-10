<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

   // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    $idUsuario = $_GET['id'];

    // Datos para registrarse en el sistema
    $id = $_POST['id'];
    $nombre = $_POST['mascota'];
    $tipo = $_POST['tipo'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $tiempo = $_POST['tiempo'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES["imagen"]["name"];
    $adoptante = $_POST['adoptante'];
    $fecha = $_POST['fecha'];

    // Insersión de los datos de la mascota
    $sql = "UPDATE mascota SET `nombre` = '$nombre', `tipo` = '$tipo', `edad` = '$edad', `tiempo` = '$tiempo', `sexo` = '$sexo', `descripcion` = '$descripcion' WHERE idMascota = $id";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sql);

    if ($imagen) {
        $ruta = "../../images/" . $imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

        // Insersión de la imagen de la mascota
        $sql = "UPDATE mascota SET `imagen` = '$imagen' WHERE idMascota = $id";
    
        // Obtención del resultado de la consulta sql 
        $resSQL = $conexion->query($sql);

        // Validación de posible error al hacer cambios
        if ($resSQL == "") {
            echo "Problemas de ejecución del SQL";
        }
    }

    // Validación de posible error al actualizar la imagen
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo "<script>location.href='../../pages/admin/admin_panel_animals.php?id=$idUsuario'</script>";
    }
?>