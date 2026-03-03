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
                        <a href="" class="btn btn-hero">IR A LA TIENDA</a>
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

<!-- Model de Login -->

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal p-4">

            <button type="button" class="btn-close position-absolute" style="top:15px; right:15px;" data-bs-dismiss="modal"></button>

            <div class="modal-body">
                <h2 class="text-center fw-bold mb-5">INICIAR SESIÓN</h2>

                
                <div class="mb-4">
                    <label class="form-label fw-semibold d-flex align-items-center gap-2">
                        <i class="fas fa-envelope-circle-check login-icon"></i>
                        Correo electrónico
                    </label>
                    <input type="email" class="form-control login-input"
                        placeholder="Ingresa tu correo electrónico">
                </div>

               
                <div class="mb-2">
                    <label class="form-label fw-semibold d-flex align-items-center gap-2">
                        <i class="fas fa-lock login-icon"></i>
                        Contraseña
                    </label>

                    <div class="position-relative">
                        <input type="password"
                            id="password"
                            class="form-control login-input"
                            placeholder="Ingresa tu contraseña">

                        <i id="togglePassword"
                            class="fas fa-eye password-eye"></i>
                    </div>
                </div>

           
                <p class="small text-muted mt-3">
                    ¿Olvidaste tu contraseña? No te preocupes, pide un código
                    verificador por 
                    <a href="#" class="fw-semibold text-primary" data-bs-toggle="modal" data-bs-target="#recoverModal" data-bs-dismiss="modal">
                    correo
                    </a>
                    para cambiar tu contraseña.
                </p>

               
                <div class="d-grid my-4">
                    <button class="btn login-btn">INGRESAR</button>
                </div>

                
                <div class="text-center social-icons">
                    <a href="#"><img src="{{ asset('iconos/google.png') }}" width="25"></a>
                    <a href="#"><img src="{{ asset('iconos/facebook.png') }}" width="25"></a>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="recoverModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal p-4">

            <button type="button" class="btn-close position-absolute" style="top:15px; right:15px;" data-bs-dismiss="modal"></button>
            
            <div class="modal-body text-center">

                <h2 class="fw-bold mb-4">RECUPERAR<br>CONTRASEÑA</h2>

                <p class="text-muted mb-4">
                    Ingrese su correo electrónico y le enviaremos
                    instrucciones para restablecer su contraseña
                </p>

                <div class="mb-4 text-start">
                    <label class="form-label fw-semibold d-flex align-items-center gap-2">
                        <i class="fas fa-envelope login-icon"></i>
                        Correo electrónico
                    </label>

                    <input type="email"
                        class="form-control login-input"
                        placeholder="Ingresa tu correo electrónico">
                </div>

                <div class="d-grid mb-4">
                    <button class="btn login-btn">
                        ENVIAR LINK
                    </button>
                </div>

                <a href="#"
                   class="text-warning fw-semibold"
                   data-bs-toggle="modal"
                   data-bs-target="#loginModal"
                   data-bs-dismiss="modal">
                   ← Regresar a login
                </a>

            </div>
        </div>
    </div>
</div>


<footer class="jeznet-footer text-white pt-5">
    <div class="container">

        <div class="row gy-4">

           
            <div class="col-lg-4">
                <img src="{{ asset('images/logo/logo_jeznet.svg') }}" width="179" class="mb-3">

                <p class="small text-light opacity-75">
                    Ingeniería, sostenibilidad y tecnología al servicio del crecimiento 
                    industrial responsable del Perú y la región.
                </p>

                <div class="mt-3">
                    <small  class="d-block text-info fw-semibold">Libro de Reclamaciones</small>
                    <img src="{{ asset('iconos/libroReclamaciones.png') }}" width="70">
                </div>
            </div>

         
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3">Servicios</h6>
                <ul class="list-unstyled footer-links">
                    <li>I+D Sostenible</li>
                    <li>Tratamiento de Aguas</li>
                    <li>Automatización</li>
                    <li>Proyectos Eléctricos</li>
                </ul>
            </div>

    
            <div class="col-lg-3">
                <h6 class="fw-bold mb-3">Más</h6>
                <ul class="list-unstyled footer-links">
                    <li>Telecomunicaciones</li>
                    <li>Metalmecánica</li>
                    <li>Obras Civiles</li>
                    <li>Metodología</li>
                </ul>
            </div>

            
            <div class="col-lg-2">
                <h6 class="fw-bold mb-3">Contacto</h6>
                <p class="small mb-1">jeznet@empresa.com</p>
                <p class="small">+51 938 237 575</p>

                <div class="d-flex gap-3 mt-3 fs-5">
                    <i class="fab fa-whatsapp"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>

        </div>

        <hr class="border-light opacity-25 my-4">

        <div class="text-center small pb-3 opacity-75">
            © 2024 JEZNET Soluciones Integrales Sostenibles. Todos los derechos reservados.
        </div>

    </div>
</footer>

@endsection