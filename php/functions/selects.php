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
?>
