console.log("Funciona index.js");

const datos = { nombre: "", email: "", mensaje: "" };

// Selección de elementos
const nombreInput = document.querySelector("#nombre");
const emailInput = document.querySelector("#email");
const mensajeInput = document.querySelector("#mensaje");
const formulario = document.querySelector(".formulario");

// Solo ejecutamos si los inputs existen en la página actual
if (nombreInput && emailInput && mensajeInput) {
    nombreInput.addEventListener("input", leerTexto);
    emailInput.addEventListener("input", leerTexto);
    mensajeInput.addEventListener("input", leerTexto);
}

function leerTexto(e) {
    datos[e.target.id] = e.target.value;
}

// Solo ejecutamos si el formulario existe
if (formulario) {
    formulario.addEventListener("submit", function (evento) {
        evento.preventDefault();
        const { nombre, email, mensaje } = datos;

        if (nombre === "" || email === "" || mensaje === "") {
            mostrarMensaje("Todos los campos son obligatorios", "error");
            return;
        }

        mostrarMensaje("Formulario enviado correctamente", "correcto");
        formulario.reset();
        Object.keys(datos).forEach(key => datos[key] = "");
    });
}

function mostrarMensaje(texto, clase) {
    const alerta = document.createElement("P");
    alerta.textContent = texto;
    alerta.classList.add(clase);
    formulario.appendChild(alerta);
    setTimeout(() => alerta.remove(), 5000);
}
