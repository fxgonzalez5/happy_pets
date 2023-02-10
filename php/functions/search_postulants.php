<?php
    include("../configuration/config.php");
    include("../configuration/connection.php");

    // Se realiza la respectiva conexión
    $conexion = new class_mysql();
    $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

    $sql = "SELECT `idMascota`, `mascota`, COUNT(*) AS cantidad_postulantes FROM postulaciones WHERE estado = 0 OR estado = 2 GROUP BY idMascota";
    
    if(isset($_POST['consulta'])){
        $valor = $_POST['consulta'];
        $sql = "SELECT `idMascota`, `mascota`, COUNT(*) AS cantidad_postulantes FROM postulaciones WHERE LOWER(mascota) LIKE LOWER('$valor%') AND (estado = 0 OR estado = 2) GROUP BY idMascota";
    }

    $consultaId = $conexion->query($sql);

    if (mysqli_num_rows($consultaId) > 0) {

        echo "<table>";
        echo "<tr>";

        echo "<th class='numero'>#</th>";
        echo "<th class='mascota'>Mascota</th>";
        echo "<th class='postulantes'>Cantidad de Postulantes</th>";
        
        echo "</tr>";

        while ($row = mysqli_fetch_array($consultaId)) {
            echo "<tr>";

            if ($row[0] < 10) {
                echo "<td class='gris'>0$row[0]</td>";
            } else {
                echo "<td class='gris'>$row[0]</td>";
            }
            echo "<td class='azul'>$row[1]</td>";
            echo "<td class='naranja'>$row[2]</td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No existe esa mascota!</p>";
    }
?>