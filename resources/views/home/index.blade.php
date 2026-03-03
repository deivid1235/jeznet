@extends('layouts.app')

@section('content')

<!-- ========================
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
                        <a class="nav-link" href="#servicios">SERVICIOS</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#metodologia">METODOLOGÍA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">TIENDA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#contactenos">CONTACTO</a>
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

<!-- ========================
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
                        <a href="#servicios" class="btn btn-hero">VER SERVICIOS</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- ========================
    SERVICIOS
========================= -->
<section id="servicios" class="section-soluciones py-5">
    <div class="container">

        <div class="soluciones-header mb-5">
            <div class="linea-vertical"></div>
            <div>
                <h2 class="titulo-seccion">Nuestras Soluciones</h2>
                <p class="subtitulo-seccion">Ingeniería multidisciplinaria y sostenible</p>
            </div>
        </div>

        <div class="grid-soluciones">

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Investigación y Desarrollo"></a>
                <div class="icono">
                    <i class="bi bi-lightbulb"></i>
                </div>
                <h5>Investigación y Desarrollo (I+D)</h5>
                <p>Proyectos sostenibles y economía circular.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Gestión de Aguas Sostenibles"></a>
                <div class="icono">
                    <i class="bi bi-droplet-half"></i>
                </div>
                <h5>Gestión de Aguas Sostenibles</h5>
                <p>PTARI, potabilización y eficiencia hídrica.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Instrumentación y Automatización"></a>
                <div class="icono">
                    <i class="bi bi-cpu"></i>
                </div>
                <h5>Instrumentación y Automatización</h5>
                <p>PLC/SCADA y modernización de plantas.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Proyectos Eléctricos"></a>
                <div class="icono">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <h5>Proyectos Eléctricos</h5>
                <p>Media/Baja tensión y eficiencia energética.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Telecomunicaciones e IT"></a>
                <div class="icono">
                    <i class="bi bi-wifi"></i>
                </div>
                <h5>Telecomunicaciones e IT</h5>
                <p>Data Centers, fibra óptica y ciberseguridad.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Metalmecánica Estructural"></a>
                <div class="icono">
                    <i class="bi bi-tools"></i>
                </div>
                <h5>Metalmecánica Estructural</h5>
                <p>Estructuras, soldadura sanitaria e infraestructura.</p>
            </div>

            <div class="card-solucion position-relative">
                <a href="#" class="stretched-link" aria-label="Ver detalles de Obras Civiles e Infraestructura"></a>
                <div class="icono">
                    <i class="bi bi-tools"></i>
                </div>
                <h5>Obras Civiles e Infraestructura</h5>

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

<!-- ========================
    SERVICIOS DESTACADOS
