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

        {{-- Glow decorativo --}}
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

        <div class="flex flex-col md:flex-row items-center md:items-start gap-4 sm:gap-5 z-10 w-full mb-6 md:mb-0 text-center md:text-left">
            {{-- Ícono --}}
            <div class="p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0">
                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4a8 8 0 100 16 8 8 0 000-16z"/>
                </svg>
            </div>

            <div class="flex-1">
                <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center justify-center md:justify-start mb-1">
                    <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                    Gestión General
                </span>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight">
                    Historial de Proyectos
                </h1>
                <p class="text-white/50 text-xs sm:text-sm mt-1">Proyectos finalizados y cancelados del sistema</p>
            </div>
        </div>

        {{-- Botón regresar --}}
        <div class="z-10 w-full md:w-auto shrink-0 mt-4 md:mt-0">
            <a href="{{ route('proyectos.index') }}"
               class="w-full md:w-auto bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-xl font-bold flex items-center justify-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver a Proyectos
            </a>
        </div>
    </div>

    {{-- TABLA --}}
    <div class="bg-white rounded-2xl shadow-[0_4px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">

        {{-- Cabecera — solo visible en md+ --}}
        <div class="hidden md:grid grid-cols-[2fr_2fr_1.5fr_1.5fr_1.5fr_1fr_1fr_1fr_1fr_1fr_1fr] gap-2 px-6 py-4 bg-gradient-to-r from-[#081423] to-[#1a2f4f] text-white text-[11px] font-bold uppercase tracking-widest text-center">
            <span>Proyecto</span>
            <span>Descripción</span>
            <span>Ubicación</span>
            <span>Área</span>
            <span>Cliente</span>
            <span>Estado</span>
            <span>Costo</span>
            <span>Avance</span>
            <span>Inicio</span>
            <span>Fin</span>
            <span>Acción</span>
        </div>

        {{-- Filas --}}
        @forelse($proyectos as $proyecto)

        {{-- ═══════════════ DESKTOP (md+) ═══════════════ --}}
        <div class="hidden md:grid grid-cols-[2fr_2fr_1.5fr_1.5fr_1.5fr_1fr_1fr_1fr_1fr_1fr_1fr] gap-2 items-center px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200 text-center">

            {{-- Proyecto --}}
            <div class="flex flex-col items-center justify-center gap-1">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#081423] to-[#1a2f4f] flex items-center justify-center shrink-0 shadow-sm">
                    <svg class="w-4 h-4 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/>
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
                <span class="text-sm text-gray-600">{{ $proyecto->descripcion }}</span>
            </div>

            {{-- Ubicación --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-sm text-gray-600">{{ $proyecto->ubicacion }}</span>
            </div>

            {{-- Área --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-sm text-gray-600">{{ $proyecto->area?->nombre ?? '-' }}</span>
            </div>

            {{-- Cliente --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-sm text-gray-600">{{ $proyecto->cliente?->nombre ?? '-' }}</span>
            </div>

            {{-- Estado --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                @php
                    $badgeClass = match(true) {
                        str_contains($proyecto->estado, 'ejec') => 'bg-yellow-100 text-yellow-800',
                        $proyecto->estado === 'Finalizado'      => 'bg-green-100 text-green-700',
                        $proyecto->estado === 'Cancelado'       => 'bg-red-100 text-red-700',
                        default                                  => 'bg-gray-100 text-gray-700',
                    };
                    $dotClass = match(true) {
                        str_contains($proyecto->estado, 'ejec') => 'bg-yellow-400',
                        $proyecto->estado === 'Finalizado'      => 'bg-green-500',
                        $proyecto->estado === 'Cancelado'       => 'bg-red-500',
                        default                                  => 'bg-gray-400',
                    };
                @endphp
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                    {{ $proyecto->estado }}
                </span>
            </div>

            {{-- Costo --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-sm font-bold text-[#0f1d3a]">S/ {{ number_format($proyecto->costo, 2, '.', ',') }}</span>
            </div>

            {{-- Avance --}}
            <div class="flex items-center justify-center gap-2 border-l border-gray-200">
                <div class="flex-1 bg-gray-100 h-2 rounded-full overflow-hidden min-w-[50px]">
                    <div class="bg-[#d4af37] h-full rounded-full" style="width: {{ $proyecto->avance }}%"></div>
                </div>
                <span class="text-xs font-bold text-gray-500 shrink-0">{{ $proyecto->avance }}%</span>
            </div>

            {{-- Inicio --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-xs text-gray-500">{{ $proyecto->fecha_inicio }}</span>
            </div>

            {{-- Fin --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <span class="text-xs text-gray-500">{{ $proyecto->fecha_fin }}</span>
            </div>

            {{-- Acción --}}
            <div class="flex items-center justify-center border-l border-gray-200">
                <form action="{{ route('proyectos.reactivar', $proyecto->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-blue-600 hover:text-blue-800 font-bold text-sm transition-colors duration-200">
                        Reactivar
                    </button>
                </form>
            </div>
        </div>

        {{-- ═══════════════ MÓVIL (< md) ═══════════════ --}}
        <div class="md:hidden border-b border-gray-100 p-4 hover:bg-gray-50 transition">

            {{-- Fila 1: ícono + nombre + badge --}}
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#081423] to-[#1a2f4f] flex items-center justify-center shrink-0 shadow-sm">
                        <svg class="w-5 h-5 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-[#0f1d3a] text-sm">{{ $proyecto->nombre }}</p>
                        <p class="text-xs text-gray-400 flex items-center gap-1 mt-0.5">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{ $proyecto->ubicacion }}
                        </p>
                    </div>
                </div>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                    {{ $proyecto->estado }}
                </span>
            </div>

            {{-- Fila 2: datos en grid 2 columnas --}}
            <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Descripción</p>
                    <p class="text-gray-700 font-semibold">{{ $proyecto->descripcion }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Área</p>
                    <p class="text-gray-700 font-semibold">{{ $proyecto->area?->nombre ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Cliente</p>
                    <p class="text-gray-700 font-semibold">{{ $proyecto->cliente?->nombre ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Costo</p>
                    <p class="text-[#0f1d3a] font-bold">S/ {{ number_format($proyecto->costo, 2, '.', ',') }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Inicio</p>
                    <p class="text-gray-700 font-semibold">{{ $proyecto->fecha_inicio }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg px-3 py-2">
                    <p class="text-gray-400 font-medium uppercase tracking-wide text-[10px] mb-0.5">Fin</p>
                    <p class="text-gray-700 font-semibold">{{ $proyecto->fecha_fin }}</p>
                </div>
            </div>

            {{-- Fila 3: barra de avance --}}
            <div class="mb-3">
                <div class="flex justify-between text-[10px] font-semibold text-gray-500 mb-1">
                    <span class="uppercase tracking-wide">Avance</span>
                    <span>{{ $proyecto->avance }}%</span>
                </div>
                <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-[#d4af37] h-full rounded-full" style="width: {{ $proyecto->avance }}%"></div>
                </div>
            </div>

            {{-- Fila 4: botón acción --}}
            <div class="flex justify-end">
                <form action="{{ route('proyectos.reactivar', $proyecto->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-xs px-4 py-2 rounded-lg transition">
                        Reactivar
                    </button>
                </form>
            </div>
        </div>

        @empty
        {{-- EMPTY STATE --}}
        <div class="p-10 md:p-14 text-center border-t-2 border-dashed border-[#d4af37]/30">
            <div class="w-14 h-14 bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl flex items-center justify-center mx-auto mb-4 shadow">
                <svg class="w-7 h-7 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4a8 8 0 100 16 8 8 0 000-16z"/>
                </svg>
            </div>
            <h3 class="text-xl font-extrabold text-[#0f1d3a] mb-2">Sin historial de proyectos</h3>
            <p class="text-gray-500 text-sm max-w-xs mx-auto">Los proyectos finalizados o cancelados aparecerán aquí.</p>
        </div>
        @endforelse

    </div>
</div>

@endsection