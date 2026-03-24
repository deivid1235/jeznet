@extends('layouts.dashboard')
@section('content')

@if(session('success'))
    <div id="flash-success-message"
         data-message="{{ session('success') }}"
         class="hidden"></div>
@endif

@if(session('error'))
    <div id="flash-error-message"
         data-message="{{ session('error') }}"
         class="hidden"></div>
@endif
<div class="p-6 bg-gray-50 h-full overflow-x-hidden"> 

    {{-- BANNER PRINCIPAL --}}
    <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 md:p-8 text-white flex flex-col md:flex-row justify-between items-start md:items-center mb-8 shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37]">
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>
        
        <div class="flex flex-col md:flex-row items-center md:items-start gap-4 sm:gap-5 z-10 w-full mb-6 md:mb-0 text-center md:text-left">
            <div class="p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0">
                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                </svg>
            </div>

            <div class="flex-1">
                <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center justify-center md:justify-start mb-1">
                    <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                    Gestión General
                </span>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight">
                    Todos los Proyectos
                </h1>
                <p class="text-white/50 text-xs sm:text-sm mt-1">Resumen general de todos los proyectos registrados en el sistema</p>
            </div>
        </div>

        <div class="z-10 w-full md:w-auto shrink-0 mt-4 md:mt-0 flex flex-wrap gap-3">
            {{-- NUEVO PROYECTO --}}
            <a href="{{ route('proyectos.create') }}" 
            class="bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Nuevo Proyecto
            </a>
            {{-- HISTORIAL --}}
            <a href="{{ route('proyectos.historial') }}" 
            class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4a8 8 0 100 16 8 8 0 000-16z"/>
                </svg>
                Historial
            </a>
        </div>
    </div>

    {{-- ESTADÍSTICAS DE PROYECTOS --}}
    @php
        $total        = $todosLosProyectos->count();
        $enEjecucion  = $todosLosProyectos->where('estado', 'En ejecución')->count();
        $finalizados  = $todosLosProyectos->where('estado', 'Finalizado')->count();
        $planificados = $todosLosProyectos->where('estado', 'Planificado')->count();
        $cancelados   = $todosLosProyectos->where('estado', 'Cancelado')->count();
    @endphp

    <div class="flex flex-wrap gap-4 mb-6">

        {{-- Total Proyectos --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-[#081423] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $total }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Total Proyectos</p>
                </div>
            </div>
            <div class="w-full h-1.5 rounded-full bg-[#d4af37]"></div>
        </div>

        {{-- En Ejecución --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $enEjecucion }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">En Ejecución</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $total > 0 ? round(($enEjecucion / $total) * 100) : 0 }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-blue-500 transition-all duration-500"
                         style="width: {{ $total > 0 ? round(($enEjecucion / $total) * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>

        {{-- Finalizado --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $finalizados }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Finalizados</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $total > 0 ? round(($finalizados / $total) * 100) : 0 }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-green-500 transition-all duration-500"
                         style="width: {{ $total > 0 ? round(($finalizados / $total) * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>

        {{-- Planificado --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $planificados }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Planificados</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $total > 0 ? round(($planificados / $total) * 100) : 0 }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-amber-400 transition-all duration-500"
                         style="width: {{ $total > 0 ? round(($planificados / $total) * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>

        {{-- Cancelado --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $cancelados }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Cancelados</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $total > 0 ? round(($cancelados / $total) * 100) : 0 }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-red-500 transition-all duration-500"
                         style="width: {{ $total > 0 ? round(($cancelados / $total) * 100) : 0 }}%"></div>
                </div>
            </div>
        </div>

    </div>

    {{-- BUSCADOR Y FILTROS POR ESTADO --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">

        {{-- Buscador --}}
        <div class="relative w-full sm:max-w-sm">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z"/>
                </svg>
            </div>
            <input id="buscadorProyecto"
                type="text"
                placeholder="Buscar por nombre de proyecto..."
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#d4af37]/40 focus:border-[#d4af37] transition"/>
        </div>

        {{-- Botones filtro por estado --}}
        <div class="flex flex-wrap gap-2">
            <button data-filtro="todos"
                    class="btn-filtro active-filtro inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 shadow-sm hover:border-[#081423] hover:text-[#081423] transition-all">
                Todos
            </button>

            <button data-filtro="en ejecución"
                    class="btn-filtro inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 shadow-sm hover:border-blue-500 hover:text-blue-600 transition-all">
                En Ejecución
            </button>

            <button data-filtro="planificado"
                    class="btn-filtro inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 shadow-sm hover:border-amber-400 hover:text-amber-600 transition-all">
                Planificado
            </button>
        </div>
    </div>

    {{-- TABLA DE PROYECTOS --}}
    <div class="bg-white rounded-2xl shadow-[0_4px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">

        {{-- Cabecera --}}
        <div class="hidden md:grid grid-cols-[2fr_2fr_1.5fr_1.5fr_1.5fr_1fr_1fr_1fr_1fr] gap-4 px-6 py-4 bg-gradient-to-r from-[#081423] to-[#1a2f4f] text-white text-[11px] font-bold uppercase tracking-widest text-center">
            <span>Proyecto</span>
            <span>Descripción</span>
            <span>Ubicación</span>
            <span>Área</span>
            <span>Cliente</span>
            <span>Estado</span>
            <span>Costo</span>
            <span>Avance</span>
            <span>Acción</span>
        </div>

        {{-- Filas dinámicas --}}
        <div id="tablaProyectos">
            @forelse ($proyectos as $proyecto)
            <div class="fila-proyecto grid grid-cols-1 md:grid-cols-[2fr_2fr_1.5fr_1.5fr_1.5fr_1fr_1fr_1fr_1fr] gap-4 items-center px-6 py-4 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200 group text-center"
                 data-estado="{{ $proyecto->estado }}"
                 data-nombre="{{ strtolower(trim($proyecto->nombre)) }}">

                {{-- Proyecto --}}
                <div class="flex flex-col items-center justify-center gap-1">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#081423] to-[#1a2f4f] flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-4 h-4 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                        </svg>
                    </div>
                    <p class="font-bold text-[#0f1d3a] text-sm leading-tight">{{ $proyecto->nombre }}</p>
                    <p class="text-xs text-gray-400 flex items-center justify-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $proyecto->ubicacion }}
                    </p>
                </div>

                {{-- Descripción --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="text-sm text-gray-600 font-medium">{{ $proyecto->descripcion }}</span>
                </div>

                {{-- Ubicación --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="text-sm text-gray-600 font-medium">{{ $proyecto->ubicacion }}</span>
                </div>

                {{-- Área --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="text-sm text-gray-600 font-medium">{{ $proyecto->area?->nombre ?? '-' }}</span>
                </div>

                {{-- Cliente --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="text-sm text-gray-600 font-medium">{{ $proyecto->cliente?->nombre ?? '-' }}</span>
                </div>

                {{-- Estado --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $proyecto->estado_color }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $proyecto->estado_dot }}"></span>
                        {{ $proyecto->estado }}
                    </span>
                </div>

                {{-- Costo --}}
                <div class="flex items-center justify-center border-l border-gray-200">
                    <span class="text-sm font-bold text-[#0f1d3a]">S/ {{ number_format($proyecto->costo, 2, '.', ',') }}</span>
                </div>

                {{-- Avance --}}
                <div class="flex items-center justify-center gap-3 border-l border-gray-200">
                    <div class="flex-1 bg-gray-100 h-2 rounded-full overflow-hidden min-w-[60px] mx-auto">
                        <div class="bg-[#d4af37] h-full rounded-full" style="width: {{ $proyecto->avance }}%"></div>
                    </div>
                    <span class="text-xs font-bold text-gray-500 w-8 text-right shrink-0">{{ $proyecto->avance }}%</span>
                </div>

                {{-- Acciones --}}
                <div class="flex flex-col items-center gap-2">
                    {{-- Finalizar --}}
                    <form action="{{ route('proyectos.finalizar', $proyecto->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                        class="text-gray-600 hover:text-green-600 font-semibold transition-colors duration-200"
                        title="Finalizar proyecto">
                            Finalizar
                        </button>
                    </form>

                    {{-- Cancelar --}}
                    <form action="{{ route('proyectos.cancelar', $proyecto->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                        class="text-gray-600 hover:text-yellow-600 font-semibold transition-colors duration-200"
                        title="Cancelar proyecto">
                            Cancelar
                        </button>
                    </form>
                </div>

            </div>

            @empty
            <div class="col-span-full bg-white p-10 md:p-14 rounded-b-2xl text-center border-t-2 border-dashed border-[#d4af37]/30 relative overflow-hidden group transition-all duration-300">
                <h3 class="text-2xl font-extrabold text-[#0f1d3a] mb-2 tracking-tight">Aún no hay Proyectos</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto text-sm leading-relaxed">
                    Comienza registrando el primer proyecto para gestionar su ejecución y avance.
                </p>
                <a href="{{ route('proyectos.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#d4af37] hover:bg-[#c19b2e] text-white px-8 py-3.5 rounded-xl font-bold text-[15px] shadow hover:-translate-y-1 uppercase tracking-wide">
                    Crear Primer Proyecto
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection