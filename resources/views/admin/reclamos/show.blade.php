@extends('layouts.dashboard')

@section('content')
<div class="py-4 px-2 sm:px-4 lg:px-6 bg-slate-50 min-h-screen font-sans">
    
    <div class="max-w-[1400px] mx-auto space-y-5">

        <div>
            <a href="{{ route('reclamos.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#0f1d3a] transition-colors group">
                <div class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center group-hover:border-[#0f1d3a] group-hover:bg-slate-50 transition-all">
                    <i class="fas fa-arrow-left"></i>
                </div>
                Volver al listado
            </a>
        </div>

        <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 text-white shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37] flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

            <div class="relative z-10 flex items-center gap-4 sm:gap-5">
                <div class="w-12 h-12 sm:w-14 sm:h-14 bg-white/10 rounded-2xl flex items-center justify-center text-[#d4af37] border border-white/20 shrink-0">
                    <i class="fas fa-file-signature text-xl sm:text-2xl"></i>
                </div>
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <span class="text-[10px] sm:text-xs font-bold text-[#d4af37] tracking-widest uppercase">ID del Documento: #{{ str_pad($reclamo->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white leading-tight">Detalle de Solicitud</h1>
                    <p class="text-blue-100/80 text-xs sm:text-sm mt-1">
                        <i class="far fa-calendar-alt mr-1"></i> Registrado el {{ $reclamo->created_at->format('d/m/Y \a \l\a\s H:i') }}
                    </p>
                </div>
            </div>

            <div class="relative z-10 shrink-0 w-full md:w-auto text-right">
                @if($reclamo->tipo_reclamo == 'Reclamo')
                    <span class="inline-flex items-center justify-center w-full md:w-auto gap-2 px-4 py-2 rounded-xl bg-amber-500/20 border border-amber-500/50 text-amber-300 font-bold tracking-wide">
                        <i class="fas fa-exclamation-circle text-lg"></i> RECLAMO
                    </span>
                @else
                    <span class="inline-flex items-center justify-center w-full md:w-auto gap-2 px-4 py-2 rounded-xl bg-rose-500/20 border border-rose-500/50 text-rose-300 font-bold tracking-wide">
                        <i class="fas fa-comment-dots text-lg"></i> QUEJA
                    </span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            
            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#0f1d3a] to-[#173866]"></div>
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-5 flex items-center gap-2">
                    <i class="fas fa-user-circle text-[#0f1d3a] text-lg"></i> Datos del Consumidor
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">Nombre Completo</p>
                        <p class="text-base font-semibold text-slate-800">{{ $reclamo->primer_nombre }} {{ $reclamo->segundo_nombre }} {{ $reclamo->primer_apellido }} {{ $reclamo->segundo_apellido }}</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">{{ $reclamo->tipo_documento }}</p>
                            <p class="text-sm font-medium text-slate-800">{{ $reclamo->numero_documento }}</p>
                        </div>
                        <div>
                            <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">Teléfono</p>
                            <p class="text-sm font-medium text-slate-800">{{ $reclamo->telefono }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">Correo Electrónico</p>
                        <p class="text-sm font-medium text-slate-800">{{ $reclamo->correo }}</p>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                        <p class="text-[11px] text-slate-500 font-bold uppercase mb-1"><i class="fas fa-map-marker-alt text-rose-500 mr-1"></i> Dirección</p>
                        <p class="text-sm text-slate-700">{{ $reclamo->direccion }}</p>
                        <p class="text-[11px] text-slate-500 mt-1">{{ $reclamo->distrito }}, {{ $reclamo->provincia }} - {{ $reclamo->departamento }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#d4af37] to-[#e6bf24]"></div>
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-5 flex items-center gap-2">
                    <i class="fas fa-box-open text-[#d4af37] text-lg"></i> Bien / Servicio Contratado
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">Servicio Contratado</p>
                        <p class="text-base font-semibold text-slate-800">{{ $reclamo->servicio_contratado }}</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">N° de Orden</p>
                            <p class="text-sm font-medium text-slate-800">{{ $reclamo->numero_orden ?: 'No especificado' }}</p>
                        </div>
                        <div>
                            <p class="text-[11px] text-slate-500 font-bold uppercase mb-0.5">Monto Reclamado</p>
                            @if($reclamo->monto_reclamado)
                                <p class="text-sm font-bold text-emerald-600">S/ {{ number_format($reclamo->monto_reclamado, 2) }}</p>
                            @else
                                <p class="text-sm font-medium text-slate-500">No aplica</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                        <p class="text-[11px] text-slate-500 font-bold uppercase mb-1">Identificación del Servicio</p>
                        <p class="text-sm text-slate-700">{{ $reclamo->identificacion_servicio ?: 'Sin identificación específica proporcionada.' }}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200 shadow-sm space-y-6 flex flex-col h-full">
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-[#0f1d3a] uppercase tracking-wider mb-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-align-left text-[#d4af37] mr-2"></i> Motivo de la Solicitud
                    </h3>
                    <p class="text-slate-700 leading-relaxed text-[14px] whitespace-pre-wrap">{{ $reclamo->motivo }}</p>
                </div>

                <div class="flex-1">
                    <h3 class="text-sm font-bold text-[#0f1d3a] uppercase tracking-wider mb-2 border-b border-slate-100 pb-2">
                        <i class="fas fa-search-plus text-[#d4af37] mr-2"></i> Detalle Exacto
                    </h3>
                    <p class="text-slate-700 leading-relaxed text-[14px] whitespace-pre-wrap">{{ $reclamo->detalle_solicitud }}</p>
                </div>
            </div>

            <div class="bg-blue-50/50 rounded-2xl p-5 sm:p-6 border border-blue-100 flex flex-col h-full">
                <h3 class="text-sm font-bold text-blue-800 uppercase tracking-wider mb-3">
                    <i class="fas fa-bullseye text-blue-500 mr-2"></i> Pedido Concreto del Consumidor
                </h3>
                <div class="bg-white rounded-xl p-4 border border-blue-100 flex-1 shadow-sm">
                    <p class="text-slate-800 leading-relaxed font-medium text-[14px] whitespace-pre-wrap">{{ $reclamo->pedido_concreto }}</p>
                </div>

                <div class="mt-6 flex flex-wrap justify-end gap-3">
                    <button type="button" onclick="imprimirDocumento('{{ route('reclamos.imprimir', $reclamo->id) }}')" class="bg-white hover:bg-slate-50 text-slate-700 px-6 py-2.5 rounded-xl border border-slate-300 font-bold text-sm transition-all shadow-sm flex items-center gap-2 group">
                        <i class="fas fa-print transition-transform group-hover:scale-110"></i> 
                        <span class="hidden sm:inline">Imprimir Documento</span>
                        <span class="sm:hidden">Imprimir</span>
                    </button>

                    <a href="{{ route('reclamos.pdf', $reclamo->id) }}" class="bg-[#0f1d3a] hover:bg-[#1a2f4f] text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all shadow-md hover:shadow-lg hover:shadow-[#0f1d3a]/20 hover:-translate-y-0.5 flex items-center gap-2 group">
                        <i class="fas fa-file-pdf text-rose-400 transition-transform group-hover:scale-110"></i> 
                        Descargar PDF Oficial
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    @media print {
        body * { visibility: hidden; }
        .max-w-\[1400px\], .max-w-\[1400px\] * { visibility: visible; }
        .max-w-\[1400px\] { position: absolute; left: 0; top: 0; width: 100%; padding: 0 !important; }
        button, a { display: none !important; }
        .bg-white { box-shadow: none !important; border: 1px solid #e2e8f0 !important; }
    }
</style>

@vite(['resources/js/reclamos.js'])

@endsection