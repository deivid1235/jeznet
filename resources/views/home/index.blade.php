<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET - Soluciones Industriales</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/style.css','resources/js/app.js'])
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

                    <li class="nav-item">
                        <a class="btn btn-contacto" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            INICIAR SESIÓN
                        </a>
                    </li>

                    <!-- MODAL LOGIN -->
                    <div class="modal fade" id="loginModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content login-modal">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                            <div class="modal-body p-4">

                                <h2 class="text-center fw-bold mb-4">INICIAR SESIÓN</h2>

                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-envelope me-2"></i>Correo electrónico
                                    </label>
                                        <input type="email" class="form-control login-input" placeholder="Ingresa tu correo electrónico">
                                </div>

                                
                                <div class="mb-2">
                                    <label class="form-label fw-bold">
                                        <i class="fas fa-lock me-2"></i>Contraseña
                                    </label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control login-input" placeholder="Ingresa tu contraseña">
                                        <i class="fas fa-eye position-absolute eye-icon"></i>
                                    </div>
                                </div>

                                <p class="small text-muted mt-2">
                                ¿Olvidaste tu contraseña? No te preocupes, pide un código verificador por 
                                <a href="#" class="text-primary">correo</a> para cambiar tu contraseña.
                                </p>

                                
                                <div class="d-grid my-3">
                                <button class="btn login-btn">INGRESAR</button>
                                </div>

                            
                                <div class="text-center">
                                    <i class="fab fa-google google-icon"></i>
                                    <i class="fab fa-facebook fs-4 mx-2 text-primary"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

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