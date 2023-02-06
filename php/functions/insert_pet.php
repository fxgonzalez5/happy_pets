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
    $ruta = "../../images/" . $imagen;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    // Insersión de los datos de la mascota
    $sql = "INSERT INTO mascota (`idMascota`, `nombre`, `tipo`, `imagen`, `edad`, `tiempo`, `sexo`, `descripcion`) VALUES ('$id','$nombre','$tipo','$imagen','$edad','$tiempo', '$sexo', '$descripcion')";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sql);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo "<script>location.href='../../pages/admin/admin_panel_animals.php?id=$idUsuario'</script>";
    }
?>