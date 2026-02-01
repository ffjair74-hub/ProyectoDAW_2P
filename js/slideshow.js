let slideIndex = 1;
// Muestra la primera diapositiva al cargar
document.addEventListener("DOMContentLoaded", function() {
    showSlides(slideIndex);
});

// Función para avanzar/retroceder
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Función para ir a una diapositiva específica (usada por los 'dots')
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    // Selecciona todas las etiquetas <article class="movie-slide">
    let slides = document.getElementsByClassName("movie-slide")
    // Selecciona todos los puntos <span>
    let dots = document.getElementsByClassName("dot");
    
    // 1. Lógica de bucle para pasar de la última a la primera y viceversa
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }

    // 2. Oculta todas las diapositivas
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // 3. Remueve la clase 'active' de todos los puntos
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    // 4. Muestra la diapositiva actual
    slides[slideIndex - 1].style.display = "block";
    
    // 5. Añade la clase 'active' al punto correspondiente
    dots[slideIndex - 1].className += " active";
}