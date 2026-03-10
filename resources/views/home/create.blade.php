@extends('layouts.app')

@section('content')

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


<div class="min-h-screen flex items-center justify-center p-6">
    <section class="py-5" style="background:#f4f4f4;">
        <div class="container">
            <div class="row justify-content-center g-4">

                <!-- FORMULARIO -->
                <div class="col-lg-6">
                    <div class="p-4 rounded-4 border bg-light h-100">

                        <h4 class="fw-bold mb-4" style="font-size:1rem;">REGISTAR USUARIO</h4>

                        <form>

                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Correo electrónico</label>
                                <input type="email" class="form-control form-control-sm rounded-3">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Nombre</label>
                                <input type="text" class="form-control form-control-sm rounded-3">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Apellidos</label>
                                <input type="text" class="form-control form-control-sm rounded-3">
                            </div>

                            <!-- Tipo de documento: combo -->
                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Tipo de documento</label>

                                <select id="tipoDocumento" name="tipo_documento" class="form-select form-select-sm rounded-3" style="font-size:0.78rem;">
                                    <option value="" selected disabled>--- Seleccione ---</option>
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                    <option value="CE">CD (Carnet extranjero)</option>
                                </select>

                                <div id="numeroDocumentoWrapper" class="mt-2" style="display:none;">
                                    <label id="labelNumDoc" class="form-label" style="font-size:0.78rem;">Número de documento</label>
                                    <input type="number" min="0" id="numeroDocumento" name="numero_documento"
                                           class="form-control form-control-sm rounded-3"
                                           placeholder="Ingresa el número">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Celular</label>
                                <input type="text" class="form-control form-control-sm rounded-3">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-size:0.78rem;">Contraseña</label>
                                <input type="password" class="form-control form-control-sm rounded-3">
                            </div>

                            <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-2">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2">
                                    <span style="font-size:0.75rem;">Acepto los términos y condiciones de la empresa JEZNET</span>
                                </div>
                            </div>

                            <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-4">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input me-2">
                                    <span style="font-size:0.75rem;">Declaro que he leído y acepto términos y condiciones de JEZNET</span>
                                </div>
                            </div>

                           <div class="d-grid my-4">
                                <button class="btn btn-hero w-100 rounded-pill fw-semibold py-1">
                                    Registrar
                                </button>
                            </div>

                            <p class="text-center mt-3" style="font-size:0.78rem;">
                                ¿Ya tienes cuenta?
                                <a class="text-warning fw-semibold" href="{{ route('home', ['login' => 'true']) }}">
                                    INICIAR SESIÓN
                                </a>
                            </p>

                        </form>
                    </div>
                </div>

                <!-- BENEFICIOS -->
                <div class="col-lg-6">
                    <div class="card card-formulario border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-md-5">

                            <h3 class="fw-bold mb-4 text-primary-brand">Beneficios JEZNET</h3>

                            <!-- ITEM -->
                            <div class="beneficio-item mb-4 d-flex align-items-start">
                                <img src="{{ asset('iconos/soluciones.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand ">Soluciones integrales</h6>
                                    <p class="small text-muted mb-0">
                                        Un solo proveedor para ingeniería, automatización y electricidad.
                                    </p>
                                </div>
                            </div>

                            <div class="beneficio-item mb-4 d-flex align-items-start">
                                <img src="{{ asset('iconos/energia.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand">Eficiencia energética</h6>
                                    <p class="small text-muted mb-0">
                                        Menor consumo eléctrico y reducción de huella de carbono.
                                    </p>
                                </div>
                            </div>

                            <div class="beneficio-item mb-4 d-flex align-items-start">
                                <img src="{{ asset('iconos/tecnologia.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand">Tecnología avanzada</h6>
                                    <p class="small text-muted mb-0">
                                        PLC/SCADA y monitoreo en tiempo real para mayor control.
                                    </p>
                                </div>
                            </div>

                            <div class="beneficio-item mb-4 d-flex align-items-start">
                                <img src="{{ asset('iconos/cumplimiento.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand">Cumplimiento garantizado</h6>
                                    <p class="small text-muted mb-0">
                                        Proyectos alineados con normas técnicas y ambientales.
                                    </p>
                                </div>
                            </div>

                            <div class="beneficio-item mb-4 d-flex align-items-start">
                                <img src="{{ asset('iconos/dinero.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand">Optimización de costos</h6>
                                    <p class="small text-muted mb-0">
                                        Procesos más eficientes, menos desperdicio, mayor rentabilidad.
                                    </p>
                                </div>
                            </div>

                            <div class="beneficio-item d-flex align-items-start">
                                <img src="{{ asset('iconos/herramientas.gif') }}" class="icono-beneficio me-3" style="width:50px; height:50px;">
                                <div>
                                    <h6 class="fw-bold mb-1 text-primary-brand">Soporte especializado</h6>
                                    <p class="small text-muted mb-0">
                                        Mantenimiento preventivo y continuidad operativa asegurada.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

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

@endsection