<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

   // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    $idUsuario = $_GET['id'];

    // Datos para registrarse en el sistema
    $id         = $_POST['id'];
	$nombre     = $_POST['nombre'];
	$apellido   = $_POST['apellido'];
	$usuario    = $_POST['usuario'];
	$genero     = $_POST['genero'];
	$correo     = $_POST['correo'];
    $celular    = $_POST['celular'];
    $fecha      = $_POST['fecha'];
    $rol        = $_POST['rol'];

    // Insersión de los datos de la persona
    $sqlp = "UPDATE `persona` SET `nombre`= '$nombre',`apellido`= '$apellido',`genero`= '$genero',`celular`= '$celular',`fechaNacimiento`= '$fecha' WHERE idPersona = $id";
    
    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sqlp);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    }

    // Insersión de los datos del usuario
    $sqlu = "UPDATE usuario SET correo = '$correo', nombreUsuario = '$usuario', rol = '$rol' WHERE idUsuario = $id";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sqlu);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo "<script>location.href='../../pages/admin/admin_panel_persons.php?id=$idUsuario'</script>";
    }
?>