// Funcionamiento de la ventana emergente
const ventana = document.querySelector("#ventana");
const formulario = document.querySelector("#formulario");
const btnConfirmar = document.querySelector("#btn-confirmar");

formulario.addEventListener("submit", (event) => {
    event.preventDefault();

    const usuario_correo = document.querySelector("#usuario-correo").value;

    // Validar que el campo de texto no este vacío
    if (usuario_correo) {
        
        // Abrir la ventana emergente 
        btnConfirmar.addEventListener("click", () => { ventana.showModal(); })
    }
});
