<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <header>
    <div class="container-hero">
      <div class="container hero">
        <div class="container-logo">
          <i class="fa-solid fa-book"></i>
          <h1 class="logo"><a href="/">Biblioteca</a></h1>
        </div>
        <div class="container-user">
          <a class="btn btn-primary" href="{{ route('register') }}" role="button">Register</a>
          <a class="btn btn-primary" href="{{ route('login') }}" role="button">Login</a>
        </div>
      </div>
    </div>
    <div class="container-navbar">
      <nav class="navbar container">
        <i class="fa-solid fa-bars"></i>
        <ul class="menu">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Préstamos</a></li>
          <li><a href="#">Contenido</a></li>
        </ul>
        <form class="search-form">
          <input type="search" placeholder="Buscar" />
          <button class="btn-search">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </nav>
    </div>
  </header>

  <main class="main-content">
    <br>
    <br>
    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <img src="{{ asset('images/ha.jpg') }}" class="object-cover" alt="Libro 1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/lu.jpeg') }}" class="object-cover" alt="Libro 2">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/chs.jpeg') }}" class="object-cover" alt="Libro 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Características -->
    <section class="container container-features">
      <div class="card-feature">
        <i class="fa-solid fa-plane"></i>
        <div class="feature-content">
          <span>Envío gratuito</span>
          <p>En pedido superior a $150</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-wallet"></i>
        <div class="feature-content">
          <span>Contrareembolso</span>
          <p>100% garantía de devolución de dinero</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-gift"></i>
        <div class="feature-content">
          <span>Tarjeta regalo especial</span>
          <p>Ofrece bonos especiales con regalo</p>
        </div>
      </div>
      <div class="card-feature">
        <i class="fa-solid fa-headset"></i>
        <div class="feature-content">
          <span>Servicio al cliente 24/7</span>
          <p>LLámenos 24/7 al 123-456-7890</p>
        </div>
      </div>
    </section>

    <!-- Categorías principales -->
    <section class="container top-categories">
      <h1 class="heading-1">Mejores Categorías</h1>
      <div class="container-categories">
        <div class="card-category category-moca">
          <p>Drama</p>
          <span>Ver más</span>
        </div>
        <div class="card-category category-expreso">
          <p>Romance</p>
          <span>Ver más</span>
        </div>
        <div class="card-category category-capuchino">
          <p>Terror</p>
          <span>Ver más</span>
        </div>
      </div>
    </section>

    <h1 class="heading-1">¡LO MEJOR!</h1><br>

    <!-- Sección de videos -->
    <div class="container my-5">
      <div class="row">
        @for ($i = 1; $i <= 3; $i++)
          <div class="col-md-4">
            <video controls class="img-fluid">
              <source src="{{ asset('videos/video' . $i . '.mp4') }}" type="video/mp4">
              Tu navegador no soporta la reproducción de video.
            </video>
          </div>
        @endfor
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="container container-footer">
      <div class="menu-footer">
        <div class="contact-info">
          <p class="title-footer">Información de Creador</p>
          <ul>
            <li>John Doe</li>
            <li>Teléfono: 32412412512</li>
            <li>Fax: 55555300</li>
            <li>Email: test@gmail.com</li>
          </ul>
          <div class="social-icons">
            <span class="facebook"><i class="fa-brands fa-facebook-f"></i></span>
            <span class="twitter"><i class="fa-brands fa-twitter"></i></span>
            <span class="youtube"><i class="fa-brands fa-youtube"></i></span>
            <span class="pinterest"><i class="fa-brands fa-pinterest-p"></i></span>
            <span class="instagram"><i class="fa-brands fa-instagram"></i></span>
          </div>
        </div>
        <div class="information">
          <p class="title-footer">Información</p>
          <ul>
            <li><a href="#">Acerca de Nosotros</a></li>
            <li><a href="#">Información Delivery</a></li>
            <li><a href="#">Políticas de Privacidad</a></li>
            <li><a href="#">Términos y condiciones</a></li>
            <li><a href="#">Contáctanos</a></li>
          </ul>
        </div>
        <div class="my-account">
          <p class="title-footer">Mi cuenta</p>
          <ul>
            <li><a href="#">Mi cuenta</a></li>
            <li><a href="#">Historial de órdenes</a></li>
            <li><a href="#">Lista de deseos</a></li>
            <li><a href="#">Boletín</a></li>
            <li><a href="#">Reembolsos</a></li>
          </ul>
        </div>
        <div class="newsletter">
          <p class="title-footer">Boletín informativo</p>
          <div class="content">
            <p>Suscríbete a nuestros boletines ahora y mantente al día con nuevas colecciones y ofertas exclusivas.</p>
            <input type="email" placeholder="Ingresa el correo aquí...">
            <button>Suscríbete</button>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>Desarrollado por devs &copy; 2024</p>
        <img src="{{ asset('images/payment.png') }}" alt="Pagos">
      </div>
    </div>
  </footer>
</body>
</html>
