@extends('layouts.dashboard')

@section('content')
<div class="py-1 px-4 sm:px-6 lg:px-1 bg-slate-50 min-h-screen font-sans">
    <div class="max-w-[1400px] mx-auto space-y-6">

        <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 md:p-8 text-white flex flex-col lg:flex-row justify-between items-start lg:items-center shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37]">
            <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

            <div class="flex flex-row items-center gap-4 sm:gap-5 z-10 w-full mb-6 lg:mb-0">
                <div class="relative p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0 transition-transform duration-300 hover:scale-105">
                    <i class="fas fa-book-open text-2xl sm:text-3xl relative z-10"></i>
                </div>
                
                <div class="flex-1">
                    <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center mb-1">
                        <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                        Gestión de Atención
                    </span>
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight drop-shadow-sm">
                        Libro de Reclamaciones
                    </h1>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
            <div class="stat-card-filter group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(15,29,58,0.1)] flex flex-col justify-between">
                <div class="flex items-center gap-3 sm:gap-5">
                    <div class="p-2.5 sm:p-3.5 bg-gradient-to-br from-[#081423] to-[#1a2f4f] text-[#d4af37] rounded-lg sm:rounded-xl shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalDocumentos }}</h3>
                        <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Total Solicitudes</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-5">
                    <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-[#d4af37] h-full rounded-full w-full"></div>
                    </div>
                </div>
            </div>

            <div class="stat-card-filter group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(245,158,11,0.15)] flex flex-col justify-between">
                <div class="flex items-center gap-3 sm:gap-5">
                    <div class="p-2.5 sm:p-3.5 bg-amber-50 text-amber-500 rounded-lg sm:rounded-xl border border-amber-100 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-3 shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalReclamosCard }}</h3>
                        <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Reclamos</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-5">
                    <div class="flex justify-between text-[9px] sm:text-[10px] text-gray-400 font-bold mb-1">
                        <span>PORCENTAJE</span>
                        <span>{{ round($pctReclamos) }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-amber-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $pctReclamos }}%"></div>
                    </div>
                </div>
            </div>

            <div class="stat-card-filter group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-[0_4px_10px_rgba(0,0,0,0.03)] border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(244,63,94,0.15)] flex flex-col justify-between">
                <div class="flex items-center gap-3 sm:gap-5">
                    <div class="p-2.5 sm:p-3.5 bg-rose-50 text-rose-500 rounded-lg sm:rounded-xl border border-rose-100 transition-transform duration-300 group-hover:scale-110 group-hover:-rotate-3 shrink-0">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <div>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalQuejasCard }}</h3>
                        <p class="text-[10px] sm:text-xs font-bold text-gray-400 uppercase tracking-widest mt-1 sm:mt-1.5">Quejas</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-5">
                    <div class="flex justify-between text-[9px] sm:text-[10px] text-gray-400 font-bold mb-1">
                        <span>PORCENTAJE</span>
                        <span>{{ round($pctQuejas) }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-rose-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: {{ $pctQuejas }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-slate-50 to-transparent pointer-events-none"></div>

            <form id="formFiltrosReclamos" action="{{ route('reclamos.index') }}" method="GET" class="relative z-10 flex flex-col xl:flex-row gap-4 xl:items-center justify-between">

                <div class="relative flex-1 group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors duration-300 group-focus-within:text-[#d4af37] text-slate-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                        class="block w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl leading-5 bg-slate-50/50 text-slate-700 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-4 focus:ring-[#d4af37]/15 focus:border-[#d4af37] sm:text-sm transition-all duration-300 hover:border-slate-300" 
                        placeholder="Buscar por DNI o Correo Electronico...">
                </div>

                <div class="flex items-center p-1.5 bg-slate-100/80 border border-slate-200 rounded-xl shrink-0">
                                                        
                    <label for="filtro-todos" class="relative cursor-pointer m-0">
                        <input type="radio" id="filtro-todos" name="tipo" value="" class="peer sr-only" {{ request('tipo') == '' ? 'checked' : '' }}>
                        <div class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-300 peer-checked:bg-white peer-checked:text-[#0f1d3a] peer-checked:shadow text-slate-500 hover:text-slate-700 flex items-center gap-2">
                            <i class="fas fa-layer-group text-xs opacity-70"></i>
                            <span>Todos</span>
                        </div>
                    </label>

                    <label for="filtro-reclamos" class="relative cursor-pointer m-0">
                        <input type="radio" id="filtro-reclamos" name="tipo" value="Reclamo" class="peer sr-only" {{ request('tipo') == 'Reclamo' ? 'checked' : '' }}>
                        <div class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-300 peer-checked:bg-amber-50 peer-checked:text-amber-700 peer-checked:shadow text-slate-500 hover:text-slate-700 flex items-center gap-2">
                            <i class="fas fa-exclamation-circle text-xs opacity-70"></i>
                            <span>Reclamos</span>
                        </div>
                    </label>

                    <label for="filtro-quejas" class="relative cursor-pointer m-0">
                        <input type="radio" id="filtro-quejas" name="tipo" value="Queja" class="peer sr-only" {{ request('tipo') == 'Queja' ? 'checked' : '' }}>
                        <div class="px-4 py-2 text-sm font-bold rounded-lg transition-all duration-300 peer-checked:bg-rose-50 peer-checked:text-rose-700 peer-checked:shadow text-slate-500 hover:text-slate-700 flex items-center gap-2">
                            <i class="fas fa-comment-dots text-xs opacity-70"></i>
                            <span>Quejas</span>
                        </div>
                    </label>
                    
                </div>

            </form>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">Fecha</th>
                            <th class="py-4 px-6 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">Tipo</th>
                            <th class="py-4 px-6 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">Solicitante</th>
                            <th class="py-4 px-6 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">Documento</th>
                            <th class="py-4 px-6 bg-slate-50 text-xs font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($reclamos as $reclamo)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="py-4 px-6 text-sm text-slate-600 font-medium">
                                {{ $reclamo->created_at->format('d/m/Y') }}<br>
                                <span class="text-xs text-slate-400 font-normal">{{ $reclamo->created_at->format('H:i') }}</span>
                            </td>
                            <td class="py-4 px-6">
                                @if($reclamo->tipo_reclamo == 'Reclamo')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold tracking-wide">
                                        <i class="fas fa-exclamation-circle"></i> RECLAMO
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold tracking-wide">
                                        <i class="fas fa-comment-dots"></i> QUEJA
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <p class="text-sm font-bold text-[#0f1d3a]">{{ $reclamo->primer_nombre }} {{ $reclamo->primer_apellido }}</p>
                                <p class="text-xs text-slate-500 flex items-center gap-1 mt-0.5"><i class="fas fa-envelope text-slate-400"></i> {{ $reclamo->correo }}</p>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-600 font-medium">
                                <span class="text-xs text-slate-400 uppercase">{{ $reclamo->tipo_documento }}</span><br>
                                {{ $reclamo->numero_documento }}
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    
                                    <a href="{{ route('reclamos.show', $reclamo->id) }}" title="Ver Detalles" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-[#0f1d3a] hover:bg-[#d4af37] hover:text-white transition-colors shadow-sm border border-slate-200 hover:border-[#d4af37]">
                                        <i class="fas fa-eye text-sm"></i>
                                    </a>
                                    
                                    <a href="{{ route('reclamos.pdf', $reclamo->id) }}" title="Descargar PDF" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-rose-500 hover:bg-rose-500 hover:text-white transition-colors shadow-sm border border-slate-200 hover:border-rose-500 group">
                                        <i class="fas fa-file-pdf text-sm transition-transform group-hover:scale-110"></i> 
                                    </a>

                                    <button type="button" onclick="imprimirDocumento('{{ route('reclamos.imprimir', $reclamo->id) }}')" title="Imprimir al instante" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-[#0f1d3a] hover:bg-[#0f1d3a] hover:text-white transition-colors shadow-sm border border-slate-200 hover:border-[#0f1d3a] group">
                                        <i class="fas fa-print text-sm transition-transform group-hover:scale-110"></i> 
                                    </button>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                                        <i class="fas fa-inbox text-2xl text-slate-400"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-slate-700 mb-1">Bandeja Vacía</h3>
                                    <p class="text-slate-500 text-sm">No se encontraron reclamos ni quejas.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($reclamos->hasPages())
                <div class="bg-slate-50 px-6 py-4 border-t border-slate-200">
                    {{ $reclamos->links() }}
                </div>
            @endif
        </div>

    </div>
</div>

@vite(['resources/js/reclamos.js'])

@endsection