@extends('layouts.app')

@section('content')

<section class="hero position-relative overflow-hidden">
    <div id="heroCarousel" class="carousel slide carousel-fade position-absolute w-100 h-100" data-bs-ride="carousel" data-bs-interval="4000" style="top: 0; left: 0; z-index: 0;">
        <div class="carousel-inner w-100 h-100">
            <div class="carousel-item active w-100 h-100">
                <img src="{{ asset('images/carrusel/img1.jpg') }}" class="w-100 h-100" style="object-fit: cover; object-position: center;" alt="Fondo industrial 1">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="{{ asset('images/carrusel/img2.jpg') }}" class="w-100 h-100" style="object-fit: cover; object-position: center;" alt="Fondo industrial 2">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="{{ asset('images/carrusel/img3.jpg') }}" class="w-100 h-100" style="object-fit: cover; object-position: center;" alt="Fondo industrial 3">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="{{ asset('images/carrusel/img4.jpg') }}" class="w-100 h-100" style="object-fit: cover; object-position: center;" alt="Fondo industrial 4">
            </div>
            <div class="carousel-item w-100 h-100">
                <img src="{{ asset('images/carrusel/img5.jpg') }}" class="w-100 h-100" style="object-fit: cover; object-position: center;" alt="Fondo industrial 5">
            </div>
        </div>
    </div>

    <div class="position-absolute w-100 h-100 bg-dark" style="top: 0; left: 0; z-index: 1; opacity: 0.6;"></div>

    <div class="container hero-content position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-lg-12 text-center text-lg-start text-white">
                <h1 class="text-uppercase mb-4 fw-bold">
                    Ingeniería y Soluciones <br>
                    Industriales <br>
                    Sostenible
                </h1>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    <p class="mb-4 mb-lg-5 pe-lg-4 fs-5">
                        Innovación tecnológica para el sector industrial.
                    </p>
                    <div class="d-grid gap-3 d-sm-flex w-100 justify-content-sm-center justify-content-lg-end">
                        <a href="#" class="btn btn-hero ">IR A LA TIENDA</a>
                        <a href="#servicios" class="btn btn-hero ">VER SERVICIOS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
            @forelse($areas as $area)
                <div class="card-solucion position-relative">
                    <a href="#" class="stretched-link" aria-label="Ver detalles de {{ $area->nombre }}"></a>
                    
                    <div class="icono">
                        <i class="bi {{ $area->icono }}"></i>
                    </div>
                    
                    <h5>{{ $area->nombre }}</h5>
                    
                    <p>{{ Str::limit($area->descripcion, 90, '...') }}</p>
                </div>
            @empty
                <div class="empty-state-container text-center py-5">
                    <div class="empty-state-soluciones">
                        <div class="empty-state-icon">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                        <h4 class="empty-state-title">Catálogo en actualización</h4>
                        <p class="empty-state-text">
                            Estamos preparando y registrando nuestras áreas técnicas para mostrarte las mejores soluciones de ingeniería y proyectos de <strong>JEZNET</strong>.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

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

<section id="metodologia" class="section-metodologia py-5">
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

<section class="section-historial py-5">
    <div class="container">
        <div class="soluciones-header flex items-center py-4">
            <div class="linea-vertical me-3"></div>
            <div>
                <h2 class="titulo-seccion fw-bold mb-1">Historial de Proyectos</h2>
            </div>
        </div>

        <div class="historial-table-wrapper">
            <table class="historial-table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Tipo de Proyecto</th>
                        <th>Año</th>
                        <th>Estado</th>
                        <th>Ficha</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Datos estáticos de ejemplo (eliminar al usar datos reales) --}}
                    <tr>
                        <td>AgroTech Norte</td>
                        <td>Planta de Tratamiento (PTARI)</td>
                        <td>2023</td>
                        <td><span class="historial-estado"> Operativo <svg class="estado-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span></td>
                        <td><a href="#" class="historial-ficha">📋</a></td>
                    </tr>
                    <tr>
                        <td>FarmaCorp</td>
                        <td>Red de Tuberías Sanitarias</td>
                        <td>2024</td>
                        <td><span class="historial-estado"> En Ejecución <svg class="estado-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span></td>
                        <td><a href="#" class="historial-ficha">📋</a></td>
                    </tr>
                    <tr>
                        <td>Industrial Paper</td>
                        <td>Subestación Media Tensión</td>
                        <td>2023</td>
                        <td><span class="historial-estado"> Entregado <svg class="estado-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg></span></td>
                        <td><a href="#" class="historial-ficha">📋</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

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

                            <div class="mb-3">
                                <label class="form-label fw-bold small">Empresa</label>
                                <input type="text" class="form-control input-contacto" required>
                            </div>

                            <label for="tipoConsultaSelect" class="form-label fw-bold small mb-2">Tipo de Consulta</label>

                            <select class="form-select input-contacto" id="tipoConsultaSelect" name="tipoConsulta">
                                <option value="" selected disabled>Seleccione una opción...</option>
                                <option value="rfp" >Solicitud de Propuesta (RFP)</option>
                                <option value="viabilidad">Viabilidad Técnica</option>
                                <option value="soporte">Soporte Técnico</option>
                            </select>

                            <div class="d-grid my-4">
                                <button class="btn btn-hero">CONTACTAR INGENIERÍA</button>
                            </div>

                            <p class="text-center text-muted mt-3 mb-0" style="font-size: 0.65rem;">
                                No se compartirá el nombre de tu perfil. Nunca envíes tus contraseñas.
                            </p>

                        </form>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center">
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

@endsection