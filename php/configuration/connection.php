<?php
    class class_mysql{
        
        // Variables para establecer la conexión con MySQL
        var $Servidor;
        var $BaseDatos;
        var $Usuario;
        var $Clave;

        // Variables para capturar los errores con la conexión
        var $Error = "";
        var $Errno = 0;

        // Variable para monitorear la conexión y las consultas a la base de datos
        var $Conexion_ID;
        var $Consulta_ID;

        // Inicialización de las variables anteriormente declaradas
        public function __construct($host="", $db="", $user="", $pass="") {
            $this->Servidor = $host;
            $this->BaseDatos = $db;
            $this->Usuario = $user;
            $this->Clave = $pass;
        }

        function connection($host, $user, $pass, $db) {

            // Validación de las variables que no esten vacías y asignación de los valores para la conexión
            if ($db != "") $this->BaseDatos = $db; 
            if ($user != "") $this->Usuario = $user; 
            if ($pass != "") $this->Clave = $pass; 
            if ($host != "") $this->Servidor = $host;

            // Parámetos de conexión a la base de datos
            $this->Conexion_ID = new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);

            // Validación de que se haya podido conectar a la base de datos
            if (!$this->Conexion_ID) {
                $this->Error = "La conexion no se ha podido realizar...";
                return 0;
            }

            // Impresión del ID de la conección a la base de datos
            // echo "ID de la conexión: " . mysqli_thread_id($this->Conexion_ID);
            
            // Si se ha realizado correctamente la conexión, devolvemos el identificador de dicha conexión
            return $this->Conexion_ID;
        }


        function query($sql = "") {

            // Validación si la variable no esta vacía
            if ($sql == "") {
                $this->Error = "No hay consulta en sql";
                return 0;
            }

            // Realización de la consulta a la base de datos
            $this->Consulta_ID = mysqli_query($this->Conexion_ID, $sql);
            
            // Validación de que se haya podido realizar la consulta
            if (!$this->Consulta_ID) {
                print($this->Conexion_ID->error);
                return 0;
            }

            // Si se realiza correctamente la consulta, devolvemos el identificador de dicha consulta
            return $this->Consulta_ID;
        }

        function queryFor($sql = "") {
            // Validación si la variable no esta vacía
            if ($sql == "") {
                $this->Error = "No hay consulta en sql";
                return 0;
            }
            
            // Realización de la consulta a la base de datos
            $this->Consulta_ID = mysqli_query($this->Conexion_ID, $sql);

            // Devolución del valor encontrado
            return $this->Consulta_ID->fetch_array();
        }


        // Funciones para Vizualización del Administrador
        function mascotaHome() {
            // Consulta de las máscotas más antiguas
            $sql = "SELECT `idMascota`, `imagen`, `nombre`, `descripcion` FROM mascota WHERE idPostulante IS NULL LIMIT 3";
            $consultaId = $this->query($sql);

            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<div class='mascota'><img src='images/$row[1]'></div>";
            }
        }

        function tarjetaMascota() {
            // Consulta de las máscotas más antiguas
            $sql = "SELECT `idMascota`, `imagen`, `nombre`, `descripcion` FROM mascota";
            $consultaId = $this->query($sql);

            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<div class='tarjeta'>";
                echo "<div class='mascota'><img src='../../images/$row[1]'></div>";
                echo "<div class='texto'>";
                echo "<p class='nombre'>$row[2]</p>";
                echo "<p class='descripcion'>$row[3]</p>";
                echo "<a href='description_page.php?id=$row[0]'>+Info</a>";
                echo "</div>";
                echo "</div>";
            }
        }

        function listaPostulantes() {
            $sql = "SELECT `nombre`, `apellido`, `mascota`, `fecha` FROM postulaciones ORDER BY idPersona DESC";
            $consultaId = $this->query($sql);
            $conteo = 0;

            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr>";

                if ($conteo < 10) {
                    echo "<td class='gris'>0$conteo</td>";
                    $conteo++;
                } else {
                    echo "<td class='gris'>$conteo</td>";
                    $conteo++;
                }
                echo "<td class='azul'>$row[0] $row[1]</td>";
                echo "<td class='naranja'>$row[2]</td>";
                echo "<td class='amarillo'>$row[3]</td>";

                echo "</tr>";
            }
        }
        
        // Funciones para Vizualización del Administrador
        function imagenCuenta(){
            $idUsuario = $_GET['id'];

            // Consulta del nombre de la imagen
            $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
            $imagen = $this->queryFor($sql)['imagen'];
    
            // Validación de la imagen
            if ($imagen){
                echo "<img src='../../images/admin/$imagen' alt='Cuenta'>";
            } else {
                echo "<img src='../../images/admin/usuario.png' alt='Cuenta'>";
            }
        }

        function nuevoUsuario(){
            $id = "SELECT MAX(idUsuario) AS max_id FROM usuario";
            $idUsuario = $this->queryFor($id)['max_id'];
    
            $sql = "SELECT * FROM usuarios WHERE idPersona = $idUsuario";
            $imagen = $this->queryFor($sql)['imagen'];
            $nombre = $this->queryFor($sql)['nombre'];
            $apellido = $this->queryFor($sql)['apellido'];
            $correo = $this->queryFor($sql)['correo'];
            $edad = $this->queryFor($sql)['edad'];
            $genero = $this->queryFor($sql)['genero'];
    
            
            echo "<div class='contenido'>";
            echo "<div class='foto'>";
            if ($imagen) {
                echo "<img src='../../images/admin/$imagen'>";
            } else{
                echo "<img src='../../images/admin/usuario.png'>";
            }
            echo "</div>";
    
            echo "<div class='informacion'>";
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Nombre:&ThinSpace;</p>";
            echo "<p class='desbordamiento-texto'>$nombre $apellido</p>";
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Correo:&ThinSpace;</p>";
            echo "<p class='desbordamiento-texto'>$correo</p>";
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Edad:&ThinSpace;</p>";
            echo "<p>$edad Años</p>";
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Género:&ThinSpace;</p>";
            if (!$genero){
                echo "<p>Desconocido</p>";
            } else if ($genero == 'M') {
                echo "<p>Masculino</p>";
            } else {
                echo "<p>Femenino</p>";
            }
            
            echo "</div>";
            echo "</div>";  
            echo "</div>";
    
        }

        function nuevaMascota(){
            $id = "SELECT MAX(idMascota) AS max_id FROM mascota";
            $idMascota = $this->queryFor($id)['max_id'];
    
            $sql = "SELECT * FROM mascota WHERE idMascota = $idMascota";
            $imagen = $this->queryFor($sql)['imagen'];
            $nombre = $this->queryFor($sql)['nombre'];
            $tipo = $this->queryFor($sql)['tipo'];
            $edad = $this->queryFor($sql)['edad'];
            $tiempo = $this->queryFor($sql)['tiempo'];
            $sexo = $this->queryFor($sql)['sexo'];
    
            
            echo "<div class='contenido'>";
            echo "<div class='foto'>";
            echo "<img src='../../images/$imagen'>";
            echo "</div>";
    
            echo "<div class='informacion'>";
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Nombre:&ThinSpace;</p>";
            echo "<p class='desbordamiento-texto'>$nombre</p>";
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Tipo:&ThinSpace;</p>";
            switch ($tipo) {
                case 1:
                    echo "<p class='desbordamiento-texto'>Mamífero</p>";
                    break;
                case 2:
                    echo "<p class='desbordamiento-texto'>Ave</p>";
                    break;
                case 3:
                    echo "<p class='desbordamiento-texto'>Pez</p>";
                    break;
                case 4:
                    echo "<p class='desbordamiento-texto'>Anfibio</p>";
                    break;
                case 5:
                    echo "<p class='desbordamiento-texto'>Reptil</p>";
                    break;
                default:
                    echo "<p class='desbordamiento-texto'>Otro</p>";
                    break;
            }
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Edad:&ThinSpace;</p>";
            switch ($tiempo) {
                case 'D':
                    echo "<p>$edad Días</p>";
                    break;
                case 'M':
                    echo "<p>$edad Meses</p>";
                    break;
                case 'A':
                    echo "<p>$edad Años</p>";
                    break;
            }
            echo "</div>";
    
            echo "<div class='campo'>";
            echo "<p class='titulo-campo'>Sexo:&ThinSpace;</p>";
            if ($sexo == 'M'){
                echo "<p>Macho</p>";
            } else {
                echo "<p>Hembra</p>";
            }
            echo "</div>";
            echo "</div>";  
            echo "</div>";
    
        }

        function postulantesInicio() {
            $sql = "SELECT * FROM postulaciones ORDER BY idPersona DESC";
            $consultaId = $this->query($sql);
            $conteo = mysqli_num_rows($consultaId);
            
            echo "<table>";
            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr>";
    
                if ($conteo < 10) {
                    echo "<td class='id'>0$conteo</td>";
                    $conteo--;
                } else {
                    echo "<td class='id'>$conteo</td>";
                    $conteo--;
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='nombre-postulante'>$row[1] $row[2]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td>$row[6]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[10]) {
                    case 0:
                        echo "<td class='estado activa'>Activa</td>";
                        break;
                    case 1:
                        echo "<td class='estado completada'>Completada</td>";
                        break;
                    case 2:
                        echo "<td class='estado pendiente'>Pendiente</td>";
                        break;
                    case 3:
                        echo "<td class='estado cancelada'>Cancelada</td>";
                        break;
                }
    
                echo "</tr>";
    
                echo "<tr class='espacio-filas'></tr>";
            }
            echo "</table>";
        }

        function usuariosInicio() {
            $sql = "SELECT * FROM usuarios ORDER BY idPersona DESC";
            $consultaId = $this->query($sql);
    
            echo "<table>";
            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr>";
    
                if ($row[0] < 10) {
                    echo "<td class='id'>0$row[0]</td>";
                } else {
                    echo "<td class='id'>$row[0]</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna1'>$row[1]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna2'>$row[2]</td>";
                echo "<td class='espacio-columnas'></td>";
                if ($row[8]){
                    echo "<td class='columna3'>$row[8]</td>";
                } else {
                    echo "<td class='columna3'>No tiene</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna1 edad'>$row[5]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna2 final'>$row[7]</td>";
                echo "</tr>";
    
                echo "<tr class='espacio-filas'></tr>";
            }
            echo "</table>";
        }
    
        function mascotasInicio() {
            $sql = "SELECT * FROM mascota ORDER BY idMascota DESC";
            $consultaId = $this->query($sql);
    
            echo "<table>";
            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr>";
    
                if ($row[0] < 10) {
                    echo "<td class='id'>0$row[0]</td>";
                } else {
                    echo "<td class='id'>$row[0]</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna1'>$row[1]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[2]) {
                    case 1:
                        echo "<td class='columna2'>Mamífero</td>";
                        break;
                    case 2:
                        echo "<td class='columna2'>Ave</td>";
                        break;
                    case 3:
                        echo "<td class='columna2'>Pez</td>";
                        break;
                    case 4:
                        echo "<td class='columna2'>Anfibio</td>";
                        break;
                    case 5:
                        echo "<td class='columna2'>Reptil</td>";
                        break;
                    default:
                        echo "<td class='columna2'>Otro</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                switch ($row[5]) {
                    case 'D':
                        echo "<td class='columna3'>$row[4] Días</td>";
                        break;
                    case 'M':
                        echo "<td class='columna3'>$row[4] Meses</td>";
                        break;
                    case 'A':
                        echo "<td class='columna3'>$row[4] Años</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                if ($row[6] == 'M'){
                    echo "<td class='columna1'>Macho</td>";
                } else {
                    echo "<td class='columna1'>Hembra</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna2 final'>$row[7]</td>";
                echo "</tr>";
    
                echo "<tr class='espacio-filas'></tr>";
            }
            echo "</table>";
        }
    
        function animales() {
            $sql = "SELECT * FROM mascota";
            $consultaId = $this->query($sql);
    
            echo "<table id='tabla'>";
    
            echo "<tr>";
            echo "<th class='id'>#</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='nombre'>Nombre</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='tipo'>Tipo</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='edad'>Edad</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='tiempo'>Tiempo</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='sexo'>Sexo</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th>Descripción</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='adoptante'>Adoptante</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='fecha'>Fecha Adopción</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='accion'>Acción</th>";
            echo "</tr>";
    
            echo "<tr class='espacio-filas'></tr>";

            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr id='fila' data-value='mascota'>";
    
                if ($row[0] < 10) {
                    echo "<td class='id'>0$row[0]</td>";
                } else {
                    echo "<td class='id'>$row[0]</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='nombre'>$row[1]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[2]) {
                    case 1:
                        echo "<td class='tipo'>Mamífero</td>";
                        break;
                    case 2:
                        echo "<td class='tipo'>Ave</td>";
                        break;
                    case 3:
                        echo "<td class='tipo'>Pez</td>";
                        break;
                    case 4:
                        echo "<td class='tipo'>Anfibio</td>";
                        break;
                    case 5:
                        echo "<td class='tipo'>Reptil</td>";
                        break;
                    default:
                        echo "<td class='tipo'>Otro</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='edad'>$row[4]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[5]) {
                    case 'D':
                        echo "<td class='tiempo'>Días</td>";
                        break;
                    case 'M':
                        echo "<td class='tiempo'>Meses</td>";
                        break;
                    case 'A':
                        echo "<td class='tiempo'>Años</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                if ($row[6] == 'M'){
                    echo "<td class='sexo'>Macho</td>";
                } else {
                    echo "<td class='sexo'>Hembra</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='columna2 final'>$row[7]</td>";
                echo "<td class='espacio-columnas'></td>";
                if ($row[8]) {
                    echo "<td class='adoptante'>$row[8]</td>";
                } else {
                    echo "<td class='adoptante'>Ninguno</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                if ($row[9]) {
                    echo "<td class='fecha'>$row[9]</td>";
                } else {
                    echo "<td class='fecha'>dd/mm/aaaa</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='accion'>";
                echo "<button class='editar'>";
                echo "<iconify-icon icon='material-symbols:edit-outline-rounded' style='font-size: 20px;'></iconify-icon>";
                echo "Editar";
                echo "</button>";
                echo "</td>";
                echo "</tr>";
    
                echo "<tr class='espacio-filas'></tr>";
            }
            echo "</table>";
        }

        function personas() {
            $sql = "SELECT * FROM usuarios";
            $consultaId = $this->query($sql);

            echo "<table>";

            echo "<tr>";
            echo "<th class='id'>#</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='nombre'>Nombre</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='apellido'>Apellido</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='usuario'>Usuario</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='edad'>Edad</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='genero'>Género</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='celular'>Celular</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th>Correo Electrónico</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='rol'>Rol</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='accion'>Acción</th>";
            echo "</tr>";
        
            echo "<tr class='espacio-filas'></tr>";
        
            while ($row = mysqli_fetch_array($consultaId)) {
            echo "<tr data-value='persona'>";

                if ($row[0] < 10) {
                    echo "<td class='id'>0$row[0]</td>";
                } else {
                    echo "<td class='id'>$row[0]</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='nombre'>$row[1]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='apellido'>$row[2]</td>";
                echo "<td class='espacio-columnas'></td>";
                if ($row[8]) {
                    echo "<td class='usuario'>$row[8]</td>";
                } else {
                    echo "<td class='usuario'>No tiene</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='edad'>$row[5]</td>";
                echo "<td class='espacio-columnas'></td>";
                if (!$row[3]){
                    echo "<td class='genero'>Desconocido</td>";
                } else if ($row[3] == 'M'){
                    echo "<td class='genero'>Masculino</td>";
                } else {
                    echo "<td class='genero'>Femenino</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='celular'>$row[4]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td>$row[7]</td>";
                echo "<td class='espacio-columnas'></td>";
                if ($row[9] == 0) {
                    echo "<td class='rol'>Adminstrador</td>";
                }else{
                    echo "<td class='rol'>Usuario</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='accion'>";
                echo "<button id='editar' class='editar' data-value='persona'> ";
                echo "<iconify-icon icon='material-symbols:edit-outline-rounded' style='font-size: 20px;'></iconify-icon>";
                echo "Editar";
                echo "</button>";
                echo "</td>";
                echo "</tr>";

                echo "<tr class='espacio-filas'></tr>";
            }

            echo "</table>";
        }

        function postulantes() {
            $sql = "SELECT * FROM postulaciones";
            $consultaId = $this->query($sql);
            $conteo = 1;


            echo "<table id='tabla'>";

            echo "<tr>";
            echo "<th class='id'>#</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='persona'>Persona</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='mascota'>Mascota</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='edad'>Edad</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='sexo'>Sexo</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='celular'>Celular</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th>Correo Electrónico</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='estado'>Estado</th>";
            echo "<th class='espacio-columnas'></th>";
            echo "<th class='fecha'>Fecha</th>";
            echo "</tr>";
        
            echo "<tr class='espacio-filas'></tr>";
        
            while ($row = mysqli_fetch_array($consultaId)) {
                echo "<tr id='fila' data-value='postulante'>";

                // Columnas ocultas para obtener el id de la persona y de la mascota para poder editar la postulación como también eliminarla
                if ($conteo < 10) {
                    echo "<td style='display:none;'>0$row[0]</td>";
                } else {
                    echo "<td style='display:none;'>$row[0]</td>";
                }
                echo "<td style='display:none;'>$row[5]</td>";
                if ($conteo < 10) {
                    echo "<td class='id'>0$conteo</td>";
                    $conteo++;
                } else {
                    echo "<td class='id'>$conteo</td>";
                    $conteo++;
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='persona'>$row[1] $row[2]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='mascota'>$row[6]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[8]) {
                    case 'D':
                        echo "<td class='edad'>$row[7] Días</td>";
                        break;
                    case 'M':
                        echo "<td class='edad'>$row[7] Meses</td>";
                        break;
                    case 'A':
                        echo "<td class='edad'>$row[7] Años</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                if ($row[9] == 'M'){
                    echo "<td class='sexo'>Macho</td>";
                } else {
                    echo "<td class='sexo'>Hembra</td>";
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='celular'>$row[3]</td>";
                echo "<td class='espacio-columnas'></td>";
                echo "<td>$row[4]</td>";
                echo "<td class='espacio-columnas'></td>";
                switch ($row[10]) {
                    case 0:
                        echo "<td class='estado activa'>Activa</td>";
                        break;
                    case 1:
                        echo "<td class='estado completada'>Completada</td>";
                        break;
                    case 2:
                        echo "<td class='estado pendiente'>Pendiente</td>";
                        break;
                    case 3:
                        echo "<td class='estado cancelada'>Cancelada</td>";
                        break;
                }
                echo "<td class='espacio-columnas'></td>";
                echo "<td class='fecha'>$row[11]</td>";
                echo "</tr>";
            
                echo "<tr class='espacio-filas'></tr>";
            }

            echo "</table>";
        }
    }
?>