@extends('layouts.app')

@section('content')

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

@endsection