document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const navList = document.getElementById('nav-list');

    // Esto te dirá en la consola si los IDs están bien puestos
    if (!menuToggle) console.error("Error: No se encontró el ID 'menu-toggle'");
    if (!navList) console.error("Error: No se encontró el ID 'nav-list'");

    if (menuToggle && navList) {
        menuToggle.addEventListener('click', () => {
            navList.classList.toggle('active');
            
            // Animación de las barras
            const bars = menuToggle.querySelectorAll('.bar');
            if (navList.classList.contains('active')) {
                bars[0].style.transform = 'rotate(45deg) translate(5px, 6px)';
                bars[1].style.opacity = '0';
                bars[2].style.transform = 'rotate(-45deg) translate(5px, -6px)';
            } else {
                bars[0].style.transform = '';
                bars[1].style.opacity = '1';
                bars[2].style.transform = '';
            }
        });
    }
});