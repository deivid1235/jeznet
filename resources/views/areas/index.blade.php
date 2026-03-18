@extends('layouts.dashboard')

@section('content')
<div class="p-1 bg-gray-50 min-h-screen">

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
            <button type="button" onclick="openAreaModal(false, '{{ route('areas.store') }}')" class="w-full md:w-auto bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 sm:py-3.5 rounded-xl font-bold text-sm sm:text-base flex justify-center items-center gap-2 transition-all duration-300 shadow-lg hover:-translate-y-1 hover:shadow-xl">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Nueva Área
            </button>
        </div>
    </div>

    {{-- TARJETAS DE ESTADÍSTICAS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
        {{-- Total Áreas --}}
        <div class="stat-card-filter cursor-pointer group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(15,29,58,0.1)] flex flex-col justify-between" data-status-filter="todos">
            <div class="flex items-center gap-3 sm:gap-5">
                <div class="p-2.5 sm:p-3.5 bg-gradient-to-br from-[#081423] to-[#1a2f4f] text-[#d4af37] rounded-lg sm:rounded-xl shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg>
                </div>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalAreas }}</h3>
                    <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Total Áreas</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-5">
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-[#d4af37] h-full rounded-full w-full"></div>
                </div>
            </div>
        </div>

        {{-- Áreas Activas --}}
        <div class="stat-card-filter cursor-pointer group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(16,185,129,0.15)] flex flex-col justify-between" data-status-filter="activo">
            <div class="flex items-center gap-3 sm:gap-5">
                <div class="p-2.5 sm:p-3.5 bg-emerald-50 text-emerald-600 rounded-lg sm:rounded-xl border border-emerald-100 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $activas }}</h3>
                    <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Áreas Activas</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-5">
                <div class="flex justify-between text-[9px] sm:text-[10px] text-gray-400 font-bold mb-1">
                    <span>PORCENTAJE</span>
                    <span>{{ round($pctActivas) }}%</span>
                </div>
                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-emerald-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $pctActivas }}%"></div>
                </div>
            </div>
        </div>

        {{-- Áreas Inactivas --}}
        <div class="stat-card-filter cursor-pointer group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(244,63,94,0.15)] flex flex-col justify-between" data-status-filter="inactivo">
            <div class="flex items-center gap-3 sm:gap-5">
                <div class="p-2.5 sm:p-3.5 bg-rose-50 text-rose-500 rounded-lg sm:rounded-xl border border-rose-100 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3 shrink-0">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $inactivas }}</h3>
                    <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Áreas Inactivas</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-5">
                <div class="flex justify-between text-[9px] sm:text-[10px] text-gray-400 font-bold mb-1">
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
            <input type="text" id="searchInput" placeholder="Buscar por nombre de área..." 
                class="peer w-full py-3.5 pl-12 pr-4 text-gray-700 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-[#d4af37]/20 focus:border-[#d4af37] shadow-[0_4px_10px_rgba(0,0,0,0.03)] transition-all duration-300 placeholder:text-gray-400 font-medium">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 peer-focus:text-[#d4af37] transition-colors duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
        </div>
        <div class="flex gap-2 sm:gap-3 w-full md:w-auto flex-wrap sm:flex-nowrap">
            <button data-filter="todos" class="btn-filter flex-auto sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 px-3 sm:px-6 py-2.5 sm:py-3 bg-[#081423] border border-[#081423] text-[#d4af37] shadow-[0_4px_10px_rgba(8,20,35,0.2)] sm:shadow-[0_8px_15px_rgba(8,20,35,0.2)] rounded-lg sm:rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-th text-[10px] sm:text-sm icon-filter group-hover:scale-110 transition-transform duration-300"></i>
                <span class="text-[10px] sm:text-[12px] font-bold uppercase tracking-wide whitespace-nowrap">Todos</span>
            </button>
            <button data-filter="con-proyecto" class="btn-filter flex-auto sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 px-3 sm:px-6 py-2.5 sm:py-3 bg-white border border-gray-200 text-gray-500 hover:text-[#081423] hover:border-[#d4af37] shadow-sm hover:shadow-[0_8px_15px_rgba(212,175,55,0.15)] rounded-lg sm:rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-project-diagram text-[10px] sm:text-sm icon-filter text-gray-400 group-hover:text-[#d4af37] group-hover:scale-110 transition-colors duration-300"></i>
                <span class="text-[10px] sm:text-[12px] font-bold uppercase tracking-wide whitespace-nowrap">Con Proyecto</span>
            </button>
            <button data-filter="sin-proyecto" class="btn-filter flex-auto sm:flex-none inline-flex items-center justify-center gap-1.5 sm:gap-2 px-3 sm:px-6 py-2.5 sm:py-3 bg-white border border-gray-200 text-gray-500 hover:text-[#081423] hover:border-[#d4af37] shadow-sm hover:shadow-[0_8px_15px_rgba(212,175,55,0.15)] rounded-lg sm:rounded-xl hover:-translate-y-1 active:scale-95 transition-all duration-300 group">
                <i class="fas fa-info-circle text-[10px] sm:text-sm icon-filter text-gray-400 group-hover:text-[#d4af37] group-hover:scale-110 transition-colors duration-300"></i>
                <span class="text-[10px] sm:text-[12px] font-bold uppercase tracking-wide whitespace-nowrap">Sin Proyecto</span>
            </button>
        </div>
    </div>

    {{-- GRILLA DE TARJETAS (CARDS) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="areasContainer">
        
        @forelse ($areas as $area)
        <div class="area-card group relative bg-white rounded-2xl p-5 md:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(15,29,58,0.1)] flex flex-col h-full overflow-hidden"
            data-id="{{ strtolower($area->id) }}"
            data-nombre="{{ strtolower($area->nombre) }}"
            data-proyecto="{{ ($area->entregables || $area->proceso_trabajo) ? 'con-proyecto' : 'sin-proyecto' }}"
            data-estado="{{ strtolower($area->estado) }}">
            
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#081423] via-[#d4af37] to-[#081423] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

            <div class="flex justify-between items-start mb-5 relative z-10">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#081423] to-[#1a2f4f] shadow-md flex items-center justify-center text-[#d4af37] transition-transform duration-300 group-hover:scale-110 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                
                @if($area->estado === 'Activo')
                    <span class="bg-emerald-50 text-emerald-600 border border-emerald-100 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Activo
                    </span>
                @else
                    <span class="bg-rose-50 text-rose-600 border border-rose-100 px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider flex items-center gap-1.5 shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Inactivo
                    </span>
                @endif
            </div>

            <div class="mb-6 flex-grow relative z-10">
                <h2 class="text-lg font-extrabold text-[#0f1d3a] leading-tight mb-2 line-clamp-1" title="{{ $area->nombre }}">
                    {{ $area->nombre }}
                </h2>
                
                <div class="flex flex-wrap gap-2 mb-3">
                    @if($area->entregables)
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded uppercase tracking-wider">
                            <svg class="w-3 h-3 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                            Entregables
                        </span>
                    @endif
                    @if($area->proceso_trabajo)
                        <span class="inline-flex items-center gap-1 text-[10px] font-bold text-gray-500 bg-gray-100 px-2 py-1 rounded uppercase tracking-wider">
                            <svg class="w-3 h-3 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Procesos
                        </span>
                    @endif
                </div>

                <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">
                    {{ $area->descripcion ?? 'Sin descripción registrada.' }}
                </p>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between relative z-10">
                
                <a href="{{ route('areas.show', $area->id) }}" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-[#081423] transition-colors duration-300 group">
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">Ver</span>
                </a>
                
                <button type="button" 
                    onclick="openAreaModal(true, '{{ route('areas.update', $area->id) }}', this)"
                    data-nombre="{{ $area->nombre }}"
                    data-descripcion="{{ $area->descripcion }}"
                    data-entregables="{{ $area->entregables }}"
                    data-proceso="{{ $area->proceso_trabajo }}"
                    data-estado="{{ $area->estado }}"
                    class="inline-flex items-center gap-1.5 text-slate-400 hover:text-[#d4af37] transition-colors duration-300 group cursor-pointer">
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">Editar</span>
                </button>

                <form action="{{ route('areas.toggle-status', $area->id) }}" method="POST" class="inline-flex form-toggle-status" data-estado="{{ $area->estado }}">
                    @csrf
                    @method('PATCH')
                    
                    @if($area->estado === 'Activo')
                        <button type="submit" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-rose-500 transition-colors duration-300 group" title="Desactivar Área">
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">Desactivar</span>
                        </button>
                    @else
                        <button type="submit" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-emerald-500 transition-colors duration-300 group" title="Activar Área">
                            <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">Activar</span>
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

    {{-- MODAL CREAR / EDITAR ÁREA --}}
    <div id="areaModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-[#081423]/60 backdrop-blur-sm" aria-hidden="true" onclick="closeAreaModal()"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block relative overflow-hidden text-left align-bottom transition-all transform bg-white rounded-2xl shadow-2xl sm:my-8 sm:align-middle sm:max-w-2xl w-full border border-gray-100">
                
                <form id="areaForm" method="POST" action="">
                    @csrf
                    <div id="methodContainer"></div>

                    <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] px-6 py-4 flex justify-between items-center border-b-4 border-[#d4af37]">
                        <h3 class="text-xl font-extrabold text-white tracking-tight flex items-center gap-3" id="modalTitle">
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            <span>Nueva Área Técnica</span>
                        </h3>
                        <button type="button" onclick="closeAreaModal()" class="text-gray-400 hover:text-[#d4af37] transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <div class="px-6 py-6 space-y-5 bg-gray-50/50">
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="md:col-span-2">
                                <label for="nombre" class="block text-sm font-bold text-[#0f1d3a] mb-1.5">Nombre del Área <span class="text-rose-500">*</span></label>
                                <input type="text" name="nombre" id="modal-nombre" required
                                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#d4af37]/50 focus:border-[#d4af37] transition-all duration-300 font-medium text-gray-700 shadow-sm"
                                    placeholder="Ej: Desarrollo de Software">
                            </div>
                            <div>
                                <label for="estado" class="block text-sm font-bold text-[#0f1d3a] mb-1.5">Estado</label>
                                <select name="estado" id="modal-estado" 
                                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#d4af37]/50 focus:border-[#d4af37] transition-all duration-300 font-medium text-gray-700 shadow-sm cursor-pointer">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm font-bold text-[#0f1d3a] mb-1.5">Descripción General</label>
                            <textarea name="descripcion" id="modal-descripcion" rows="3"
                                class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#d4af37]/50 focus:border-[#d4af37] transition-all duration-300 text-gray-700 shadow-sm resize-none"
                                placeholder="Breve descripción del propósito de esta área..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="entregables" class="block text-sm font-bold text-[#0f1d3a] mb-1.5">Entregables (Opcional)</label>
                                <textarea name="entregables" id="modal-entregables" rows="3"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#d4af37]/50 focus:border-[#d4af37] transition-all duration-300 text-gray-700 shadow-sm resize-none"
                                    placeholder="Lista de entregables principales..."></textarea>
                            </div>
                            <div>
                                <label for="proceso_trabajo" class="block text-sm font-bold text-[#0f1d3a] mb-1.5">Proceso de Trabajo (Opcional)</label>
                                <textarea name="proceso_trabajo" id="modal-proceso" rows="3"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#d4af37]/50 focus:border-[#d4af37] transition-all duration-300 text-gray-700 shadow-sm resize-none"
                                    placeholder="Flujo de trabajo o metodologías..."></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="px-6 py-4 bg-gray-100 border-t border-gray-200 flex justify-end gap-3 rounded-b-2xl">
                        <button type="button" onclick="closeAreaModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:text-[#0f1d3a] transition-all duration-300 shadow-sm">
                            Cancelar
                        </button>
                        <button type="submit" id="btnSubmitModal" class="px-6 py-2.5 bg-[#d4af37] text-white font-bold rounded-xl hover:bg-[#c19b2e] transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            Guardar Área
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection