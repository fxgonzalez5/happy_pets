// Realización de busqueda en tiempo real
function buscar_ahora(buscar) {
  $.ajax({
    url: "../../php/functions/search_postulants.php",
    type: 'POST',
    dataType: 'html',
    data: {consulta: buscar},
  })
  .done(function(respuesta) {
    $('#tabla').html(respuesta);
  })
}

// Efecto de giro a las tarjetas
const mascotas = document.querySelectorAll(".mascota");
  mascotas.forEach(mascota => {
    mascota.addEventListener("click", function () {
      mascota.classList.toggle("flipped");
    });
});

// Deshabilitar el boton de adoptar
const disabledLinks = document.querySelectorAll('.disabled');
  disabledLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
    });
});5