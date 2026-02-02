console.log("Funciona");

// Objeto donde se guardarán los datos del formulario
const datos = {
  nombre: "",
  email: "",
  mensaje: "",
};

// Selección de inputs del formulario
const nombre = document.querySelector("#nombre");
const email = document.querySelector("#email");
const mensaje = document.querySelector("#mensaje");

// Lectura del texto en tiempo real
nombre.addEventListener("input", leerTexto);
email.addEventListener("input", leerTexto);
mensaje.addEventListener("input", leerTexto);

function leerTexto(e) {
  datos[e.target.id] = e.target.value;
  console.log(datos);
}

// Evento de submit del formulario
const formulario = document.querySelector(".formulario");

formulario.addEventListener("submit", function (evento) {
  evento.preventDefault();

  const { nombre, email, mensaje } = datos;

  // Validación
  if (nombre === "" || email === "" || mensaje === "") {
    mostrarError("Todos los campos son obligatorios");
    return;
  }

  mostrarOK("Formulario enviado correctamente");

  // Reset del formulario visual
  formulario.reset();

  // Reset del objeto datos
  datos.nombre = "";
  datos.email = "";
  datos.mensaje = "";
});

// Mostrar error
function mostrarError(mensaje) {
  const error = document.createElement("P");
  error.textContent = mensaje;
  error.classList.add("error");

  formulario.appendChild(error);

  // Eliminar mensaje después de 5 segundos
  setTimeout(() => {
    error.remove();
  }, 5000);
}

// Mostrar mensaje correcto
function mostrarOK(mensaje) {
  const correcto = document.createElement("P");
  correcto.textContent = mensaje;
  correcto.classList.add("correcto");

  formulario.appendChild(correcto);

  // Eliminar después de 5 segundos
  setTimeout(() => {
    correcto.remove();
  }, 5000);
}
