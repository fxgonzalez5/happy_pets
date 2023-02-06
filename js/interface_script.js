// Deshabilitar el boton de adoptar
const disabledLinks = document.querySelectorAll('.disabled');
  disabledLinks.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
    });
});