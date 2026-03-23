@extends('layouts.dashboard')

@section('content')
<div class="p-1 bg-gray-50 min-h-screen">

    {{-- ENCABEZADO --}}
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-3 mb-6">
        <div>
            <div class="inline-flex items-center gap-1.5 bg-[#081423]/5 text-[#d4af37] px-2.5 py-0.5 rounded-full text-[10px] font-semibold uppercase tracking-wider mb-1.5 border border-[#d4af37]/20">
                <i class="fas fa-info-circle text-[11px]"></i>
                Ficha de Área Técnica
            </div>
            
            <h1 class="text-xl sm:text-2xl font-bold text-[#0f1d3a] leading-tight">
                Detalles del Área
            </h1>
            
            <p class="mt-1 text-slate-500 text-xs sm:text-sm">
                Información completa, entregables y procesos operativos.
            </p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-2 justify-end">
            <a href="{{ route('areas.index') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-[#0f1d3a] hover:border-[#d4af37] transition-all duration-300 shadow-sm group">
                <i class="fas fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                Volver al Catálogo
            </a>
        </div>
    </div>

    {{-- CONTENIDO PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- COLUMNA IZQUIERDA (Textos largos) --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- Descripción --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative transition-all duration-300 hover:shadow-md">
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-[#081423] to-[#1a2f4f]"></div>
                <div class="p-6 sm:p-8">
                    <h3 class="text-[16px] font-extrabold text-[#0f1d3a] mb-5 flex items-center gap-2.5 border-b border-slate-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-[#081423] text-[#d4af37] flex items-center justify-center shadow-md">
                            <i class="fas fa-align-left text-sm"></i>
                        </div>
                        Descripción General
                    </h3>
                    
                    <div class="text-[14px] text-slate-600 leading-relaxed whitespace-pre-line">
                        {{ $area->descripcion ?: 'No se registró una descripción para esta área.' }}
                    </div>
                </div>
            </div>

            {{-- Entregables --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative transition-all duration-300 hover:shadow-md">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#d4af37]"></div>
                <div class="p-6 sm:p-8">
                    
                    @php
                        // 1. Separamos el texto por saltos de línea ("\n")
                        // 2. array_filter con 'trim' elimina las líneas vacías automáticamente
                        $listaEntregables = $area->entregables ? array_filter(explode("\n", $area->entregables), 'trim') : [];
                        $cantidadEntregables = count($listaEntregables);
                    @endphp

                    <h3 class="text-[16px] font-extrabold text-[#0f1d3a] mb-5 flex items-center gap-2.5 border-b border-slate-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 text-[#d4af37] border border-amber-100 flex items-center justify-center shadow-inner shrink-0">
                            <i class="fas fa-box-open text-sm"></i>
                        </div>
                        Entregables Principales

                        {{-- Contador dinámico que se alinea a la derecha --}}
                        @if($cantidadEntregables > 0)
                            <span class="ml-auto inline-flex items-center justify-center bg-amber-100 text-amber-700 px-2.5 py-1 rounded-lg text-[11px] font-extrabold uppercase tracking-wider">
                                {{ $cantidadEntregables }} {{ $cantidadEntregables === 1 ? 'Ítem' : 'Ítems' }}
                            </span>
                        @endif
                    </h3>
                    
                    <div class="text-[14px] text-slate-600 leading-relaxed bg-amber-50/30 p-4 rounded-xl border border-amber-100/50">
                        @if($cantidadEntregables > 0)
                            <ul class="list-disc ml-5 space-y-1.5 marker:text-amber-500">
                                {{-- Como ya limpiamos el array arriba, el @foreach queda súper sencillo --}}
                                @foreach($listaEntregables as $entregable)
                                    <li>{{ ucfirst(trim($entregable)) }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-amber-700/60 italic font-medium">No se registraron entregables.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Proceso de Trabajo --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative transition-all duration-300 hover:shadow-md">
                <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
                <div class="p-6 sm:p-8">
                    
                    @php
                        $listaProcesos = $area->proceso_trabajo ? array_filter(explode("\n", $area->proceso_trabajo), 'trim') : [];
                        $cantidadProcesos = count($listaProcesos);
                    @endphp

                    <h3 class="text-[16px] font-extrabold text-[#0f1d3a] mb-5 flex items-center gap-2.5 border-b border-slate-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-500 border border-blue-100 flex items-center justify-center shadow-inner shrink-0">
                            <i class="fas fa-project-diagram text-sm"></i>
                        </div>
                        Proceso de Trabajo

                        @if($cantidadProcesos > 0)
                            <span class="ml-auto inline-flex items-center justify-center bg-blue-100 text-blue-700 px-2.5 py-1 rounded-lg text-[11px] font-extrabold uppercase tracking-wider">
                                {{ $cantidadProcesos }} {{ $cantidadProcesos === 1 ? 'Paso' : 'Pasos' }}
                            </span>
                        @endif
                    </h3>
                    
                    <div class="text-[14px] text-slate-600 bg-blue-50/30 p-5 rounded-xl border border-blue-100/50">
                        @if($cantidadProcesos > 0)
                            {{-- Contenedor Flex para alinear todo uno al lado del otro, saltando de línea si no cabe --}}
                            <div class="flex flex-wrap items-center gap-y-3 gap-x-2">
                                
                                @foreach($listaProcesos as $proceso)
                                    <div class="flex items-center gap-2">
                                        {{-- El recuadro de cada paso --}}
                                        <span class="bg-white border border-blue-200 text-blue-800 font-medium px-3.5 py-1.5 rounded-lg shadow-sm">
                                            {{ ucfirst(trim($proceso)) }}
                                        </span>
                                        
                                        {{-- Solo dibuja la flecha SI NO ES el último elemento --}}
                                        @if(!$loop->last)
                                            <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        @endif
                                    </div>
                                @endforeach
                                
                            </div>
                        @else
                            <p class="text-blue-700/60 italic font-medium">No se registró un proceso de trabajo.</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        {{-- COLUMNA DERECHA (Información Resumida y Metadatos) --}}
        <div class="space-y-6">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#081423]"></div>
                
                <div class="p-6">
                    <h3 class="text-[13px] font-extrabold text-[#0f1d3a] mb-4 uppercase tracking-widest border-b border-slate-100 pb-3 flex items-center gap-2">
                        <i class="fas fa-tags text-[#d4af37]"></i> Datos del Área
                    </h3>
                    
                    <ul class="space-y-5">
                        <li>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nombre Oficial</p>
                            <p class="text-[14px] font-extrabold text-[#0f1d3a]">
                                {{ $area->nombre }}
                            </p>
                        </li>

                        <li>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Ícono Representativo</p>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-[#081423]/5 text-[#d4af37] border border-[#d4af37]/20 flex items-center justify-center shadow-sm">
                                    <i class="bi {{ $area->icono }} text-lg"></i>
                                </div>
                                <span class="text-[11px] font-mono text-slate-500 bg-slate-50 px-2 py-1 rounded-md border border-slate-200">
                                    {{ $area->icono }}
                                </span>
                            </div>
                        </li>
                        
                        <li>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Estado Operativo</p>
                            @if($area->estado === 'Activo')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 text-emerald-600 text-[11px] font-extrabold uppercase tracking-wider rounded-lg border border-emerald-200/60 shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Activa
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-50 text-rose-600 text-[11px] font-extrabold uppercase tracking-wider rounded-lg border border-rose-200/60 shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Inactiva
                                </span>
                            @endif
                        </li>

                        <li>
                            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">ID de Registro</p>
                            <p class="text-[13px] font-bold text-slate-600 font-mono bg-slate-50 px-2.5 py-1 rounded-md inline-block border border-slate-200">
                                #{{ str_pad($area->id, 4, '0', STR_PAD_LEFT) }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-slate-50 rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative">
                <div class="p-6">
                    <h3 class="text-[12px] font-extrabold text-slate-600 mb-4 uppercase tracking-widest border-b border-slate-200 pb-3 flex items-center gap-2">
                        <i class="fas fa-clock text-slate-400"></i> Registro en Sistema
                    </h3>
                    
                    <ul class="space-y-4">
                        <li>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Fecha de Creación</p>
                            <p class="text-[13px] font-medium text-slate-700 flex items-center gap-1.5">
                                <i class="far fa-calendar-plus text-slate-400"></i> 
                                {{ $area->created_at ? $area->created_at->format('d/m/Y h:i A') : '—' }}
                            </p>
                        </li>
                        <li>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Última Actualización</p>
                            <p class="text-[13px] font-medium text-slate-700 flex items-center gap-1.5">
                                <i class="far fa-edit text-slate-400"></i> 
                                {{ $area->updated_at ? $area->updated_at->format('d/m/Y h:i A') : '—' }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection