<?php
    // Conteo de registros para estadisticas
    $sql = "SELECT COUNT(*) AS activas FROM `postulacion` WHERE estado = 0";
    $activas = $conexion->queryFor($sql)['activas'];

    $sql = "SELECT COUNT(*) AS completadas FROM `postulacion` WHERE estado = 1";
    $completadas = $conexion->queryFor($sql)['completadas'];

    $sql = "SELECT COUNT(*) AS pendientes FROM `postulacion` WHERE estado = 2";
    $pendientes = $conexion->queryFor($sql)['pendientes'];

    $sql = "SELECT COUNT(*) AS canceladas FROM `postulacion` WHERE estado = 3";
    $canceladas = $conexion->queryFor($sql)['canceladas'];

    // Último identificador creado en la base datos
    $sql = "SELECT MAX(idPersona) AS max_id FROM persona";
    $idUltimaPersona = $conexion->queryFor($sql)['max_id'];

    // $sql = "SELECT p.idPersona, p.nombre, p.apellido, p.genero, p.celular, p.fechaNacimiento, u.nombreUsuario, u.correo, u.rol FROM persona p INNER JOIN usuario u ON (p.idPersona = u.idUsuario) WHERE idPersona = $id";
    // $data = $conexion->queryFor($sql);

    // Conteo de indicadores
    $postulaciones = $activas + $pendientes;

    $sql = "SELECT COUNT(*) AS cantidad_mascotas FROM mascota";
    $mascotas = $conexion->queryFor($sql)['cantidad_mascotas'];
?>