@extends('layouts.app')

@section('content')

<!-- =========================
    NAVBAR
========================= -->
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

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            INICIAR SESIÓN
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- =========================
    HERO
========================= -->
<section class="hero" style="background-image: url('{{ asset('images/industrial.jpg') }}');">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-12 text-center text-lg-start">

                <h1 class="text-uppercase mb-4">
                    Ingeniería y Soluciones <br>
                    Industriales <br>
                    Sostenible
                </h1>

                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">

                    <p class="mb-4 mb-lg-5 pe-lg-4">
                        Innovación tecnológica para el sector industrial.
                    </p>

                    <div class="d-grid gap-3 d-sm-flex w-100 justify-content-sm-center justify-content-lg-end">
                        <a href="#" class="btn btn-hero">IR A LA TIENDA</a>
                        <a href="#" class="btn btn-hero">VER SERVICIOS</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- =========================
    SERVICIOS
========================= -->
<section class="section-soluciones py-5">
    <div class="container">

        <div class="soluciones-header mb-5">
        <div class="linea-vertical"></div>
        <div>
            <h2 class="titulo-seccion">Nuestras Soluciones</h2>
            <p class="subtitulo-seccion">Ingeniería multidisciplinaria y sostenible</p>
        </div>
        </div>

        <div class="grid-soluciones">

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-lightbulb"></i>
                </div>
                <h5>Investigación y Desarrollo (I+D)</h5>
                <p>Proyectos sostenibles y economía circular.</p>
            </div>

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-droplet-half"></i>
                </div>
                <h5>Gestión de Aguas Sostenibles</h5>
                <p>PTARI, potabilización y eficiencia hídrica.</p>
            </div>

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-cpu"></i>
                </div>
                <h5>Instrumentación y Automatización</h5>
                <p>PLC/SCADA y modernización de plantas.</p>
            </div>

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <h5>Proyectos Eléctricos</h5>
                <p>Media/Baja tensión y eficiencia energética.</p>
            </div>

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-wifi"></i>
                </div>
                <h5>Telecomunicaciones e IT</h5>
                <p>Data Centers, fibra óptica y ciberseguridad.</p>
            </div>

            <div class="card-solucion">
                <div class="icono">
                    <i class="bi bi-tools"></i>
                </div>
                <h5>Metalmecánica Estructural</h5>
                <p>Estructuras, soldadura sanitaria e infraestructura.</p>
            </div>

            <!-- Card amplia -->
            <div class="card-solucion">
                <div class="icono icono-grande">
                    <i class="bi bi-building"></i>
                </div>
                <h4>Obras Civiles e Infraestructura</h4>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <ul>
                            <li>Infraestructura industrial y cimentaciones especiales</li>
                            <li>Edificaciones y plantas de procesamiento</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>Saneamiento y movimiento de tierras</li>
                            <li>Gestión de proyectos PMO / ISO / OSHA</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================
    FOOTER
========================= -->
<footer class="text-white py-4">
    <div class="container text-center">
        <p class="mb-1">© {{ date('Y') }} JEZNET - Ingeniería Industrial</p>
        <small class="text-secondary">
            Todos los derechos reservados. Diseñado por JEZNET.
        </small>
    </div>
</footer>

<!-- =========================
    MODAL LOGIN
========================= -->
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
                        <input 
                            type="password"
                            id="password"
                            class="form-control login-input"
                            placeholder="Ingresa tu contraseña"
                        >

                        <i 
                            id="togglePassword"
                            class="fas fa-eye position-absolute"
                            style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer;"
                        ></i>
                    </div>
                </div>

                <div class="d-grid my-3">
                    <button class="btn login-btn">INGRESAR</button>
                </div>

                <div class="text-center">
                    <a href="#" class="mx-2">
                        <img src="{{ asset('iconos/google.png') }}" width="23" alt="Google">
                    </a>

                    <a href="#" class="mx-2">
                        <img src="{{ asset('iconos/facebook.png') }}" width="26" alt="Facebook">
                    </a>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection