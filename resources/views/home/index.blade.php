<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/jeznet.css','resources/js/app.js'])

</head>

<body>


<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.png') }}" height="50" class="me-2">
                JEZNET
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <a class="btn btn-contacto" href="#">SERVICIOS</a>
                    </li>

                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <a class="btn btn-contacto" href="#">METODOLOGÍA</a>
                    </li>

                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <a class="btn btn-contacto" href="#">TIENDA</a>
                    </li>

                    <li class="nav-item mx-lg-2 my-2 my-lg-0">
                        <a class="btn btn-contacto" href="#">CONTACTO</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-contacto" href="#">INICIAR SESIÓN</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>



<section class="hero">
    <div class="container hero-content">
        <div class="col-lg-8">

            <h1 class="text-uppercase">
                Ingeniería y Soluciones <br>
                Industriales <br>
                Sostenible
            </h1>

            <p>
                Innovación tecnológica para el sector industrial.
            </p>

            <div class="mt-4">
                <a href="#" class="btn btn-hero-yellow me-3">
                    IR A LA TIENDA
                </a>

                <a href="#" class="btn btn-hero-blue">
                    VER SERVICIOS
                </a>
            </div>

        </div>
    </div>
</section>



<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-light">Nuestros Servicios</h2>
            <p class="text-muted">
                Soluciones industriales modernas y sostenibles.
            </p>
        </div>

        <div class="row g-4">

            @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('images/industrial.jpg') }}" class="card-img-top">

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
            Todods los derechos reservados. Diseñado por JEZNET.
        </small>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
