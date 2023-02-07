<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

    // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    $idUsuario = $_GET['id'];

    // Datos para registrarse en el sistema
    $idPostulante = $_POST['idPos'];
    $idMascota = $_POST['idMas'];
    $estado = $_POST['estado'];

    // Insersión de los datos de la mascota
    $sql = "UPDATE postulacion SET `estado` = '$estado' WHERE idPostulante = $idPostulante AND idMascota = $idMascota";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sql);

    // Validación de posible error al hacer cambios
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    }

    $fechaActual = date("Y-m-d");

    // Actualización de la mascota adoptada
    $sql = "UPDATE mascota SET `idPostulante` = '$idPostulante', `fechaAdopcion` = '$fechaActual' WHERE idMascota = $idMascota";

    $resSQL = $conexion->query($sql);

    // Validación de posible error al actualizar la imagen
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo "<script>location.href='../../pages/admin/admin_panel_postulants.php?id=$idUsuario'</script>";
    }
?>