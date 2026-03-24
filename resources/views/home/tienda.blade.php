@extends('layouts.app')

@section('content')
{{-- Usamos la clase de tu CSS para el fondo y bordes --}}
<section class="section-soluciones py-5">
    <div class="container">

        {{-- HEADER ESTILO JEZNET --}}
        <div class="soluciones-header mb-5">
            <div class="linea-vertical"></div>
            <div>
                <h2 class="titulo-seccion">Catálogo de Soluciones</h2>
                <p class="subtitulo-seccion">Ingeniería multidisciplinaria y servicios industriales de JEZNET</p>
            </div>
        </div>

        <div class="row">
            {{-- COLUMNA DE FILTROS --}}
            <div class="col-lg-3 mb-4">
                <div class="card border-0 shadow-sm sticky-top" style="border-radius: 18px; top: 100px; background: #e9edf4;">
                    <div class="card-body p-4">
                        <h5 class="fw-bolder mb-4" style="color: #0f1d3a;">
                            <i class="fas fa-filter me-2" style="color: #d4af37;"></i>FILTRAR POR
                        </h5>

                        <p class="fw-bold text-muted mb-3 text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">
                            Área Técnica
                        </p>

                        {{-- Array de Categorías basado en tus opciones --}}
                        @php
                            $filtros = [
                                'bi-lightbulb' => 'I+D / Ideas',
                                'bi-droplet-half' => 'Aguas',
                                'bi-cpu' => 'Automatización',
                                'bi-lightning-charge' => 'Eléctrico',
                                'bi-wifi' => 'Telecomunicaciones',
                                'bi-tools' => 'Civil / Metalmecánica',
                                'bi-shield-check' => 'Seguridad / ISO',
                                'bi-briefcase' => 'Genérico'
                            ];
                        @endphp

                        <div class="d-flex flex-column gap-3">
                            @foreach($filtros as $icono => $label)
                                <div class="form-check custom-checkbox">
                                    {{-- Checkbox con la clase filter-checkbox para el JS --}}
                                    <input class="form-check-input filter-checkbox" type="checkbox" value="{{ $icono }}" id="filtro_{{ $icono }}" style="cursor: pointer;">
                                    <label class="form-check-label small fw-semibold d-flex align-items-center" for="filtro_{{ $icono }}" style="color: #3b4a63; cursor: pointer;">
                                        <i class="bi {{ $icono }} me-2 fs-6" style="color: #0f1d3a;"></i> {{ $label }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- El botón ahora es opcional porque filtrará en tiempo real, pero sirve para limpiar --}}
                        <button id="btn-limpiar-filtros" class="btn w-100 mt-4 py-2 fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px; background-color: #0f1d3a; color: white; border-radius: 10px; display: none;">
                            Limpiar Filtros
                        </button>
                    </div>
                </div>
            </div>

            {{-- LISTADO TÉCNICO --}}
            <div class="col-lg-9" id="contenedor-servicios">
                @forelse($areas as $area)
                    {{-- ATENCIÓN: Se agregaron 'item-servicio' y 'data-icono' para el JS --}}
                    <a href="{{ route('soluciones.ficha', $area->id) }}" class="card-catalogo-horizontal position-relative p-4 mb-4 overflow-hidden item-servicio" data-icono="{{ $area->icono }}">
                        
                        <div class="position-absolute top-0 end-0 p-4 mt-1 pe-4 d-none d-md-block">
                            <div class="icono m-0 shadow-sm">
                                <i class="bi {{ $area->icono }}"></i>
                            </div>
                        </div>

                        <div class="row align-items-center h-100">

                            <div class="col-md-8">

                                <div class="d-flex gap-2 mb-3">
                                    @php
                                        $nombresAreas = [
                                            'bi-briefcase'         => 'Genérico',
                                            'bi-lightbulb'        => 'I+D / Ideas',
                                            'bi-droplet-half'          => 'Aguas',
                                            'bi-cpu'              => 'Automatización',
                                            'bi-lightning-charge' => 'Eléctrico',
                                            'bi-wifi'             => 'Telecomunicaciones',
                                            'bi-tools'            => 'Civil / Metalmecánica',
                                            'bi-shield-check'     => 'Seguridad / ISO'
                                        ];
                                    @endphp

                                    <span class="badge bg-white text-dark px-3 py-2 fw-semibold shadow-sm" style="border-radius: 8px; font-size: 0.8rem;">
                                        {{-- Buscamos el ícono en el diccionario. Si por algún motivo no existe, mostramos 'Genérico' --}}
                                        {{ $nombresAreas[$area->icono] ?? 'Genérico' }}
                                    </span>
                                    <span class="badge bg-white text-dark px-3 py-2 fw-semibold shadow-sm opacity-75" style="border-radius: 8px; font-size: 0.8rem;">
                                        <i class="bi bi-upc-scan me-1"></i> ID: JZN-{{ str_pad($area->id, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <h3 class="fw-bolder mb-2 pe-md-5" style="color: #0f1d3a; letter-spacing: -0.5px;">
                                    {{ $area->nombre }}
                                </h3>

                                <p class="mb-4 pe-md-5" style="color: #475569; font-size: 0.95rem; line-height: 1.6;">
                                    {{ Str::limit($area->descripcion, 130) }}
                                </p>

                                <div class="box-detalles-inner p-4">
                                    <div class="row text-uppercase" style="font-size: 0.75rem; font-weight: 800; color: #0f1d3a;">
                                        
                                        <div class="col-7 border-end border-dark border-opacity-10">
                                            <span class="d-block mb-2 opacity-75">Incluye:</span>
                                            
                                            @php
                                                $entregables = array_filter(array_map('trim', explode("\n", $area->entregables)));
                                                $entregablesMostrar = array_slice($entregables, 0, 2);
                                            @endphp

                                            <ul class="list-unstyled mb-0 fw-semibold text-capitalize" style="color: #334155; font-size: 0.8rem;">
                                                @forelse($entregablesMostrar as $entregable)
                                                    <li class="mb-1 text-truncate" title="{{ $entregable }}">
                                                        <i class="bi bi-dot fs-5" style="color: #0f1d3a; vertical-align: middle; margin-left: -5px;"></i> {{ $entregable }}
                                                    </li>
                                                @empty
                                                    <li><i class="bi bi-dot fs-5"></i> Ver ficha técnica</li>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div class="col-5 ps-4 d-flex flex-column justify-content-center">
                                            <span class="d-block mb-1 opacity-75">Entrega:</span>
                                            <span class="fw-semibold text-capitalize" style="color: #334155; font-size: 0.85rem;">Por Proyecto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 text-md-end text-center d-flex flex-column justify-content-end mt-4 mt-md-0 border-start-md border-dark border-opacity-10 ps-md-4 h-100">
                                
                                <div class="mb-4 mt-auto pt-md-5">
                                    <small class="text-uppercase fw-bold d-block mb-1" style="font-size: 0.75rem; letter-spacing: 1px; color: #475569;">
                                        Inversión Estimada
                                    </small>
                                    <h2 class="fw-bolder mb-0" style="color: #0f1d3a;">Cotizar</h2>
                                </div>

                                <div>
                                    <div class="btn-catalogo w-100 shadow-sm">
                                        Ver Ficha
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                @empty
                    {{-- Se muestra si la base de datos no tiene servicios --}}
                    <div class="text-center py-5 shadow-sm" style="background-color: #e9edf4; border-radius: 18px;">
                        <p class="text-muted fw-bold mb-0">No hay servicios registrados en el catálogo.</p>
                    </div>
                @endforelse

                {{-- Estado de "No hay resultados" al filtrar con JS (Oculto por defecto) --}}
                <div id="mensaje-no-resultados" class="text-center py-5 shadow-sm" style="background-color: #e9edf4; border-radius: 18px; display: none;">
                    <i class="bi bi-search display-4" style="color: #d4af37;"></i>
                    <h5 class="fw-bolder mt-3" style="color: #0f1d3a;">No se encontraron resultados</h5>
                    <p class="text-muted mb-0">Ningún servicio coincide con el área técnica seleccionada.</p>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection