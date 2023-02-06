<?php
    session_start();
    if (isset($_SESSION['data'])) {
        $data = $_SESSION['data'];
        if(isset($_SESSION['tb'])) $tabla = $_SESSION['tb'];

        switch ($tabla) {
            case "mascota":
                // Mascota
                $idMascota = $data['idMascota'];
                $mascota = $data['nombre'];
                $imagen = $data['imagen'];
                $tipo = $data['tipo'];
                $edad = $data['edad'];
                $tiempo = $data['tiempo'];
                $sexo = $data['sexo'];
                $descripcion = $data['descripcion'];
                $fechaAdopcion = $data['fechaAdopcion'];

                if ($data['idPostulante']){
                    $adoptante = $data['idPostulante'];
                } else {
                    $adoptante = "Ninguno";
                }
                break;

            case "persona":
                // Usuario
                $idPersona = $data['idPersona'];
                $nombre = $data['nombre'];
                $apellido = $data['apellido'];
                $usuario = $data['nombreUsuario'];
                $fecha = $data['fechaNacimiento'];
                $genero = $data['genero'];
                $correo = $data['correo'];
                $celular = $data['celular'];
                $rol = $data['rol'];
                break;
        }
    }
?>