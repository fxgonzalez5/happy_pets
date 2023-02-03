<?php
    include("../../php/configuration/config.php");
    include("../../php/configuration/connection.php");

    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    // Datos para iniciar sesión
     $usuario_correo = $_POST['usuario-correo'];
     $contrasenia = $_POST['contrasenia'];
        
     // Validación del correo electrónico
    if (filter_var($usuario_correo, FILTER_VALIDATE_EMAIL)){

        // Consulta del correo en la base de datos, extracción de la contraseña y del rol de dicho usuario
        $sql = "SELECT * FROM usuario WHERE correo = '$usuario_correo'";
        $idUsuario = $conexion->queryFor($sql)['idUsuario'];
        $contraseña = $conexion->queryFor($sql)['contraseña'];
        $rol = $conexion->queryFor($sql)['rol'];
        
        $contrasenia = md5($contrasenia);

        // Validación de la contraseña
        if ($contrasenia == $contraseña){

            // Validación del tipo de usuario para el respectivo ingreso a su panel de administración
            if ($rol == 0) {
                echo "<script>location.href='../../pages/admin/admin_panel_home.php?id=$idUsuario'</script>";
            } else {
                // TODO: Colocar la ruta de la página para los usuarios
                echo "<script>location.href='../../pages/admin/admin_panel_home.html?id=$idUsuario'</script>";
            }
        } else {
            echo '<script>alert("El correo o la contraseña está incorrecto.");</script>';
            echo "<script>location.href='../../pages/guard/log_in_page.php'</script>";
        }

    } else {

        // Consulta del nombre de usuario en la base de datos, extracción de la contraseña y del rol de dicho usuario
        $sql = "SELECT * FROM usuario WHERE nombreUsuario = '$usuario_correo'";
        $idUsuario = $conexion->queryFor($sql)['idUsuario'];
        $contraseña = $conexion->queryFor($sql)['contraseña'];
        $rol = $conexion->queryFor($sql)['rol'];

        // Validación de la contraseña
        if ($contrasenia == $contraseña){

            // Validación del tipo de usuario para el respectivo ingreso a su panel de administración
            if ($rol == 0) {
                echo "<script>location.href='../../pages/admin/admin_panel_home.php?id=$idUsuario'</script>";
            } else {
                // TODO: Colocar la ruta de la página para los usuarios
                echo "<script>location.href='../../pages/admin/admin_panel_home.html?id=$idUsuario'</script>";
            }
        } else {
            echo '<script>alert("El usuario o la contraseña está incorrecto.");</script>';
            echo "<script>location.href='../../pages/guard/log_in_page.php'</script>";
        }
    }

?>