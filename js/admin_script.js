window.onload = function () {
  // Acciones a la tabla
  var tabla = document.querySelector("table");
  tabla.addEventListener("click", function(e) {
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
  eliminar.addEventListener("click", function() {
    // Crear un objeto de solicitud HTTP
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("POST", "../../php/functions/delete.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Enviar la solicitud
    xhr.send("id=" + window.valorSeleccionado + "&id1=" + window.valorSeleccionado1 + "&tabla=" + window.tablaSeleccionada);

    location.href=window.location.href;
  });


  // Funcionamiento de la ventana emergente para ver la información del usuario
  var ventana = document.getElementById("ventana");
  var cerrar = document.getElementById("cerrar");
  var filas = document.querySelectorAll("table tr");

  for (var i = 0; i < filas.length; i++) {
    filas[i].addEventListener("dblclick", function() {
      ventana.showModal();
    });
  }

  cerrar.addEventListener("click", () => { ventana.close(); })


  // Funcionamiento de la ventana emergente para crear un nuevo usuario
  var ventanaN = document.getElementById("ventana-n");
  var cerrarN = document.getElementById("cerrar-n");
  var agregar = document.getElementById("agregar");

  agregar.addEventListener("click", () => { ventanaN.showModal(); })
  cerrarN.addEventListener("click", () => { ventanaN.close(); })


  // Funcionamiento de la ventana emergente para editar un usuario
  var ventanaE = document.getElementById("ventana-e");
  var id = document.getElementById("id-e");
  var cerrarE = document.getElementById("cerrar-e");
  var btnsEditar = document.querySelectorAll("#editar");

  btnsEditar.forEach(function(editar) {
    editar.addEventListener("click", function() {
      var numeroId = this.parentNode.parentNode.querySelector("td:first-child").innerHTML;
      var tb = this.getAttribute('data-value')
  
      // Crear un objeto de solicitud HTTP
      var xhr = new XMLHttpRequest();
  
      // Configurar la solicitud
      xhr.open("POST", "", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
      // Enviar la solicitud
      xhr.send("id=" + numeroId + "&tabla=" + tb);
  
      ventanaE.showModal(); 
      // console.log("El id de la persona es:" + idPersona);
    });
  });
  
  id.value = 1;
  cerrarE.addEventListener("click", () => { ventanaE.close(); })
}