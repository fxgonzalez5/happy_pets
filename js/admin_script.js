// Estilo al seleccionar una fila
var tabla = document.querySelector("table");
tabla.addEventListener("click", function(evento) {
  var fila = evento.target.parentNode;
  var filas = tabla.querySelectorAll("tr");
  for (var i = 0; i < filas.length; i++) {
    filas[i].classList.remove("seleccionada");
  }
  fila.classList.add("seleccionada");
});


// Acción de eliminar un registro
document.getElementById("tabla").addEventListener("click", function(e) {
  // Obtener la fila seleccionada
  var fila = e.target.parentNode;

  // Obtener el valor de la primera columna
  var valor = fila.cells[0].innerHTML;
  var valor1 = fila.cells[1].innerHTML;
  var tabla = fila.getAttribute('data-value');

  // Almacenar el valor en una variable global para poder acceder a él desde el botón
  window.valorSeleccionado = valor;
  window.valorSeleccionado1 = valor1;
  window.tablaSeleccionada = tabla;
});


document.getElementById("eliminar").addEventListener("click", function() {
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
var ventana = document.querySelector("#ventana");
var cerrar = document.querySelector("#cerrar");
var filas = document.querySelectorAll("#tabla tr");

for (var i = 0; i < filas.length; i++) {
  filas[i].addEventListener("dblclick", function() {
    ventana.showModal();
  });
}

cerrar.addEventListener("click", () => { ventana.close(); })


// Funcionamiento de la ventana emergente para crear un nuevo usuario
var ventanaN = document.querySelector("#ventana-n");
var id = document.getElementById("id-n");
var cerrar = document.querySelector("#cerrar-n");
var agregar = document.querySelector("#agregar");

agregar.addEventListener("click", () => { ventanaN.showModal(); })
id.value = filas.length + 1;
cerrar.addEventListener("click", () => { ventanaN.close(); })


// Funcionamiento de la ventana emergente para editar un usuario
var ventanaE = document.querySelector("#ventana-e");
var id = document.getElementById("id-e");
var cerrar = document.querySelector("#cerrar-e");
var editar = document.querySelector("#editar");

editar.addEventListener("click", () => { ventanaE.showModal(); })
id.value = filas.length + 1;
cerrar.addEventListener("click", () => { ventanaE.close(); })





