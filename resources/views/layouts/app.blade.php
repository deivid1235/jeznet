<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET - Soluciones Industriales</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    @vite(['resources/css/style.css','resources/js/app.js'])
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo/logo_jeznet.svg') }}" class="me-2" alt="Jeznet Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="{{ route('home') }}#servicios">SERVICIOS</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="{{ route('home') }}#metodologia">METODOLOGÍA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">TIENDA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="{{ route('home') }}#contactenos">CONTACTO</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="{{ route('home', ['login' => 'true']) }}">
                            INICIAR SESIÓN
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<footer class="jeznet-footer text-white pt-5 pb-3">
    <div class="container">

        <div class="row gy-5">

            <div class="col-lg-4 pe-lg-5">
                <img src="{{ asset('images/logo/logo_jeznet.svg') }}" width="179" class="mb-4" alt="Jeznet Logo">
                
                <p class="small text-light opacity-75 mb-4" style="line-height: 1.7;">
                    Ingeniería, sostenibilidad y tecnología al servicio del crecimiento 
                    industrial responsable del Perú y la región.
                </p>

                <div class="mt-4">
                    <a href="{{ route('libroReclamaciones') }}" class="link-reclamaciones text-decoration-none d-inline-flex align-items-center gap-3">
                        <div class="img-wrapper">
                            <img src="{{ asset('iconos/libroReclamaciones.png') }}" alt="Libro de Reclamaciones" width="70">
                        </div>
                        <div class="text-start text-wrapper">
                            <span class="d-block text-white fw-bold small lh-1 mb-1 txt-linea-1">Libro de</span>
                            <span class="d-block text-gold fw-semibold small lh-1 txt-linea-2">Reclamaciones</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold mb-4 text-uppercase">Servicios</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">I+D Sostenible</a></li>
                    <li><a href="#">Tratamiento de Aguas</a></li>
                    <li><a href="#">Automatización</a></li>
                    <li><a href="#">Proyectos Eléctricos</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="fw-bold mb-4 text-uppercase">Más</h6>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Telecomunicaciones</a></li>
                    <li><a href="#">Metalmecánica</a></li>
                    <li><a href="#">Obras Civiles</a></li>
                    <li><a href="{{ route('home') }}#metodologia">Metodología</a></li>
                </ul>
            </div>

            <div class="col-lg-2">
                <h6 class="fw-bold mb-4 text-uppercase">Contacto</h6>
                
                <ul class="list-unstyled footer-contact mb-4">
                    <li>
                        <i class="fas fa-envelope me-2 text-gold"></i>
                        <a href="mailto:jeznet@empresa.com">jeznet@empresa.com</a>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt me-2 text-gold"></i>
                        <a href="https://wa.me/51938237575" target="_blank">+51 938 237 575</a>
                    </li>
                </ul>

                <div class="social-footer d-flex gap-3">
                    <a href="https://wa.me/51938237575" target="_blank" class="social-link-footer" aria-label="WhatsApp">
                        <i class="fab fa-whatsapp fs-5"></i>
                    </a>
                    <a href="#" target="_blank" class="social-link-footer" aria-label="Facebook">
                        <i class="fab fa-facebook-f fs-5"></i>
                    </a>
                    <a href="#" target="_blank" class="social-link-footer" aria-label="Instagram">
                        <i class="fab fa-instagram fs-5"></i>
                    </a>
                    <a href="#" target="_blank" class="social-link-footer" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in fs-5"></i>
                    </a>
                </div>
            </div>

        </div>

        <hr class="border-light opacity-10 my-4 mt-5">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small opacity-75">
            <div class="mb-2 mb-md-0">
                © 2024 JEZNET Soluciones Integrales Sostenibles. Todos los derechos reservados.
            </div>
            <div class="d-flex gap-3">
                <a href="#" class="text-light text-decoration-none hover-gold">Políticas de Privacidad</a>
                <a href="#" class="text-light text-decoration-none hover-gold">Términos de Servicio</a>
            </div>
        </div>

    </div>
</footer>

</body>
</html>