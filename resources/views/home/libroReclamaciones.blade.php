@extends('layouts.app')

@section('content')

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
                        
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-5 shadow-sm" role="alert" style="border-left: 5px solid #198754; background-color: #d1e7dd; color: #0f5132;">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fs-3 me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">¡Registro Exitoso!</h6>
                                        <span class="small">{{ session('success') }}</span>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mb-5 shadow-sm" role="alert" style="border-left: 5px solid #dc3545; background-color: #f8d7da; color: #842029;">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-triangle fs-3 me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Ocurrió un problema</h6>
                                        <ul class="mb-0 mt-1 small">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        <form action="{{ route('libroReclamaciones.store') }}" method="POST">
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
                                    <select id="departamento" name="departamento" class="form-select input-reclamaciones" required>
                                        <option value="" selected disabled>Seleccione un departamento...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="provincia" class="form-label small fw-semibold">Provincia <span class="text-danger">*</span></label>
                                    <select id="provincia" name="provincia" class="form-select input-reclamaciones" required disabled>
                                        <option value="" selected disabled>Seleccione una provincia...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="distrito" class="form-label small fw-semibold">Distrito <span class="text-danger">*</span></label>
                                    <select id="distrito" name="distrito" class="form-select input-reclamaciones" required disabled>
                                        <option value="" selected disabled>Seleccione un distrito...</option>
                                    </select>
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

                            <div class="row mb-4 mt-3">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-start">
                                        <input class="form-check-input flex-shrink-0 mt-1 me-2" type="checkbox" value="1" id="aceptoPoliticas" name="aceptoPoliticas" required style="cursor: pointer; border-color: #cbd5e1;">
                                        <label class="form-check-label text-secondary" for="aceptoPoliticas" style="font-size: 0.85rem; line-height: 1.5; cursor: pointer;">
                                            Declaro bajo juramento que la información proporcionada es verdadera y acepto la 
                                            <a href="{{ route('politicaPrivacidad') }}" target="_blank" class="text-decoration-none" style="color: #0f1d3a; font-weight: 600;">Política de Privacidad</a> 
                                            para el tratamiento de mis datos personales conforme a la Ley N° 29733. <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                </div>
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

@endsection