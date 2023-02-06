<?php
    // Datos del Usuario
    $id = $_POST['id'];
    $sql = "SELECT p.idPersona, p.nombre, p.apellido, p.genero, p.celular, p.fechaNacimiento, u.nombreUsuario, u.correo, u.rol FROM persona p INNER JOIN usuario u ON (p.idPersona = u.idUsuario) WHERE idPersona = $id";
    $data = $conexion->queryFor($sql);

    $idPersona = $data['idPersona'];
?>

<!-- Envío de variables al archivo javascript -->
<script>
    var idPersona = <?php echo $idPersona; ?>;
</script>

<!-- Importación de código -->
<script src="../../js/admin_script.js"></script>