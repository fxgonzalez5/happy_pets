// Validación de campos llenos
const nombre = document.getElementById("nombre");
nombre.addEventListener("input", function() {
    contenedor = document.getElementById("dato-nombre");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const apellido = document.getElementById("apellido");
apellido.addEventListener("input", function() {
    contenedor = document.getElementById("dato-apellido");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const usuario = document.getElementById("usuario");
usuario.addEventListener("input", function() {
    contenedor = document.getElementById("dato-usuario");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const genero = document.getElementById("genero");
genero.addEventListener("input", function() {
    contenedor = document.getElementById("dato-genero");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const correo = document.getElementById("correo");
correo.addEventListener("input", function() {
    contenedor = document.getElementById("dato-correo");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const contrasenia = document.getElementById("contrasenia");
contrasenia.addEventListener("input", function() {
    contenedor = document.getElementById("dato-contrasenia");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const rep_contrasenia = document.getElementById("rep_contrasenia");
rep_contrasenia.addEventListener("input", function() {
    contenedor = document.getElementById("dato-rep_contrasenia");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const celular = document.getElementById("celular");
celular.addEventListener("input", function() {
    contenedor = document.getElementById("dato-celular");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});

const fecha = document.getElementById("fecha");
fecha.addEventListener("input", function() {
    contenedor = document.getElementById("dato-fecha");
    if (this.value.length > 0) {
        contenedor.classList.remove("vacio");
        contenedor.classList.add("lleno");
    } else {
        contenedor.classList.remove("lleno");
        contenedor.classList.add("vacio");
    }
});


// Validación de contraseñas
rep_contrasenia.addEventListener("keyup", function() {

    if (this.value == "" ) {
        var smalls = document.querySelectorAll(".error small");
        smalls.forEach(small => {
            small.classList.remove("incorrecto");
            small.classList.remove("correcto");
            small.classList.add("oculto");
        });
    } else if (contrasenia.value == this.value) {
        var smalls = document.querySelectorAll(".error small");
        smalls.forEach(small => {
            small.classList.remove("incorrecto");
            small.classList.add("correcto");
            small.innerHTML = "Coinciden!";
        });
    } else {
        var smalls = document.querySelectorAll(".error small");
        smalls.forEach(small => {
            small.classList.remove("oculto");
            small.classList.remove("correcto");
            small.classList.add("incorrecto");
            small.innerHTML = "No coinciden...";
        });
    }
});