========================= -->
<section class="servicios-destacados py-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center flex-wrap mb-5">
            <div class="soluciones-header d-flex align-items-center">
                <div class="linea-vertical me-3"></div>
                <div>
                    <h2 class="titulo-seccion fw-bold mb-1">Servicios Destacados</h2>
                    <p class="subtitulo-seccion mb-0 text-muted">Soluciones estratégicas de alto impacto</p>
                </div>
            </div>

            <a href="#" class="link-catalogo mt-3 mt-md-0 d-flex align-items-center">
                VER CATÁLOGO
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ms-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
        </div>

        <div class="grid-soluciones">

            <div class="card card-destacado h-100 border-0 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4 p-xl-5 flex-grow-1">
                    <div class="mb-4">
                        <span class="badge-categoria">I+D Sostenible</span>
                    </div>
                    <h4 class="fw-bold text-dark mb-4">Ingeniería de Economía Circular</h4>
                    
                    <ul class="lista-destacada">
                        <li>Análisis de procesos</li>
                        <li>Reingeniería de residuos</li>
                        <li>Viabilidad técnica-ambiental</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center px-4 py-3 border-0">
                    <span class="tiempo-estimado">3-5 Semanas</span>
                    <a href="#" class="icon-link stretched-link" aria-label="Ver más detalles">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M22 2 11 13"/>
                            <path d="m22 2-7 20-4-9-9-4 20-7z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="card card-destacado h-100 border-0 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4 p-xl-5 flex-grow-1">
                    <div class="mb-4">
                        <span class="badge-categoria">Aguas</span>
                    </div>
                    <h4 class="fw-bold text-dark mb-4">Gestión Integral del Recurso Hídrico</h4>
                    
                    <ul class="lista-destacada">
                        <li>Diseño PTARI</li>
                        <li>Monitoreo inteligente (IoT)</li>
                        <li>Cumplimiento LMP/ECA</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center px-4 py-3 border-0">
                    <span class="tiempo-estimado">Por Proyecto</span>
                    <a href="#" class="icon-link stretched-link" aria-label="Ver más detalles">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M22 2 11 13"/>
                            <path d="m22 2-7 20-4-9-9-4 20-7z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="card card-destacado h-100 border-0 rounded-4 overflow-hidden position-relative">
                <div class="card-body p-4 p-xl-5 flex-grow-1">
                    <div class="mb-4">
                        <span class="badge-categoria">Automatización</span>
                    </div>
                    <h4 class="fw-bold text-dark mb-4">Automatización y Control Industrial</h4>
                    
                    <ul class="lista-destacada">
                        <li>Migración de PLC</li>
                        <li>Actualización SCADA</li>
                        <li>Instrumentación de campo</li>
                    </ul>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center px-4 py-3 border-0">
                    <span class="tiempo-estimado">2-8 Semanas</span>
                    <a href="#" class="icon-link stretched-link" aria-label="Ver más detalles">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M22 2 11 13"/>
                            <path d="m22 2-7 20-4-9-9-4 20-7z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- =========================
    METODOLOGÍA
========================== -->
<section  id="metodologia" class="section-metodologia py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-5 mb-5 mb-lg-0 position-relative">
                <span class="tag-metodologia">Metodología</span>
                <h2 class="titulo-metodologia">
                    Cómo <br><span>Trabajamos</span>
                </h2>

                <p class="descripcion-metodologia">
                    Cada proyecto sigue una metodología rigurosa que garantiza 
                    resultados medibles, cumplimiento normativo y la máxima 
                    eficiencia operativa para su empresa.
                </p>

                <div class="contenedor-imagen-3d mt-5">
                    <div class="resplandor-fondo"></div>
                    
                    <img src="{{ asset('images/trabajanos.svg') }}" alt="Ilustración Metodología 3D" class="img-fluid img-metodologia-3d">
                </div>
            </div>

            <div class="col-lg-7">

                <div class="item-metodo">
                    <div class="numero">01</div>
                    <div>
                        <span class="badge-metodo">ANÁLISIS</span>
                        <h5>Diagnóstico Integral</h5>
                        <p>Levantamiento detallado de sus necesidades técnicas, operativas, energéticas y ambientales.</p>
                    </div>
                </div>

                <div class="linea-divisora"></div>

                <div class="item-metodo">
                    <div class="numero">02</div>
                    <div>
                        <span class="badge-metodo">INGENIERÍA</span>
                        <h5>Diseño y Planificación</h5>
                        <p>Elaboración de ingeniería conceptual y de detalle con expedientes técnicos.</p>
                    </div>
                </div>

                <div class="linea-divisora"></div>

                <div class="item-metodo">
                    <div class="numero">03</div>
                    <div>
                        <span class="badge-metodo">EJECUCIÓN</span>
                        <h5>Implementación Controlada</h5>
                        <p>Montaje y puesta en marcha bajo estándares ISO y OSHA.</p>
                    </div>
                </div>

                <div class="linea-divisora"></div>

                <div class="item-metodo">
                    <div class="numero">04</div>
                    <div>
                        <span class="badge-metodo">SOPORTE</span>
                        <h5>Mantenimiento y Continuidad</h5>
                        <p>Planes de mantenimiento preventivo y correctivo para maximizar su inversión.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- MODEL LOGIN -->
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
                    <a href="#" class="fw-semibold link-correo" data-bs-toggle="modal" data-bs-target="#recoverModal" data-bs-dismiss="modal">
                        correo
                    </a>
                    para cambiar tu contraseña.
                </p>

                <div class="d-grid my-4">
                    <button class="btn btn-hero">INGRESAR</button>
                </div>

                <div class="text-center social-icons-simple">
                    <a href="#" aria-label="Ingresar con Google" class="social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                    </a>

                    <a href="#" aria-label="Ingresar con Facebook" class="social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                            <path d="M16.671 15.542l.532-3.469h-3.328v-2.25c0-.949.465-1.874 1.956-1.874h1.514V5.006s-1.374-.235-2.686-.235c-2.741 0-4.533 1.662-4.533 4.669v2.633H7.078v3.469h3.047v8.385a12.09 12.09 0 003.75 0v-8.385h2.796z" fill="#FFFFFF"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- RECUPERAR CONTRASEÑA  -->
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
                    <button class="btn btn-hero">
                        ENVIAR LINK
                    </button>
                </div>

                <a href="#"
                    class="link-catalogo d-inline-flex align-items-center mt-3 mt-md-0"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                    data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Regresar a login
                </a>

            </div>
        </div>
    </div>
