window.onload = function () {
    // Acciones a la tabla
    var tabla = document.querySelector("table");
    tabla.addEventListener("click", function (e) {
        // Obtener la fila seleccionada
        var fila = e.target.parentNode;
        var filas = tabla.querySelectorAll("tr");
        for (var i = 0; i < filas.length; i++) {
            filas[i].classList.remove("seleccionada");
        }

        // Estilo al seleccionar una fila
        fila.classList.add("seleccionada");

        // Obtención de valores de la tabla
        var valor = fila.cells[0].innerHTML;
        var valor1 = fila.cells[1].innerHTML;
        var tb = fila.getAttribute('data-value');

        // Almacenar el valor en una variable global para poder acceder a él desde el botón
        window.valorSeleccionado = valor;
        window.valorSeleccionado1 = valor1;
        window.tablaSeleccionada = tb;
    });


    // Acción de eliminar un registro
    var eliminar = document.getElementById("eliminar")
    eliminar.addEventListener("click", function () {
        // Crear un objeto de solicitud HTTP
        var xhr = new XMLHttpRequest();

        // Configurar la solicitud
        xhr.open("POST", "../../php/functions/delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Enviar la solicitud
        xhr.send("id=" + window.valorSeleccionado + "&id1=" + window.valorSeleccionado1 + "&tabla=" + window.tablaSeleccionada);

        location.href = window.location.href;
        // location.href='../../php/functions/delete.php?;
    });


    // Funcionamiento de la ventana emergente para ver la información del usuario
    var ventana = document.getElementById("ventana");
    var cerrar = document.getElementById("cerrar");
    var filas = document.querySelectorAll("table tr");

    // Funcionamiento de la ventana emergente para editar una postulación
    var ventanaP = document.getElementById("ventana-p");
    var cerrarP = document.getElementById("cerrar-p");

    for (var i = 0; i < filas.length; i++) {
        filas[i].addEventListener("dblclick", function (e) {
            
            var target = e.target.parentNode;
            switch (window.tablaSeleccionada) {
                case "mascota":
                    var idMascota = target.cells[0].innerHTML;
                    var nombre = target.cells[2].innerHTML;
                    var tipo = target.cells[4].innerHTML;
                    var edad = target.cells[6].innerHTML;
                    var tiempo = target.cells[8].innerHTML;
                    var sexo = target.cells[10].innerHTML;
                    var descripcion = target.cells[12].innerHTML;
                    var adoptante = target.cells[16].innerHTML;
                    var fecha = target.cells[18].innerHTML;
                    
                    var tagText = target.cells[14].innerHTML;
                    var container = document.createElement("div");
                    container.innerHTML = tagText;
                    var img = container.getElementsByTagName("img")[0];
                    console.log(tipo);
                    
                    document.getElementById("id").value = idMascota;
                    document.getElementById("nombre").value = nombre;
                    document.getElementById("tipo").value = tipo;
                    document.getElementById("edad").value = edad;
                    document.getElementById("sexo").value = sexo;
                    document.getElementById("tiempo").value = tiempo;
                    document.getElementById("descripcion").value = descripcion;
                    document.getElementById("imagen").src = img.src;
                    document.getElementById("adoptante").value = adoptante;
                    document.getElementById("fecha").value = fecha;
                    break;
                
                case "persona":
                    var idPersona = target.cells[0].innerHTML;
                    var nombre = target.cells[2].innerHTML;
                    var apellido = target.cells[4].innerHTML;
                    var usuario = target.cells[6].innerHTML;
                    var fecha = target.cells[8].innerHTML;
                    var genero = target.cells[11].innerHTML;
                    var celular = target.cells[13].innerHTML;
                    var correo = target.cells[15].innerHTML;
                    var rol = target.cells[17].innerHTML;

                    document.getElementById("id").value = idPersona;
                    document.getElementById("nombre").value = nombre;
                    document.getElementById("apellido").value = apellido;
                    document.getElementById("usuario").value = usuario;
                    document.getElementById("fecha").value = fecha;
                    document.getElementById("genero").value = genero;
                    document.getElementById("correo").value = correo;
                    document.getElementById("celular").value = celular;
                    document.getElementById("rol").value = rol;
                    break;

                case "postulante":
                    var idPersona = target.cells[0].innerHTML;
                    var idMascota = target.cells[1].innerHTML;
                    var numero = target.cells[2].innerHTML;
                    var persona = target.cells[4].innerHTML;
                    var celular = target.cells[6].innerHTML;
                    var correo = target.cells[8].innerHTML;
                    var mascota = target.cells[10].innerHTML;
                    var edad = target.cells[12].innerHTML;
                    var sexo = target.cells[14].innerHTML;
                    switch (target.cells[16].innerHTML) {
                        case "Activa":
                            var estado = 0;
                            break;
                        case 'Completada':
                            var estado = 1;
                            break;
                        case 'Pendiente':
                            var estado = 2;
                            break;
                        case 'Cancelada':
                            var estado = 3;
                            break;
                    }
                    var fecha = target.cells[18].innerHTML;

                    document.getElementById("idPos").value = idPersona;
                    document.getElementById("idMas").value = idMascota;
                    document.getElementById("numero").value = numero;
                    document.getElementById("persona").value = persona;
                    document.getElementById("mascota").value = mascota;
                    document.getElementById("celular").value = celular;
                    document.getElementById("edad").value = edad;
                    document.getElementById("correo").value = correo;
                    document.getElementById("sexo").value = sexo;
                    if (estado == 1) {
                            // Función para deshabilitas el estado de una postulación cuando esta completada
                            const select = document.getElementById("estado");
                            select.value = estado;
                            select.disabled = true;
                    } else {
                        document.getElementById("estado").value = estado;
                    }
                    document.getElementById("fecha").value = fecha;

                    ventanaP.showModal();
                    cerrarP.addEventListener("click", () => { ventanaP.close(); });
                    break;
            }

            ventana.showModal();
            cerrar.addEventListener("click", () => { ventana.close(); });
        });
    }

    // Funcionamiento de la ventana emergente para crear un nuevo usuario
    var ventanaN = document.getElementById("ventana-n");
    var cerrarN = document.getElementById("cerrar-n");
    var agregar = document.getElementById("agregar");

    agregar.addEventListener("click", () => { ventanaN.showModal(); })
    cerrarN.addEventListener("click", () => { ventanaN.close(); })


    // Funcionamiento de la ventana emergente para editar un usuario
    var ventanaE = document.getElementById("ventana-e");
    var cerrarE = document.getElementById("cerrar-e");
    var btnsEditar = document.querySelectorAll("#editar");

    btnsEditar.forEach(function (editar) {
        editar.addEventListener("click", function () {
            var target = this.parentNode.parentNode;
            var tb = this.getAttribute('data-value');
            
            switch (tb) {
                case "mascota":
                    var idMascota = target.cells[0].innerHTML;
                    var nombre = target.cells[2].innerHTML;
                    var tipo = target.cells[4].innerHTML;
                    var edad = target.cells[6].innerHTML;
                    var tiempo = target.cells[8].innerHTML;
                    var sexo = target.cells[10].innerHTML;
                    var descripcion = target.cells[12].innerHTML;
                    
                    document.getElementById("idE").value = idMascota;
                    document.getElementById("idDissabled").value = idMascota;
                    document.getElementById("nombreE").value = nombre;
                    switch (tipo) {
                        case 'Mamífero':
                            document.getElementById("tipoE").value = 1;
                            break;
                        case 'Ave':
                            document.getElementById("tipoE").value = 2;
                            break;
                        case 'Pez':
                            document.getElementById("tipoE").value = 3;
                            break;
                        case 'Anfibio':
                            document.getElementById("tipoE").value = 4;
                            break;
                        case 'Reptil':
                            document.getElementById("tipoE").value = 5;
                            break;
                    }
                    document.getElementById("edadE").value = edad;
                    if (sexo == 'Macho') {
                        document.getElementById("sexoE").value = 'M';
                    } else {
                        document.getElementById("sexoE").value = 'H';
                    }
                    switch (tiempo) {
                        case 'Días':
                            document.getElementById("tiempoE").value = 'D';
                            break;
                        case 'Meses':
                            document.getElementById("tiempoE").value = 'M';
                            break;
                        case 'Años':
                            document.getElementById("tiempoE").value = 'A';
                            break;
                    }
                    document.getElementById("descripcionE").value = descripcion;
                    break;

                case "persona":
                    var idPersona = target.cells[0].innerHTML;
                    var nombre = target.cells[2].innerHTML;
                    var apellido = target.cells[4].innerHTML;
                    var usuario = target.cells[6].innerHTML;
                    var fecha = target.cells[8].innerHTML;
                    var genero = target.cells[11].innerHTML;
                    var celular = target.cells[13].innerHTML;
                    var correo = target.cells[15].innerHTML;
                    var rol = target.cells[17].innerHTML;

                    document.getElementById("idE").value = idPersona;
                    document.getElementById("idDissabled").value = idPersona;
                    document.getElementById("nombreE").value = nombre;
                    document.getElementById("apellidoE").value = apellido;
                    document.getElementById("usuarioE").value = usuario;
                    document.getElementById("fechaE").value = fecha;
                    if (genero == 'Masculino') {
                        document.getElementById("generoE").value = 'M';
                    } else {
                        document.getElementById("generoE").value = 'F';
                    }
                    document.getElementById("correoE").value = correo;
                    document.getElementById("celularE").value = celular;
                    switch (rol) {
                        case 'Administrador':
                            document.getElementById("rolE").value = 0;
                            break;
                        case 'Usuario':
                            document.getElementById("rolE").value = 1;
                            break;
                    }
                    break;
            }

            ventanaE.showModal();
            cerrarE.addEventListener("click", () => { ventanaE.close(); })
        });
    });
}