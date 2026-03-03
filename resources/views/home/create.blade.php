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
                        <a class="nav-link" href="#">SERVICIOS</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                       <a class="nav-link" href="{{ route('home') }}#metodologia">METODOLOGÍA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">TIENDA</a>
                    </li>

                    <li class="nav-item mx-lg-3 my-2 my-lg-0">
                        <a class="nav-link" href="#">CONTACTO</a>
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

                    <h4 class="fw-bold mb-4">REGISTAR USUARIO</h4>

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de documento</label>

                            <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-2">
                                <input type="checkbox" class="form-check-input me-2"> DNI
                            </div>

                            <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-2">
                                <input type="checkbox" class="form-check-input me-2"> RUC
                            </div>

                            <div class="bg-secondary bg-opacity-10 p-2 rounded-3">
                                <input type="checkbox" class="form-check-input me-2"> CD (Carnet extranjero)
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Celular</label>
                            <input type="text" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control rounded-3">
                        </div>

                        <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-2">
                            <input type="checkbox" class="form-check-input me-2">
                            Acepto los términos y condiciones de la empresa JEZNET
                        </div>

                        <div class="bg-secondary bg-opacity-10 p-2 rounded-3 mb-4">
                            <input type="checkbox" class="form-check-input me-2">
                            Declaro que he leído y acepto términos y condiciones de JEZNET
                        </div>

                        <button class="btn w-100 rounded-pill fw-semibold"
                                style="background:#E6C35B;">
                            Registrar
                        </button>

                        <p class="text-center mt-3 small">
                            ¿Ya tienes cuenta?
                            <a class="text-warning fw-semibold"
                            
                            
                            
                            href="{{ route('home', ['login' => 'true']) }}">
                                INICIAR SESIÓN
                            </a>
                        </p>

                    </form>
                </div>
            </div>

            <!-- BENEFICIOS -->
            <div class="col-lg-6">
                <div class="p-4 rounded-4 border bg-white h-100">

                    <h3 class="fw-bold mb-4">Beneficios JEZNET</h3>

                    <div class="d-flex mb-4">
                        <div class="me-3 fs-3 text-primary">⚙️</div>
                        <div>
                            <h6 class="fw-bold mb-1">Soluciones integrales</h6>
                            <p class="small text-muted mb-0">
                                Un solo proveedor para ingeniería, automatización y electricidad.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="me-3 fs-3 text-warning">⚡</div>
                        <div>
                            <h6 class="fw-bold mb-1">Eficiencia energética</h6>
                            <p class="small text-muted mb-0">
                                Menor consumo eléctrico y reducción de huella de carbono.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="me-3 fs-3 text-primary">🛠️</div>
                        <div>
                            <h6 class="fw-bold mb-1">Tecnología avanzada</h6>
                            <p class="small text-muted mb-0">
                                PLC/SCADA y monitoreo en tiempo real para mayor control.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="me-3 fs-3 text-warning">🛡️</div>
                        <div>
                            <h6 class="fw-bold mb-1">Cumplimiento garantizado</h6>
                            <p class="small text-muted mb-0">
                                Proyectos alineados con normas técnicas y ambientales.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="me-3 fs-3 text-primary">💰</div>
                        <div>
                            <h6 class="fw-bold mb-1">Optimización de costos</h6>
                            <p class="small text-muted mb-0">
                                Procesos más eficientes, menos desperdicio, mayor rentabilidad.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="me-3 fs-3 text-warning">🔧</div>
                        <div>
                            <h6 class="fw-bold mb-1">Soporte especializado</h6>
                            <p class="small text-muted mb-0">
                                Mantenimiento preventivo y continuidad operativa asegurada.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

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