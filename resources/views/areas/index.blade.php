@extends('layouts.dashboard')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    @php
        $totalAreas = $areas->count() ?? 0;
        $activas = $areas->where('activo', true)->count() ?? 0;
        $inactivas = $areas->where('activo', false)->count() ?? 0;
        
        $pctActivas = $totalAreas > 0 ? ($activas / $totalAreas) * 100 : 0;
        $pctInactivas = $totalAreas > 0 ? ($inactivas / $totalAreas) * 100 : 0;
    @endphp

    {{-- BANNER PRINCIPAL --}}
    <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 md:p-8 text-white flex flex-col md:flex-row justify-between items-start md:items-center mb-8 shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37]">
        
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

        <div class="flex flex-row items-center gap-4 sm:gap-5 z-10 w-full mb-6 md:mb-0">
            <div class="p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0 transition-transform duration-300 hover:scale-105">
                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
            </div>
            
            <div class="flex-1">
                <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center mb-1">
                    <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                    Catálogo de Servicios
                </span>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight">
                    Gestión de Áreas Técnicas
                </h1>
            </div>
        </div>

        <div class="z-10 w-full md:w-auto shrink-0">
            <a href="{{ route('areas.create') }}" class="w-full md:w-auto bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 sm:py-3.5 rounded-xl font-bold text-sm sm:text-base flex justify-center items-center gap-2 transition-all duration-300 shadow-lg hover:-translate-y-1 hover:shadow-xl">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Nueva Área
            </a>
        </div>
    </div>

    {{-- TARJETAS DE ESTADÍSTICAS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        
        <div class="group bg-white rounded-2xl p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(15,29,58,0.1)] flex flex-col justify-between">
            <div class="flex items-center gap-5">
                <div class="p-3.5 bg-gradient-to-br from-[#081423] to-[#1a2f4f] text-[#d4af37] rounded-xl shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalAreas }}</h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1.5">Total Áreas</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-[#d4af37] h-full rounded-full w-full"></div>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-2xl p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(16,185,129,0.15)] flex flex-col justify-between">
            <div class="flex items-center gap-5">
                <div class="p-3.5 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-100 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $activas }}</h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1.5">Áreas Activas</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex justify-between text-[10px] text-gray-400 font-bold mb-1">
                    <span>PORCENTAJE</span>
                    <span>{{ round($pctActivas) }}%</span>
                </div>
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-emerald-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $pctActivas }}%"></div>
                </div>
            </div>
        </div>

        <div class="group bg-white rounded-2xl p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(244,63,94,0.15)] flex flex-col justify-between">
            <div class="flex items-center gap-5">
                <div class="p-3.5 bg-rose-50 text-rose-500 rounded-xl border border-rose-100 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3 shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $inactivas }}</h3>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mt-1.5">Áreas Inactivas</p>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex justify-between text-[10px] text-gray-400 font-bold mb-1">
                    <span>PORCENTAJE</span>
                    <span>{{ round($pctInactivas) }}%</span>
                </div>
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-rose-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $pctInactivas }}%"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- BUSCADOR Y FILTROS --}}
    <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-8">
        <div class="relative w-full md:w-2/3 lg:w-1/3">
            <input type="text" placeholder="Buscar por nombre de área..." 
                class="peer w-full py-3.5 pl-12 pr-4 text-gray-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-[#d4af37]/20 focus:border-[#d4af37] shadow-[0_4px_10px_rgba(0,0,0,0.03)] transition-all duration-300 placeholder:text-gray-400 font-medium">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 peer-focus:text-[#d4af37] transition-colors duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
        </div>
        <div class="flex gap-3 w-full md:w-auto flex-wrap sm:flex-nowrap">
            <button data-filter="todos" class="btn-filter flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#081423] border border-[#081423] text-[#d4af37] shadow-[0_8px_15px_rgba(8,20,35,0.2)] rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-th text-sm icon-filter group-hover:scale-110 transition-transform duration-300"></i>
                <span class="text-[12px] font-bold uppercase tracking-wide">Todos</span>
            </button>
            <button data-filter="con-proyecto" class="btn-filter flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-gray-200 text-gray-500 hover:text-[#081423] hover:border-[#d4af37] shadow-[0_4px_10px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_15px_rgba(212,175,55,0.15)] rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-project-diagram text-sm icon-filter text-gray-400 group-hover:text-[#d4af37] group-hover:scale-110 transition-colors duration-300"></i>
                <span class="text-[12px] font-bold uppercase tracking-wide">Con Proyecto</span>
            </button>
            <button data-filter="sin-proyecto" class="btn-filter flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-gray-200 text-gray-500 hover:text-[#081423] hover:border-[#d4af37] shadow-[0_4px_10px_rgba(0,0,0,0.03)] hover:shadow-[0_8px_15px_rgba(212,175,55,0.15)] rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-info-circle text-sm icon-filter text-gray-400 group-hover:text-[#d4af37] group-hover:scale-110 transition-colors duration-300"></i>
                <span class="text-[12px] font-bold uppercase tracking-wide">Sin Proyecto</span>
            </button>
        </div>
    </div>

    {{-- GRILLA DE TARJETAS (CARDS) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        @forelse ($areas as $area)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative flex flex-col h-full">
                
                {{-- Cabecera Card: Icono y Estado --}}
                <div class="flex justify-between items-start mb-4">
                    <div class="w-14 h-14 rounded-full bg-gray-50 border border-gray-100 flex items-center justify-center text-[#003366]">
                        {{-- Puedes hacer que el icono sea dinámico después, por ahora un genérico --}}
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    
                    @if($area->activo)
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span> Activo
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span> Inactivo
                        </span>
                    @endif
                </div>

                {{-- Cuerpo Card: Información --}}
                <div class="mb-6 flex-grow">
                    <h2 class="text-lg font-bold text-gray-800 uppercase leading-tight mb-2">{{ $area->nombre }}</h2>
                    <div class="flex items-center gap-2 text-gray-500 text-sm mb-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <span class="font-mono text-xs bg-gray-100 px-2 py-0.5 rounded">{{ $area->slug }}</span>
                    </div>
                    <p class="text-gray-500 text-sm line-clamp-2 mt-3">{{ $area->descripcion ?? 'Sin descripción registrada.' }}</p>
                </div>

                {{-- Pie Card: Botones de Acción --}}
                <div class="grid grid-cols-3 gap-2 mt-auto">
                    {{-- Botón Ver (Azul claro de tu imagen) --}}
                    <a href="{{ route('areas.show', $area->id) }}" class="flex flex-col items-center justify-center py-2 bg-[#3CA4D9] hover:bg-blue-500 text-white rounded-lg transition-colors group">
                        <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        <span class="text-[10px] font-bold uppercase tracking-wide">Ver</span>
                    </a>
                    
                    {{-- Botón Editar (Gris Técnico o Amarillo) --}}
                    <a href="{{ route('areas.edit', $area->id) }}" class="flex flex-col items-center justify-center py-2 bg-[#707070] hover:bg-gray-600 text-white rounded-lg transition-colors group">
                        <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        <span class="text-[10px] font-bold uppercase tracking-wide">Editar</span>
                    </a>

                    {{-- Botón Desactivar/Activar (Rojo si está activo, Verde si está inactivo) --}}
                    <form action="#" method="POST" class="inline-block w-full">
                        @csrf
                        @method('PATCH')
                        {{-- NOTA: Arriba en action deberías poner la ruta real, ej: route('areas.toggleStatus', $area->id) --}}
                        
                        @if($area->activo)
                            <button type="submit" class="w-full flex flex-col items-center justify-center py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors" title="Desactivar Área">
                                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                <span class="text-[10px] font-bold uppercase tracking-wide">Desactivar</span>
                            </button>
                        @else
                            <button type="submit" class="w-full flex flex-col items-center justify-center py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors" title="Activar Área">
                                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-[10px] font-bold uppercase tracking-wide">Activar</span>
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        @empty
        <div class="col-span-full bg-white p-10 md:p-14 rounded-2xl text-center border-2 border-dashed border-[#d4af37]/40 shadow-sm relative overflow-hidden group transition-all duration-300 hover:border-[#d4af37]/70 hover:shadow-md">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-[#d4af37] opacity-5 blur-[60px] rounded-full pointer-events-none transition-all duration-700 group-hover:scale-150 group-hover:opacity-10"></div>
            <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl shadow-[0_8px_15px_rgba(8,20,35,0.15)] flex items-center justify-center transform transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_15px_30px_rgba(8,20,35,0.25)]">
                <svg class="w-10 h-10 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div class="relative z-10">
                <h3 class="text-2xl font-extrabold text-[#0f1d3a] mb-2 tracking-tight">Aún no hay Áreas Técnicas</h3>
                <p class="text-gray-500 mb-8 max-w-md mx-auto text-sm sm:text-base leading-relaxed">
                    Comienza registrando la primera línea de servicio de <span class="font-bold text-[#081423]">JEZNET</span> para empezar a gestionar tus proyectos.
                </p>
                <a href="{{ route('areas.create') }}" class="inline-flex items-center justify-center gap-2 bg-[#d4af37] hover:bg-[#c19b2e] text-white px-8 py-3.5 rounded-xl font-bold text-[15px] shadow-[0_8px_15px_rgba(212,175,55,0.2)] hover:shadow-[0_15px_30px_rgba(212,175,55,0.3)] hover:-translate-y-1 active:scale-95 transition-all duration-300 uppercase tracking-wide">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Crear Primera Área
                </a>
            </div>
        </div>
        @endforelse

    </div>
</div>
@endsection