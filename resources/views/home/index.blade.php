<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET - Soluciones Industriales</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/home_index.css','resources/js/app.js'])
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo/logo_jeznet.svg') }}" height="60" class="me-2" alt="Jeznet Logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">SERVICIOS</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">METODOLOGÍA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">TIENDA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">CONTACTO</a>
                    </li>

                    <li class="nav-item ms-lg-3 my-2 my-lg-0">
                        <a class="nav-link d-flex align-items-center" href="#">
                            INICIAR SESIÓN
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="hero" style="background-image: url('{{ asset('images/industrial.jpg') }}');">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-12 text-center text-lg-start"> <h1 class="text-uppercase mb-4">
                    Ingeniería y Soluciones <br>
                    Industriales <br>
                    Sostenible
                </h1>

                <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-center justify-content-between">
                    
                    <p class="mb-4 mb-lg-5 pe-lg-4">
                        Innovación tecnológica para el sector industrial.
                    </p>

                    <div class="d-grid gap-3 d-sm-flex w-100 justify-content-sm-center justify-content-lg-end">
                        <a href="#" class="btn btn-hero">
                            IR A LA TIENDA
                        </a>

                        <a href="#" class="btn btn-hero">
                            VER SERVICIOS
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>



<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Nuestros Servicios</h2>
            <p class="text-muted">
                Soluciones industriales modernas y sostenibles.
            </p>
        </div>

        <div class="row g-4">

            @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0 rounded-3">
                        <img src="{{ asset('images/industrial.jpg') }}" class="card-img-top rounded-top-3" alt="Servicio Industrial">

                        <div class="card-body">
                            <p class="card-text">
                                Servicio industrial profesional con tecnología avanzada.
                            </p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        Ver
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        Cotizar
                                    </button>
                                </div>
                                <small class="text-muted">Activo</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
</section>

<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p class="mb-1">© {{ date('Y') }} JEZNET - Ingeniería Industrial</p>
        <small class="text-secondary">
            Todos los derechos reservados. Diseñado por JEZNET.
        </small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>