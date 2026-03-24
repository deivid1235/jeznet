@extends('layouts.dashboard')

@section('content')
<style>
    .icon-pulse-ring {
        position: absolute;
        inset: -4px;
        border-radius: 1rem;
        border: 2px solid rgba(212, 175, 55, 0.4); /* Dorado Jeznet */
        animation: ping 2.5s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
    .icon-border-ring {
        position: absolute;
        inset: -2px;
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .stat-card-glow {
        position: absolute;
        top: -50px;
        right: -50px;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
        opacity: 0;
        transition: opacity 0.5s;
        pointer-events: none;
    }
    .group:hover .stat-card-glow {
        opacity: 0.1;
    }
    .timeline-marker-pulse {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: #0f1d3a;
        animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        opacity: 0.3;
    }
    @keyframes ping {
        75%, 100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="py-1 px-4 sm:px-6 lg:px-1 bg-slate-50 min-h-screen font-sans">
    <div class="max-w-[1400px] mx-auto space-y-6">
        
        <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 md:p-8 text-white flex flex-col lg:flex-row justify-between items-start lg:items-center mb-8 shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37]">
            
            <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

            <div class="flex flex-row items-center gap-4 sm:gap-5 z-10 w-full mb-6 lg:mb-0">
                <div class="relative p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0 transition-transform duration-300 hover:scale-105">
                    <div class="icon-pulse-ring" style="border-radius: inherit;"></div>
                    <div class="icon-border-ring" style="border-radius: inherit;"></div>
                    <i class="fas fa-chart-line text-2xl sm:text-3xl relative z-10"></i>
                </div>
                
                <div class="flex-1">
                    <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center mb-1">
                        <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                        <i class="fas fa-star text-[10px] mr-2 sm:hidden"></i> Panel Principal
                    </span>
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight drop-shadow-sm">
                        Resumen de Operaciones
                    </h1>
                    <p class="text-blue-100/80 text-xs sm:text-sm mt-2 flex items-center gap-2">
                        <i class="far fa-calendar-alt opacity-80"></i>
                        {{ now()->format('d/m/Y') }} <span class="opacity-50 mx-1">|</span> Bienvenido al centro de control de Jeznet
                    </p>
                </div>
            </div>

            <div class="z-10 w-full lg:w-auto shrink-0 flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
                
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-[10px] text-blue-200 uppercase font-bold tracking-widest mb-0.5">Estado del Sistema</span>
                    <span class="font-bold text-sm flex items-center justify-end gap-2 text-emerald-400">
                        <i class="fas fa-check-circle"></i> EN LÍNEA
                    </span>
                </div>

                <a href="{{ route('proyectos.create') }}" class="w-full sm:w-auto bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 sm:py-3.5 rounded-xl font-bold text-sm sm:text-base flex justify-center items-center gap-2 transition-all duration-300 shadow-lg hover:-translate-y-1 hover:shadow-xl">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    Nuevo Proyecto
                </a>
            </div>
        </div>

        @if ($totalReclamos > 0)
            <div class="bg-gradient-to-r from-rose-50 to-white border-l-[5px] border-rose-500 rounded-r-xl p-5 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm relative overflow-hidden">
                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-12 h-12 bg-rose-100 text-rose-500 rounded-full flex items-center justify-center text-xl shrink-0 relative">
                        <div class="absolute inset-0 bg-rose-400 rounded-full animate-ping opacity-20"></div>
                        <i class="fas fa-exclamation-triangle relative z-10"></i>
                    </div>
                    <div>
                        <h3 class="text-rose-800 font-bold text-[15px] flex items-center gap-2">
                            Reclamos Pendientes de Revisión
                            <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $totalReclamos }}</span>
                        </h3>
                        <p class="text-rose-600/80 text-sm mt-0.5">Se han registrado nuevas solicitudes en el libro de reclamaciones.</p>
                    </div>
                </div>
                <a href="#" class="relative z-10 shrink-0 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg text-sm transition-colors shadow-sm flex items-center gap-2 group">
                    Atender ahora <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            
            <div class="group bg-white rounded-2xl p-5 border border-slate-200 shadow-sm border-b-[4px] border-b-[#d4af37] hover:-translate-y-1 hover:shadow-lg transition-all relative overflow-hidden">
                <div class="stat-card-glow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#d4af37]/20 to-transparent rounded-bl-full z-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                
                <div class="flex justify-between items-start mb-3 relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-[#d4af37] flex items-center justify-center text-xl group-hover:bg-[#d4af37] group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <span class="relative overflow-hidden bg-gradient-to-r from-amber-50 to-amber-100/50 text-[#b59227] text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-lg border border-[#d4af37]/40 shadow-[0_2px_10px_rgba(212,175,55,0.1)] flex items-center gap-1.5 transition-all duration-300">
                        <i class="fas fa-chart-line"></i> Total
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 relative z-10">Ingresos Proyectados</p>
                <h3 class="text-2xl font-extrabold text-slate-800 relative z-10 mb-4">S/. {{ number_format($ingresosTotales, 2) }}</h3>
                
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100 relative z-10">
                    <span class="text-[10px] font-bold text-[#d4af37] uppercase flex items-center gap-1 whitespace-nowrap"><i class="fas fa-coins"></i> Valor</span>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#e6bf24] to-[#d4af37] w-[80%] rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-5 border border-slate-200 shadow-sm border-b-[4px] border-b-[#0f1d3a] hover:-translate-y-1 hover:shadow-lg transition-all relative overflow-hidden">
                <div class="stat-card-glow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#0f1d3a]/10 to-transparent rounded-bl-full z-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                <div class="flex justify-between items-start mb-3 relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-slate-100 text-[#0f1d3a] flex items-center justify-center text-xl group-hover:bg-[#0f1d3a] group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="relative overflow-hidden bg-gradient-to-r from-slate-100 to-slate-200/50 text-[#0f1d3a] text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-lg border border-slate-300/60 shadow-sm flex items-center gap-1.5 transition-all duration-300">
                        <i class="fas fa-user-check"></i> Activos
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 relative z-10">Clientes Registrados</p>
                <h3 class="text-2xl font-extrabold text-slate-800 relative z-10 mb-4">{{ $totalClientes }}</h3>
                
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100 relative z-10">
                    <span class="text-[10px] font-bold text-[#0f1d3a] uppercase flex items-center gap-1 whitespace-nowrap"><i class="fas fa-globe"></i> Red</span>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#173866] to-[#0f1d3a] w-[100%] rounded-full"></div>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-5 border border-slate-200 shadow-sm border-b-[4px] border-b-[#2ecc71] hover:-translate-y-1 hover:shadow-lg transition-all relative overflow-hidden">
                <div class="stat-card-glow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#2ecc71]/20 to-transparent rounded-bl-full z-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                <div class="flex justify-between items-start mb-3 relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-xl group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <span class="relative overflow-hidden bg-gradient-to-r from-emerald-50 to-emerald-100/50 text-emerald-700 text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-lg border border-emerald-200/60 shadow-sm flex items-center gap-1.5 transition-all duration-300">
                        <i class="fas fa-spinner animate-[spin_3s_linear_infinite]"></i> En proceso
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 relative z-10">Proyectos Actuales</p>
                <h3 class="text-2xl font-extrabold text-slate-800 relative z-10 mb-4">{{ $totalProyectos }}</h3>
                
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100 relative z-10">
                    <span class="text-[10px] font-bold text-[#2ecc71] uppercase flex items-center gap-1 whitespace-nowrap"><i class="fas fa-tasks"></i> {{ round($avancePromedioGeneral, 1) }}% Avance</span>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#2ecc71] to-[#27ae60] rounded-full" style="width: {{ $avancePromedioGeneral }}%"></div>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-5 border border-slate-200 shadow-sm border-b-[4px] border-b-[#e74c3c] hover:-translate-y-1 hover:shadow-lg transition-all relative overflow-hidden">
                <div class="stat-card-glow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-[#e74c3c]/20 to-transparent rounded-bl-full z-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                <div class="flex justify-between items-start mb-3 relative z-10">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-red-500 flex items-center justify-center text-xl group-hover:bg-red-500 group-hover:text-white transition-colors duration-300">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="relative overflow-hidden bg-gradient-to-r from-red-50 to-red-100/50 text-red-700 text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-lg border border-red-200/60 shadow-sm flex items-center gap-1.5 transition-all duration-300">
                        <i class="fas fa-exclamation-circle text-red-500"></i> Atención
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wider mb-1 relative z-10">Libro Reclamaciones</p>
                <h3 class="text-2xl font-extrabold text-slate-800 relative z-10 mb-4">{{ $totalReclamos }}</h3>
                
                <div class="flex items-center gap-3 pt-3 border-t border-slate-100 relative z-10">
                    <span class="text-[10px] font-bold text-[#e74c3c] uppercase flex items-center gap-1 whitespace-nowrap"><i class="fas fa-inbox"></i> Recibidos</span>
                    <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-[#e74c3c] to-[#c0392b] w-[20%] rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#0f1d3a] to-[#173866]"></div>
                <div class="flex items-center gap-3 mb-6 border-b border-slate-100 pb-4">
                    <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-[#0f1d3a]">
                        <i class="fas fa-chart-pie text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-[15px] font-bold text-slate-800 leading-tight">Estado de Proyectos</h3>
                        <p class="text-xs text-slate-500 font-medium">Distribución actual</p>
                    </div>
                </div>
                <div class="relative h-[250px] flex justify-center">
                    <canvas id="proyectosChart"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#d4af37] to-[#e6bf24]"></div>
                <div class="flex items-center gap-3 mb-6 border-b border-slate-100 pb-4">
                    <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center text-[#d4af37]">
                        <i class="fas fa-chart-bar text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-[15px] font-bold text-slate-800 leading-tight">Tipos de Solicitudes</h3>
                        <p class="text-xs text-slate-500 font-medium">Libro de reclamaciones</p>
                    </div>
                </div>
                <div class="relative h-[250px] w-full">
                    <canvas id="reclamosChart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#2ecc71] to-[#27ae60]"></div>
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-hard-hat text-[#27ae60]"></i>
                        <h3 class="font-bold text-slate-800 text-[15px]">Últimos Proyectos</h3>
                    </div>
                    <a href="{{ route('proyectos.index') }}" class="group relative inline-flex items-center gap-3 px-2 py-1.5 bg-white border border-slate-200 rounded-full shadow-sm hover:border-[#2ecc71]/40 hover:shadow-[0_6px_20px_rgba(46,204,113,0.15)] transition-all duration-300">
                        <span class="text-[10px] font-bold text-slate-600 uppercase tracking-widest pl-2 group-hover:text-[#27ae60] transition-colors">Ver Tabla</span>
                        <div class="w-6 h-6 rounded-full bg-emerald-50 flex items-center justify-center group-hover:bg-gradient-to-r group-hover:from-[#2ecc71] group-hover:to-[#27ae60] text-[#27ae60] group-hover:text-white transition-all duration-300 shadow-sm">
                            <i class="fas fa-chevron-right text-[9px] group-hover:translate-x-0.5 transition-transform"></i>
                        </div>
                    </a>
                </div>
                
                <div class="p-5 flex-1 space-y-3">
                    @forelse ($ultimosProyectos as $proyecto)
                        <div class="flex items-center gap-4 p-3 rounded-xl border border-slate-100 hover:border-[#2ecc71]/30 hover:bg-emerald-50/30 transition-all group">
                            <div class="bg-slate-50 text-[#0f1d3a] border border-slate-200 rounded-lg p-2 min-w-[50px] flex flex-col items-center justify-center shrink-0">
                                <i class="fas fa-building text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-slate-800 text-sm leading-tight group-hover:text-[#27ae60] transition-colors">{{ $proyecto->nombre }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="bg-[#0f1d3a]/10 text-[#0f1d3a] px-1.5 py-0.5 rounded text-[10px] font-bold">{{ $proyecto->area ? $proyecto->area->nombre : 'Sin área' }}</span>
                                    <span class="text-[11px] text-slate-500 font-medium">S/ {{ number_format($proyecto->costo, 2) }}</span>
                                </div>
                            </div>
                            <div class="shrink-0 text-right w-24">
                                <div class="flex justify-between text-[10px] font-bold mb-1">
                                    <span class="text-slate-500">Avance</span>
                                    <span class="text-[#2ecc71]">{{ $proyecto->avance }}%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-1.5">
                                    <div class="bg-gradient-to-r from-[#2ecc71] to-[#27ae60] h-1.5 rounded-full" style="width: {{ $proyecto->avance }}%"></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center h-full py-8">
                            <i class="fas fa-folder-open text-4xl text-slate-300 mb-3 opacity-50"></i>
                            <p class="text-sm text-slate-500 font-medium">No hay proyectos registrados.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#0f1d3a] to-[#173866]"></div>
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-user-plus text-[#0f1d3a]"></i>
                        <h3 class="font-bold text-slate-800 text-[15px]">Clientes Recientes</h3>
                    </div>
                </div>
                
                <div class="p-6 flex-1">
                    @if (count($ultimosClientes) > 0)
                        <div class="relative pl-6">
                            <div class="absolute top-0 bottom-0 left-[7px] w-[2px] bg-slate-200"></div>
                            
                            @foreach ($ultimosClientes as $cliente)
                                <div class="relative mb-5 last:mb-0 group hover:translate-x-1 transition-transform">
                                    <div class="absolute -left-[29px] top-1.5 w-4 h-4 bg-white border-2 border-[#0f1d3a] rounded-full z-10 group-hover:bg-[#0f1d3a] transition-colors"></div>
                                    <div class="timeline-marker-pulse absolute -left-[29px] top-1.5 hidden group-hover:block"></div>
                                    
                                    <div class="bg-white p-3 rounded-xl border border-slate-100 group-hover:border-[#0f1d3a]/30 group-hover:shadow-sm transition-all flex justify-between items-center">
                                        <div>
                                            <div class="flex items-center mb-1">
                                                <span class="text-[10px] font-bold text-[#0f1d3a] uppercase bg-slate-100 px-2 py-0.5 rounded flex items-center gap-1">
                                                    <i class="fas fa-check"></i> Nuevo Registro
                                                </span>
                                            </div>
                                            <p class="text-sm font-semibold text-slate-800">{{ $cliente->nombre }} {{ $cliente->apellidos }}</p>
                                            <p class="text-[11px] text-slate-500 mt-0.5"><i class="fas fa-envelope mr-1"></i> {{ $cliente->correo }}</p>
                                        </div>
                                        <div class="w-8 h-8 rounded-full bg-[#d4af37]/20 text-[#d4af37] flex items-center justify-center font-bold text-xs border border-[#d4af37]/30">
                                            {{ substr($cliente->nombre, 0, 1) }}{{ substr($cliente->apellidos, 0, 1) }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center h-full py-8">
                            <i class="fas fa-users-slash text-4xl text-slate-300 mb-3 opacity-50"></i>
                            <p class="text-sm text-slate-500 font-medium">No hay clientes recientes.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // Paleta de colores Premium Jeznet
        const colorPrimary = '#0f1d3a';
        const colorGold = '#d4af37';
        const colorGreen = '#2ecc71';
        const colorGray = '#64748b';

        // 1. Gráfico Doughnut (Proyectos)
        const ctxProyectos = document.getElementById('proyectosChart').getContext('2d');
        const proyectosData = @json($proyectosPorEstado);
        
        new Chart(ctxProyectos, {
            type: 'doughnut',
            data: {
                labels: Object.keys(proyectosData),
                datasets: [{
                    data: Object.values(proyectosData),
                    backgroundColor: [colorPrimary, colorGold, colorGreen, colorGray],
                    borderWidth: 0,
                    hoverOffset: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { 
                        position: 'right', 
                        labels: { usePointStyle: true, padding: 20, font: { size: 12, family: "'Inter', sans-serif" } } 
                    }
                },
                cutout: '75%' 
            }
        });

        // 2. Gráfico de Barras (Reclamos)
        const ctxReclamos = document.getElementById('reclamosChart').getContext('2d');
        const reclamosData = @json($reclamosPorTipo);

        new Chart(ctxReclamos, {
            type: 'bar',
            data: {
                labels: Object.keys(reclamosData),
                datasets: [{
                    label: 'Cantidad',
                    data: Object.values(reclamosData),
                    backgroundColor: [colorGold, colorPrimary],
                    borderRadius: 8,
                    barThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#f1f5f9', drawBorder: false },
                        ticks: { stepSize: 1 }
                    },
                    x: { grid: { display: false } }
                }
            }
        });
    });
</script>
@endsection