</div>


<!-- =========================
    CONTACTENOS
========================== -->
<section id="contactenos" class="section-contacto py-5">
    <div class="container py-lg-4">
        <div class="row align-items-stretch gy-5">

            <div class="col-lg-6 pe-lg-5">
                
                <div class="contacto-header mb-4">
                    <span class="tag-contacto">Contáctenos</span>
                    <h2 class="titulo-contacto">
                        ¿Tiene un <br><span class="text-primary-brand">proyecto</span> <br>en mente?
                    </h2>
                    <p class="descripcion-contacto mt-3">
                        Envíenos los requerimientos técnicos preliminares.
                        Nos especializamos en soluciones que combinan
                        ingeniería, sostenibilidad y tecnología.
                    </p>
                </div>

                <div class="card card-formulario border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <form action="#" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small">Nombre</label>
                                <input type="text" class="form-control input-contacto" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-bold small">Empresa</label>
                                <input type="text" class="form-control input-contacto" required>
                            </div>

                            <label class="form-label fw-bold small mb-3">Tipo de Consulta</label>

                            <div class="opcion-radio mb-2">
                                <input class="form-check-input" type="radio" name="tipoConsulta" id="consulta1" checked>
                                <label class="form-check-label w-100" for="consulta1">
                                    Solicitud de Propuesta (RFP)
                                </label>
                            </div>

                            <div class="opcion-radio mb-2">
                                <input class="form-check-input" type="radio" name="tipoConsulta" id="consulta2">
                                <label class="form-check-label w-100" for="consulta2">
                                    Viabilidad Técnica
                                </label>
                            </div>

                            <div class="opcion-radio mb-4">
                                <input class="form-check-input" type="radio" name="tipoConsulta" id="consulta3">
                                <label class="form-check-label w-100" for="consulta3">
                                    Soporte Técnico
                                </label>
                            </div>

                            <button type="submit" class="btn btn-submit-contacto w-100 fw-bold">
                                CONTACTAR INGENIERÍA
                            </button>
                            
                            <p class="text-center text-muted mt-3 mb-0" style="font-size: 0.65rem;">
                                No se compartirá el nombre de tu perfil. Nunca envíes tus contraseñas.
                            </p>
                            
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 d-flex">
                <div class="card card-whatsapp text-white w-100 border-0 p-4 p-md-5 d-flex flex-column justify-content-center">
                    
                    <div>
                        <span class="badge-respuesta mb-3">RESPUESTA INMEDIATA</span>
                        <h3 class="titulo-whatsapp mb-4">HABLEMOS DE SU<br>PROYECTO</h3>
                        
                        <p class="descripcion-whatsapp mb-5">
                            Cuéntenos sus necesidades y le presentamos
                            una propuesta técnica integral sin costo.
                            Atendemos a nivel nacional.
                        </p>

                        <a href="https://wa.me/51938237575" target="_blank" class="btn btn-whatsapp d-inline-flex align-items-center gap-2">
                            <i class="fab fa-whatsapp fs-4 text-success"></i>
                            <span class="fw-bold text-dark">Escribir por WhatsApp</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


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