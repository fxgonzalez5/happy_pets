<?php
 	include("../configuration/config.php");
 	include("../configuration/connection.php");

    // Se realiza la respectiva conexión
 	$conexion = new class_mysql();
 	$conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

     $idUsuario = $_GET['id'];

    // Datos para registrarse en el sistema
    $id                 = $_POST['id'];
	$nombre             = $_POST['nombre'];
	$apellido           = $_POST['apellido'];
	$usuario            = $_POST['usuario'];
	$genero             = $_POST['genero'];
	$correo             = $_POST['correo'];
	$contrasenia        = 'y<QgW2xq';
    $celular            = $_POST['celular'];
    $fecha              = $_POST['fecha'];
    
    // Insersión de los datos de la persona
    $sqlp = "INSERT INTO persona values ('$id','$nombre','$apellido','$genero','$celular','$fecha')";
    
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

    // Insersión de los datos del usuario
    $sqlu = "INSERT INTO usuario (`idUsuario`, `correo`, `nombreUsuario`, `contraseña`) values ('$idPersona', '$correo', '$usuario', '$contrasenia')";

    // Obtención del resultado de la consulta sql 
    $resSQL = $conexion->query($sqlu);

    // Validación de posible error
    if ($resSQL == "") {
        echo "Problemas de ejecución del SQL";
    } else {
        echo "<script>location.href='../../pages/admin/admin_panel_persons.php?id=$idUsuario'</script>";
    }

?>