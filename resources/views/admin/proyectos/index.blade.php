@extends('layouts.dashboard')
@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

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

        <div class="z-10 w-full md:w-auto shrink-0 mt-4 md:mt-0">
            <a href="{{ route('proyectos.create') }}" class="w-full md:w-auto bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 sm:py-3.5 rounded-xl font-bold text-sm sm:text-base flex justify-center items-center gap-2 transition-all duration-300 shadow-lg hover:-translate-y-1 hover:shadow-xl">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Nuevo Proyecto
            </a>
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
            <div class="fila-proyecto grid grid-cols-1 md:grid-cols-[2fr_2fr_1.5fr_1.5fr_1.5fr_1fr_1fr_1fr_1fr] gap-4 items-center px-6 py-4 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200 group text-center">

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
                <div class="flex items-center justify-center gap-2 border-l border-gray-200">
                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="w-9 h-9 flex items-center justify-center bg-[#3CA4D9] hover:bg-blue-500 text-white rounded-lg transition-all duration-200 hover:scale-110 shadow-sm" title="Editar proyecto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-9 h-9 flex items-center justify-center bg-rose-500 hover:bg-rose-600 text-white rounded-lg transition-all duration-200 hover:scale-110 shadow-sm" title="Eliminar proyecto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
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