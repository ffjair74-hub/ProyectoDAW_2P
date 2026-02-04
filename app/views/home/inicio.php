<?php include __DIR__ . '/../header.php'; ?>

<?php if (isset($_GET['eliminado'])): ?>
    <div class="correcto" style="margin: 20px auto; max-width: 600px;">
        Tu cuenta ha sido eliminada permanentemente. ¡Esperamos verte pronto de nuevo, Autobot!
    </div>
<?php endif; ?>


<?php if (isset($_GET['registrado']) && $_GET['registrado'] == 1): ?>
    <div id="msg-exito" style="max-width: 800px; margin: 20px auto; padding: 0 20px;">
        <div class="correcto" style="text-align: center; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
            ¡Registro exitoso! Bienvenido a la resistencia, ya puedes navegar.
        </div>
    </div>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('msg-exito');
            if (msg) msg.style.display = 'none';
        }, 5000);
    </script>
<?php endif; ?>

<section class="hero">
    <div class="hero-content">
        <h1>Transformers — Universo Cinematográfico</h1>
        <p>Explora la saga completa de Transformers: Autobots, Decepticons, batallas épicas y el impacto cultural.</p>
        <p><strong>Películas:</strong> 8+</p>
        <p><strong>Género:</strong> Acción / Sci-Fi</p>
        <p><strong>Tono:</strong> Épico · Visual</p>

        <h2>¿Por qué Transformers importa?</h2>
        <p>Desde 2007 la franquicia combinó efectos visuales, diseño de producción y una mitología propia. Sus películas impactaron la cultura pop y la industria del cine moderno.</p>

        <h3>Temática</h3>
        <p>Conflicto entre razas robóticas con influencia en la Tierra y el cosmos.</p>

        <h3>Personajes</h3>
        <p>Optimus Prime, Bumblebee, Megatron y otros destacados de la franquicia.</p>

        <h3>Influencia</h3>
        <p>Merchandising, series, videojuegos y una base de fans global.</p>
    </div>
</section>

<section id="Galeria" class="slideshow-area">
    <h2>Resumen rápido de la saga</h2>
    <div class="slideshow-container">
        <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2007.webp" width=350px alt="Poster Transformers 2007">
        <h4>Transformers (2007)</h4>
        <p>Sam Witwicky descubre que su auto es un Autobot y se ve envuelto en la guerra por el AllSpark.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2009.webp" width=350px alt="Poster Transformers 2009">
        <h4>Revenge of the Fallen (2009)</h4>
        <p>Los Autobots y Sam enfrentan a The Fallen en una batalla que lleva el conflicto a otro nivel.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2011.webp" width=350px alt="Poster Transformers 2011">
        <h4>Dark of the Moon (2011)</h4>
        <p>Una conspiración ligada a la llegada del hombre a la Luna desata una guerra devastadora.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2014.webp" width=350px alt="Poster Transformers 2014">
        <h4>Age of Extinction (2014)</h4>
        <p>Un inventor descubre a Optimus y surge una nueva amenaza con los Dinobots.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2017.webp" width=350px alt="Poster Transformers 2017">
        <h4>The Last Knight (2017)</h4>
        <p>La historia secreta de los Transformers en la Tierra sale a la luz.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2018.webp" width=350px alt="Poster Bumblebee 2018">
        <h4>Bumblebee (2018)</h4>
        <p>Precuela emotiva ambientada en los años 80.</p>
      </article>

      <article class="movie-slide fade">
        <img src="/Proyecto_DAW/public/imagenes/principal/saga2023.webp" width=350px alt="Poster Rise of the Beasts 2023">
        <h4>Rise of the Beasts (2023)</h4>
        <p>Introducción de los Maximals y nueva mitología.</p>
      </article>
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="dot-container">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      <span class="dot" onclick="currentSlide(4)"></span>
      <span class="dot" onclick="currentSlide(5)"></span>
      <span class="dot" onclick="currentSlide(6)"></span>
      <span class="dot" onclick="currentSlide(7)"></span>
    </div>
</section>

<section id="contacto">
    <h2>Contacto</h2>
    <form class="formulario">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Tu nombre">
        </div>
        <div class="form-group">
            <label>Correo</label>
            <input type="email" name="correo" placeholder="Tu correo electrónico">
        </div>
        <div class="form-group">
            <label>Mensaje</label>
            <textarea name="mensaje" rows="6" placeholder="Escribe un mensaje aquí"></textarea>
        </div>
        <div class="button-group">
            <button type="submit">Enviar</button>
            <button type="reset">Limpiar</button>
        </div>
    </form>
</section>

<?php include __DIR__ . '/../footer.php'; ?>
