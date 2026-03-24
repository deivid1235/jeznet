@extends('layouts.app') 

@section('content')
<div class="container mt-5 mb-5">
    
    <div class="mb-4">
        <a href="{{ route('tienda') }}" class="fw-semibold link-correo">
            <i class="bi bi-chevron-left"></i> VOLVER AL CATÁLOGO
        </a>
    </div>

    <div class="row g-5">
        <div class="col-lg-7 pe-lg-5">

            <div style="border-top: 4px solid #0d274c; padding-top: 1rem;">
                <h1 class="fw-bolder" style="color: #0d274c; font-size: 2.3rem; letter-spacing: -0.5px;">
                    <i class="bi {{ $area->icono }} me-2" style="color: #d4af37; font-size: 2rem;"></i>
                    {{ $area->nombre }}
                </h1>
            </div>
            
            <div class="d-flex flex-wrap gap-2 mb-4 mt-3">
                <span class="badge rounded-pill fw-semibold" style="background-color: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 0.5rem 1rem;">
                    <i class="bi bi-upc-scan me-1"></i> ID: JZN-{{ str_pad($area->id, 3, '0', STR_PAD_LEFT) }}
                </span>
                
                @if($area->estado == 'Activo')
                    <span class="badge rounded-pill fw-semibold" style="background-color: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; padding: 0.5rem 1rem;">
                        <i class="bi bi-check-circle-fill me-1"></i> DISPONIBLE
                    </span>
                @endif
            </div>

            <h6 class="fw-bold mt-4 border-bottom pb-2 text-uppercase" style="color: #0d274c; border-color: #e2e8f0 !important; letter-spacing: 1px; font-size: 0.85rem;">
                <i class="bi bi-info-square me-2" style="color: #d4af37;"></i> Descripción Funcional
            </h6>
            <p class="mt-3 mb-5" style="color: #0c0d0e; text-align: justify; line-height: 1.7; font-size: 1.05rem;">
                {{ $area->descripcion }}
            </p>

            <h6 class="fw-bold border-bottom pb-2 text-uppercase" style="color: #0d274c; border-color: #e2e8f0 !important; letter-spacing: 1px; font-size: 0.85rem;">
                <i class="bi bi-box-seam me-2" style="color: #d4af37;"></i> Entregables del Servicio
            </h6>
            <div class="p-4 mt-3 mb-5 rounded bg-light" style="border-left: 4px solid #d4af37; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                <div style="line-height: 1.8; color: #0c0d0e;">
                    
                    @php
                        $listaEntregables = array_filter(array_map('trim', explode("\n", $area->entregables)));
                    @endphp

                    @if(count($listaEntregables) > 0)
                        <ul class="list-unstyled mb-0">
                            
                            @foreach($listaEntregables as $item)
                                <li class="d-flex align-items-start mb-2">
                                    <i class="bi bi-check-circle-fill me-2" style="color: #d4af37; margin-top: 0.3rem; font-size: 0.95rem;"></i>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                            
                        </ul>
                    @else
                        <p class="mb-0 text-muted">No hay entregables detallados para este servicio.</p>
                    @endif

                </div>
            </div>
            
            <h6 class="fw-bold border-bottom pb-2 text-uppercase" style="color: #0d274c; border-color: #e2e8f0 !important; letter-spacing: 1px; font-size: 0.85rem;">
                <i class="bi bi-diagram-3 me-2" style="color: #d4af37;"></i> Proceso de Trabajo
            </h6>
            <div class="mb-5">
                @php
                    $pasos = array_filter(array_map('trim', explode("\n", $area->proceso_trabajo)));
                @endphp

                @if(count($pasos) > 0)
                    <div class="d-flex flex-wrap align-items-center" style="gap: 1.5rem 1rem;">
                        
                        @foreach($pasos as $index => $paso)
                            @php
                                $textoLimpio = preg_replace('/^\d+[\.-]\s*/', '', $paso);
                            @endphp

                            <div class="d-flex align-items-center">
                                
                                <div class="d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" 
                                    style="width: 32px; height: 32px; border-radius: 50%; background-color: #173866; color: #ffffff; font-weight: 700; font-size: 0.85rem;">
                                    {{ $index + 1 }}
                                </div>
                                
                                <div class="ms-2 fw-medium text-dark" 
                                    style="font-size: 0.95rem; line-height: 1.3; max-width: 220px;">
                                    {{ $textoLimpio }}
                                </div>
                                
                            </div>

                            @if(! $loop->last)
                                <div class="d-none d-sm-block opacity-50">
                                    <i class="bi bi-chevron-right" style="color: #173866; font-size: 1.1rem; font-weight: bold;"></i>
                                </div>
                            @endif
                            
                        @endforeach
                        
                    </div>
                @else
                    <p class="text-muted fst-italic small">No hay un proceso de trabajo detallado.</p>
                @endif
            </div>

        </div>

        <div class="col-lg-5">
            <div class="card card-formulario bg-white shadow-sm border-1">
                <div class="card-body p-4">

                    <h3 class="fw-bold mb-1 text-primary-brand">SOLICITAR SERVICIO</h3>
                    <p class="text-muted mb-4" style="font-size: 0.9rem;">
                        Complete la ficha técnica para iniciar el proceso de evaluación y cotización.
                    </p>

                    @if(session('success'))
                        <div class="alert exito">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('soluciones.solicitar') }}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="area_id" value="{{ $area->id }}">
                        <input type="hidden" name="area_nombre" value="{{ $area->nombre }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-sm-custom">Empresa / RUC</label>
                            <input type="text" name="empresa" class="form-control input-reclamaciones" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-sm-custom">Ingeniero Responsable</label>
                            <input type="text" name="ingeniero" class="form-control input-reclamaciones" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-sm-custom">Correo Corporativo</label>
                            <input type="email" name="correo" class="form-control input-reclamaciones" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-sm-custom">Teléfono de contacto</label>
                            <input type="tel" name="telefono" class="form-control input-reclamaciones" placeholder="Ej: 987654321" pattern="[0-9]{9}" maxlength="9" inputmode="numeric" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-sm-custom">Detalles Técnicos</label>
                            <textarea name="detalles" rows="3" 
                                    class="form-control input-reclamaciones"
                                    placeholder="Describa brevemente su requerimiento técnico..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-hero">
                                AGENDAR LLAMADA TÉCNICA
                            </button>
                        </div>

                        <small class="text-muted d-block text-center mt-3 text-xs">
                            No compartimos su información. Evite enviar datos sensibles.
                        </small>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection