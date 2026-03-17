@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center p-6">
    <section class="py-5" style="background:#f4f4f4;">
        <div class="container">
            <div class="row justify-content-center g-4">

                <!-- FORMULARIO -->
                <div class="col-lg-6">
                    <div class="p-4 p-md-5 rounded-4 border bg-light h-100 d-flex flex-column justify-content-center">
                        <div class="mb-4 text-center text-md-start">
                            <h4 class="fw-bold mb-1 form-title">REGISTRAR USUARIO</h4>
                            <p class="text-muted small mb-0">Completa tus datos para crear una cuenta</p>
                        </div>

                        <form action="{{ route('home.create.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-muted form-label-custom">Correo electrónico</label>
                                <input type="email" name="correo" id="correo" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm" placeholder="ejemplo@correo.com">
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted form-label-custom">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm" placeholder="Tu nombre">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted form-label-custom">Apellidos</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm" placeholder="Tus apellidos">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold text-muted form-label-custom">Tipo de doc.</label>
                                    <select id="tipoDocumento" name="tipo_documento" class="form-select form-select-sm rounded-3 py-2 px-3 border-0 shadow-sm text-muted form-select-custom">
                                        <option value="" selected disabled>Seleccione...</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                        <option value="CE">CE (Carnet ext.)</option>
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <div id="numeroDocumentoWrapper" style="display:none;"> 
                                        <label id="labelNumDoc" class="form-label fw-semibold text-muted form-label-custom">Número de documento</label>
                                        <input type="text" id="numeroDocumento" name="numero_documento" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm" placeholder="Ingresa el número" inputmode="numeric">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted form-label-custom">Celular</label>
                                    <input type="tel" name="celular" id="celular" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm" maxlength="9" pattern="[0-9]{9}" inputmode="numeric" placeholder="987 654 321">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-muted form-label-custom">Contraseña</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" id="password" class="form-control form-control-sm rounded-3 py-2 px-3 border-0 shadow-sm pe-5" placeholder="••••••••">
                                        <button type="button" id="btnTogglePassword" class="btn border-0 position-absolute end-0 top-50 translate-middle-y text-muted px-3 shadow-none btn-toggle-pass">
                                            <i class="fa-solid fa-eye-slash" id="iconPassword"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white border border-light-subtle rounded-3 p-3 mb-4 shadow-sm">
                                <div class="form-check mb-2 d-flex align-items-center">
                                    <input type="checkbox" id="check1" class="form-check-input mt-0 me-2 border-secondary shadow-none cursor-pointer">
                                    <label for="check1" class="form-check-label text-muted text-xs cursor-pointer">
                                        Acepto los términos y condiciones de la empresa JEZNET
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input type="checkbox" id="check2" class="form-check-input mt-0 me-2 border-secondary shadow-none cursor-pointer">
                                    <label for="check2" class="form-check-label text-muted text-xs cursor-pointer">
                                        Declaro que he leído y acepto términos y condiciones de JEZNET
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid my-4">
                                <button type="submit" id="btnRegistrar" class="btn btn-hero w-100 rounded-pill fw-semibold py-1" disabled>
                                    Registrar
                                </button>
                            </div>
                            
                            <p class="text-center mt-3 text-muted text-sm-custom">
                                ¿Ya tienes cuenta?
                                <a class="fw-semibold link-correo" href="{{ route('home', ['login' => 'true']) }}">
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