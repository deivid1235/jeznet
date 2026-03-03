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

<section class="bg-light-gray pt-5 pb-4">
    <div class="container">
        <h2 class="title-reclamaciones text-uppercase mb-0">Libro de Reclamaciones Virtual</h2>
        <p class="text-muted mt-2">Conforme a lo establecido en el Código de Protección y Defensa del Consumidor.</p>
    </div>
</section>

<section class="bg-light-gray pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                
                <div class="card reclamaciones-card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        
                        <form action="#" method="POST">
                            @csrf
                            <p class="text-end small text-danger mb-4">* Campos obligatorios</p>

                            <h4 class="subtitle-reclamaciones mt-0">1. Datos de la persona que presenta el reclamo</h4>
                            
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="fecha" class="form-label small fw-semibold">Fecha</label>
                                    <input type="text" id="fecha" class="form-control input-reclamaciones input-readonly" value="{{ date('d/m/Y') }}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tipoDocumento" class="form-label small fw-semibold">Tipo de documento <span class="text-danger">*</span></label>
                                    <select class="form-select input-reclamaciones" id="tipoDocumento" name="tipoDocumento" required>
                                        <option value="" selected disabled>Seleccione una opción...</option>
                                        <option value="DNI">DNI</option>
                                        <option value="CE">CE</option>
                                        <option value="RUC">RUC</option>
                                        <option value="Pasaporte">Pasaporte / Otros</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="numeroDocumento" class="form-label small fw-semibold">Número de documento <span class="text-danger">*</span></label>
                                    <input type="text" id="numeroDocumento" name="numeroDocumento" class="form-control input-reclamaciones" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="primerNombre" class="form-label small fw-semibold">Primer nombre <span class="text-danger">*</span></label>
                                    <input type="text" id="primerNombre" name="primerNombre" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="segundoNombre" class="form-label small fw-semibold">Segundo nombre</label>
                                    <input type="text" id="segundoNombre" name="segundoNombre" class="form-control input-reclamaciones">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="primerApellido" class="form-label small fw-semibold">Primer apellido <span class="text-danger">*</span></label>
                                    <input type="text" id="primerApellido" name="primerApellido" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="segundoApellido" class="form-label small fw-semibold">Segundo apellido <span class="text-danger">*</span></label>
                                    <input type="text" id="segundoApellido" name="segundoApellido" class="form-control input-reclamaciones" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="correo" class="form-label small fw-semibold">Correo electrónico <span class="text-danger">*</span></label>
                                    <input type="email" id="correo" name="correo" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmarCorreo" class="form-label small fw-semibold">Confirmar correo electrónico <span class="text-danger">*</span></label>
                                    <input type="email" id="confirmarCorreo" name="confirmarCorreo" class="form-control input-reclamaciones" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="telefono" class="form-label small fw-semibold">Teléfono <span class="text-danger">*</span></label>
                                    <input type="tel" id="telefono" name="telefono" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="direccion" class="form-label small fw-semibold">Dirección <span class="text-danger">*</span></label>
                                    <input type="text" id="direccion" name="direccion" class="form-control input-reclamaciones" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="departamento" class="form-label small fw-semibold">Departamento <span class="text-danger">*</span></label>
                                    <input type="text" id="departamento" name="departamento" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="provincia" class="form-label small fw-semibold">Provincia <span class="text-danger">*</span></label>
                                    <input type="text" id="provincia" name="provincia" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="distrito" class="form-label small fw-semibold">Distrito <span class="text-danger">*</span></label>
                                    <input type="text" id="distrito" name="distrito" class="form-control input-reclamaciones" required>
                                </div>
                            </div>

                            <h4 class="subtitle-reclamaciones">2. Información general del servicio</h4>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="servicioContratado" class="form-label small fw-semibold">Servicio contratado <span class="text-danger">*</span></label>
                                    <input type="text" id="servicioContratado" name="servicioContratado" class="form-control input-reclamaciones" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="numeroOrden" class="form-label small fw-semibold">Número de orden o contrato</label>
                                    <input type="text" id="numeroOrden" name="numeroOrden" class="form-control input-reclamaciones">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="identificacionServicio" class="form-label small fw-semibold">Identificación del servicio contratado</label>
                                    <input type="text" id="identificacionServicio" name="identificacionServicio" class="form-control input-reclamaciones">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="montoReclamado" class="form-label small fw-semibold">Monto reclamado (S/.)</label>
                                    <input type="number" step="0.01" min="0" id="montoReclamado" name="montoReclamado" class="form-control input-reclamaciones">
                                </div>
                            </div>

                            <h4 class="subtitle-reclamaciones">3. Detalle del reclamo o queja</h4>
                            
                            <label class="form-label fw-semibold small mb-2">Tipo de solicitud <span class="text-danger">*</span></label>
                            <div class="radio-bar-container mb-4">
                                <label class="radio-bar" for="tipo_reclamo_reclamo">
                                    <input type="radio" id="tipo_reclamo_reclamo" name="tipo_reclamo" value="Reclamo" checked> 
                                    <span><strong>Reclamo:</strong> Disconformidad relacionada a los servicios prestados.</span>
                                </label>
                                <label class="radio-bar" for="tipo_reclamo_queja">
                                    <input type="radio" id="tipo_reclamo_queja" name="tipo_reclamo" value="Queja"> 
                                    <span><strong>Queja:</strong> Disconformidad no relacionada a los servicios; o, malestar o descontento respecto a la atención al público.</span>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label for="motivo" class="form-label small fw-semibold">Motivo <span class="text-danger">*</span></label>
                                <textarea id="motivo" name="motivo" class="form-control input-reclamaciones" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="detalleSolicitud" class="form-label small fw-semibold">Detalle de la solicitud <span class="text-danger">*</span></label>
                                <textarea id="detalleSolicitud" name="detalleSolicitud" class="form-control input-reclamaciones" rows="4" required></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="pedidoConcreto" class="form-label small fw-semibold">Pedido concreto del cliente <span class="text-danger">*</span></label>
                                <textarea id="pedidoConcreto" name="pedidoConcreto" class="form-control input-reclamaciones" rows="3" required></textarea>
                            </div>

                            <div class="d-grid my-4 col-md-6 mx-auto">
                                <button type="submit" class="btn btn-hero">Enviar formulario</button>
                            </div>

                            <div class="legal-text mt-5 pt-4 border-top">
                                <p><strong>[RAZÓN SOCIAL COMPLETA DE JEZNET]</strong>, con RUC <strong>[XXXXXXXXXXX]</strong>, con domicilio en <strong>[DIRECCIÓN COMPLETA]</strong>, pone a disposición el presente Libro de Reclamaciones Virtual en cumplimiento de la Ley N.º 29571 - Código de Protección y Defensa del Consumidor.</p>
                                <p>Los datos personales consignados serán tratados con la finalidad de gestionar y dar respuesta a su reclamo o queja, así como mantener un registro histórico para la mejora continua de nuestros servicios. La información será almacenada en el banco de datos correspondiente conforme a la normativa de protección de datos personales vigente.</p>
                                <p>El proveedor dará respuesta al reclamo o queja en un plazo no mayor a quince (15) días hábiles improrrogables.</p>
                                <p>La formulación del reclamo no impide acudir a otras vías de solución de controversias ni constituye requisito previo para interponer una denuncia ante el INDECOPI.</p>
                                <p>Para ejercer sus derechos en materia de protección de datos personales, puede comunicarse al correo: <strong>[correo oficial de la empresa]</strong>.</p>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

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