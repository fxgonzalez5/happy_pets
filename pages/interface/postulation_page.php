<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Titulo de la pestaña -->
	<title>HappyPets</title>

	<!-- Carga del logo en la pestaña -->
	<link rel="icon" href="../../images/logo.png" sizes="32x32" />
	<link rel="icon" href="../../images/logo.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="../../images/logo.png" />

	<!-- Carga de estilos -->
	<link rel="stylesheet" type="text/css" href="../../css/global_style.css">
	<link rel="stylesheet" type="text/css" href="../../css/interface/postulation_style.css">

	<!-- Importación de tipografía -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
		rel="stylesheet">

	<!-- Importación de librería de iconos -->
	<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</head>
<body>
	<!-- Declaración del archivo que contiene todas las funciones para utilizar -->
    <?php
        include("../../php/configuration/config.php");
        include("../../php/configuration/connection.php");
    
        $conexion = new class_mysql();
        $conexion->connection(DBHOST, DBUSER, DBPASS, DBNAME);

		$idMascota = $_GET['id'];

        $sql = "SELECT `nombre` FROM mascota WHERE idMascota = $idMascota";
        $nombre = $conexion->queryFor($sql)['nombre'];
    ?>

	<main>
		<a href="./description_page.php?id=<?php echo $idMascota; ?>">< Regresar</a>
		<img src="../../images/logo_happy_pets.png" title="HappyPets">
		<p class="titulo">Formulario de Adopción</p>

		<form method="post" action="../../php/functions/insert_postulant.php">
			<div class="grupo-input">
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" required>
			</div>

			<div class="grupo-input">
				<label for="apellido">Apellido:</label>
				<input type="text" id="apellido" name="apellido" required>
			</div>

			<div class="grupo-input">
				<label for="celular">Celular:</label>
				<input type="tel" id="celular" name="celular" required>
			</div>

			<div class="grupo-input">
				<label for="correo">Correo Electrónico:</label>
				<input type="email" id="correo" name="correo" required>
			</div>
			
			<div class="grupo-input">
				<label>Mascota:</label>
				<input type="hidden" name="mascota" value="<?php echo $idMascota; ?>" >
				<input type="text" value="<?php echo $nombre; ?>" disabled>
			</div>
			<button type="submit">Enviar</button>
		</form>
	</main>
</body>
</html>