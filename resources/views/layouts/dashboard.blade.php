<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET - Soluciones Industriales</title>
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('iconos/logotipo.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden font-sans text-sm">
    <div id="mobileOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-[240px] bg-jez-navy flex flex-col transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 shadow-2xl">
        
        <div class="flex items-center gap-3 p-3 border-b border-[#1E3050] shrink-0">
            <img src="{{ asset('images/logo/logo_jeznet.svg') }}" alt="Logo" class="w-60 h-10">
        </div>

        <nav class="flex-1 flex flex-col justify-evenly overflow-y-auto sidebar-scroll p-2">
            
            {{-- DASHBOARD --}}
            <a href="{{ route('admin.dashboard') }}" 
            class="group relative flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-300 outline-none
                    {{-- Estado por defecto y Hover --}}
                    text-gray-300 hover:bg-[#1a2f4f] hover:text-[#d4af37] hover:shadow-[0_0_15px_rgba(212,175,55,0.15)]
                    {{-- Estado al hacer Clic (Iluminación) --}}
                    active:scale-95 active:bg-[#d4af37] active:text-[#081423] active:shadow-[0_0_30px_rgba(212,175,55,0.6)]
                    {{-- Estado Activo (Si estamos en la ruta admin.dashboard) --}}
                    {{ request()->routeIs('admin.dashboard') ? 'bg-[#1a2f4f] text-[#d4af37] shadow-[0_0_10px_rgba(212,175,55,0.2)] border border-[#d4af37]/30' : '' }}">
                
                <svg class="w-5 h-5 fill-current shrink-0 transition-transform duration-300 group-hover:scale-110 group-active:scale-100" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                
                <span class="text-xs uppercase font-bold tracking-wide">DASHBOARD</span>
            </a>

            <div>
                {{-- GESTIÓN DE PROYECTOS --}}
                <button onclick="toggleSubmenu('submenu-gestion-proyectos', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="16" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">GESTIÓN DE<br>PROYECTOS</span>
                    </div>
                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                
                <div id="submenu-gestion-proyectos" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">
                        <li>
                            <a href="{{ route('proyectos.index') }}" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 fill-current shrink-0" viewBox="0 0 24 24">
                                    <path d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 0h6v6h-6z"/>
                                </svg>
                                <span class="text-xs font-bold uppercase leading-tight tracking-wide">Todos<br>los proyectos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 3"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">En ejecución</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M8 12l3 3 5-6"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Finalizados</span>
                            </a>
                        </li>
                        <div class="mx-5 my-1 border-b border-white/40"></div>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Cronogramas</span>
                            </a>
                        </li>
                        <div class="mx-5 my-1 border-b border-white/40"></div>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="8" y1="13" x2="16" y2="13"/>
                                    <line x1="8" y1="17" x2="16" y2="17"/>
                                </svg>
                                <span class="text-xs font-bold uppercase leading-tight tracking-wide">Documentación<br>técnica</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                                    <line x1="12" y1="22.08" x2="12" y2="12"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Entregables</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v10"/>
                                    <path d="M14.5 10.5a2.5 2.5 0 0 0-5 0c0 1.5 5 1.5 5 3a2.5 2.5 0 0 1-5 0"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Valorizaciones</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ÁREAS TÉCNICAS --}}
            <a href="{{ route('areas.index') }}" 
            class="group relative flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-300 outline-none
                    {{-- Estado por defecto y Hover --}}
                    text-gray-300 hover:bg-[#1a2f4f] hover:text-[#d4af37] hover:shadow-[0_0_15px_rgba(212,175,55,0.15)]
                    {{-- Estado al hacer Clic (Iluminación) --}}
                    active:scale-95 active:bg-[#d4af37] active:text-[#081423] active:shadow-[0_0_30px_rgba(212,175,55,0.6)]
                    {{-- Estado Activo (Si estamos en esa ruta) --}}
                    {{ request()->routeIs('areas.*') ? 'bg-[#1a2f4f] text-[#d4af37] shadow-[0_0_10px_rgba(212,175,55,0.2)] border border-[#d4af37]/30' : '' }}">
                
                <svg class="w-5 h-5 stroke-current fill-none shrink-0 transition-transform duration-300 group-hover:scale-110 group-active:scale-100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
                
                <span class="text-xs uppercase font-bold tracking-wide">ÁREAS TÉCNICAS</span>
            </a>

            {{-- COMERCIAL & CONTROL (Con submenú) --}}
            <div>
                <button onclick="toggleSubmenu('submenu-reportes-control', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="4" y1="20" x2="20" y2="20"/>
                            <rect x="6" y="10" width="3" height="6"/>
                            <rect x="11" y="6" width="3" height="10"/>
                            <rect x="16" y="3" width="3" height="13"/>
                        </svg>

                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">
                            REPORTES & <br>CONTROL
                        </span>
                    </div>

                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                
                <div id="submenu-reportes-control" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M4 20h16"/>
                                    <path d="M6 16l4-4 3 3 5-6"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">KPIS</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M12 20a8 8 0 1 1 8-8"/>
                                    <path d="M12 12l4-2"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Indicadores</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- comercial fiananzas --}}
            <div>
                <button onclick="toggleSubmenu('submenu-comercial-finanzas', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="4" y1="20" x2="20" y2="20"/>
                            <rect x="6" y="10" width="3" height="6"/>
                            <rect x="11" y="6" width="3" height="10"/>
                            <rect x="16" y="3" width="3" height="13"/>
                        </svg>

                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">
                            COMERCIAL &<br>FINANZAS
                        </span>
                    </div>

                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                
                <div id="submenu-comercial-finanzas" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <rect x="3" y="6" width="18" height="12" rx="2"/>
                                    <circle cx="12" cy="12" r="2"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Presupuestos</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Facturas</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M4 12h16"/>
                                    <path d="M12 4v16"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Cobros</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- CLIENTES (Con submenú) --}}
            <div>
                <button onclick="toggleSubmenu('submenu-clinetes', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M17 11a4 4 0 1 0-4-4"/>
                            <path d="M3 21v-2a6 6 0 0 1 12 0v2"/>
                            <path d="M16 21v-2a4 4 0 0 0-3-3.87"/>
                        </svg>

                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">
                            CLIENTES
                        </span>
                    </div>

                    
                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                
                <div id="submenu-clinetes" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">

                        
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <rect x="4" y="3" width="16" height="18" rx="2"/>
                                    <line x1="8" y1="7" x2="16" y2="7"/>
                                    <line x1="8" y1="11" x2="16" y2="11"/>
                                    <line x1="8" y1="15" x2="13" y2="15"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Directorio</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 3"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Historial</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- OPERACIONES --}}
            <div>
                <button onclick="toggleSubmenu('submenu-operaciones', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="5" cy="12" r="2"/>
                            <circle cx="12" cy="5" r="2"/>
                            <circle cx="19" cy="12" r="2"/>
                            <circle cx="12" cy="19" r="2"/>
                            <path d="M7 12h10M12 7v10"/>
                        </svg>

                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">
                            OPERACIONES
                        </span>
                    </div>

                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                
                <div id="submenu-operaciones" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="18" height="13" rx="2"/>
                                    <path d="M16 3v4M8 3v4"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Inventario</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M14.7 6.3a4 4 0 0 0-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 0 0 5.4-5.4z"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Mantenimiento</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- Icidencias y Reporrtes--}}
            <div>
                <button onclick="toggleSubmenu('submenu-icidentes-reportes', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        
                        <!-- Incidencias & Reportes (alerta) -->
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M12 9v4"/>
                            <path d="M12 17h.01"/>
                            <path d="M10 2l-8 14a2 2 0 0 0 1.7 3h16.6a2 2 0 0 0 1.7-3L14 2a2 2 0 0 0-3.5 0z"/>
                        </svg>

                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">
                            INCIDENCIAS &<br>REPORTES
                        </span>
                    </div>

                    <!-- Flecha -->
                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                
                <div id="submenu-icidentes-reportes" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-jez-gold rounded-b-lg shadow-inner">
                    <ul class="flex flex-col py-2">

                        <!-- Tickets -->
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M3 7h18v4a2 2 0 0 0 0 4v4H3v-4a2 2 0 0 0 0-4V7z"/>
                                    <path d="M12 7v10"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Tickets</span>
                            </a>
                        </li>

                        <!-- Soporte -->
                        <li>
                            <a href="#" class="flex items-center gap-3 px-5 py-2.5 text-white hover:bg-black/10 transition-colors">
                                <svg class="w-6 h-6 stroke-current fill-none shrink-0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M18 8a6 6 0 0 0-12 0v4a2 2 0 0 0 2 2h1"/>
                                    <path d="M15 16h2a2 2 0 0 0 2-2v-4"/>
                                    <path d="M9 16h6"/>
                                </svg>
                                <span class="text-xs font-bold uppercase tracking-wide">Soporte</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- ADMINISTRACIÓN --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors">
                <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
                <span class="text-xs uppercase font-bold tracking-wide">ADMINISTRACIÓN</span>
            </a>
        </nav>

        {{-- Footer Sidebar --}}
        <div class="p-3 border-t border-[#1E3050] shrink-0 space-y-2">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-[#1E3050] text-jez-text-dim hover:text-white hover:bg-jez-navy-hover hover:border-jez-text-dim transition-colors">
                <svg class="w-4 h-4 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                <span class="text-xs font-bold tracking-wide uppercase">Configuración</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        
        <header class="bg-jez-topbar h-16 px-4 flex items-center justify-between shadow-md shrink-0">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="lg:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <button onclick="toggleQuickAccess()" class="text-white p-2 hover:bg-white/10 rounded-lg transition-colors hidden sm:block">
                    <svg id="quickAccessIcon" class="w-6 h-6 stroke-current fill-none transition-transform duration-300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <div id="quickAccessGroup" class="md:flex items-center bg-white rounded-md p-0.5 gap-0.5 shadow-sm transition-all duration-300 origin-left transform -translate-x-4 opacity-0 pointer-events-none absolute md:relative left-14 md:left-0">
                    <button class="flex flex-col items-center px-2 py-1 hover:bg-gray-100 rounded transition-colors">
                        <img src="{{ asset('iconos/nc.svg') }}" class="w-4 h-4" alt="NC">
                        <span class="text-[9px] font-bold text-gray-800 mt-0.5">NC</span>
                    </button>
                    <div class="w-px h-6 bg-gray-200"></div>
                    <button class="flex flex-col items-center px-2 py-1 hover:bg-gray-100 rounded transition-colors">
                        <img src="{{ asset('iconos/pos.svg') }}" class="w-4 h-4" alt="POS">
                        <span class="text-[9px] font-bold text-gray-800 mt-0.5">POS</span>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="hidden md:flex items-center gap-2 bg-white px-3 py-1.5 rounded-md shadow-sm">
                    <img src="{{ asset('iconos/sunat-logo.svg') }}" alt="SUNAT" class="h-5">
                    <div class="flex flex-col leading-none">
                        <span class="text-[9px] font-bold text-gray-800">MODO: DEMO</span>
                        <span class="text-[9px] font-bold text-gray-500">CONECTADO A SUNAT</span>
                    </div>
                </div>

                <div class="flex flex-col leading-none bg-[#d1dfef] px-3 py-1.5 rounded-md max-w-[150px] truncate">
                    <span class="text-[10px] font-bold text-jez-navy uppercase truncate" title="{{ auth()->user()->name ?? 'Usuario' }}">
                        {{ auth()->user()->name ?? 'Usuario' }}
                    </span>
                    <span class="text-[10px] text-gray-800 truncate" title="{{ auth()->user()->email ?? 'correo@invitado.com' }}">
                        {{ auth()->user()->email ?? 'correo@invitado.com' }}
                    </span>
                </div>

                <div id="profileContainer" class="relative">
                    <button onclick="toggleProfileMenu()" class="flex items-center justify-center w-9 h-9 rounded-full bg-jez-navy-hover border border-jez-gold/50 text-jez-gold hover:bg-jez-gold hover:text-jez-navy transition-all duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-white/20">
                        <i class="fa-solid fa-user text-sm"></i>
                    </button>
                    
                    <div id="profileDropdown" class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 transform origin-top-right scale-95 opacity-0 invisible pointer-events-none z-50">
                        <div class="bg-gray-50 px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-bold text-jez-navy truncate" title="{{ auth()->user()->name ?? 'Administrador' }}">
                                {{ auth()->user()->name ?? 'Administrador' }}
                            </p>
                        </div>
                        <div class="border-t border-gray-100"></div>
                        <div class="bg-gray-50 border-t border-gray-200">
                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="group flex items-center justify-between px-4 py-3 text-[11px] font-black uppercase tracking-widest text-gray-600 hover:bg-red-600 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-red-900">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-power-off text-red-500 group-hover:text-white transition-colors text-sm"></i> 
                                    <span>Cerrar Sesión</span>
                                </div>
                                <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <polyline points="13 5 20 12 13 19"></polyline>
                                </svg>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 overflow-auto bg-[#f4f6f9]">
            @yield('content')
        </main>
    </div>
</body>

<script>
    window.toggleSubmenu = function(id, btnElement) {
        const submenu = document.getElementById(id);
        const arrow = btnElement.querySelector('.arrow-icon');
        
        if (submenu.classList.contains('max-h-0')) {
            submenu.classList.remove('max-h-0');
            submenu.classList.add('max-h-[400px]');
            if(arrow) arrow.classList.add('rotate-180');
        } else {
            submenu.classList.add('max-h-0');
            submenu.classList.remove('max-h-[400px]');
            if(arrow) arrow.classList.remove('rotate-180');
        }
    };

    window.toggleSidebar = function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');
        
        if(sidebar) sidebar.classList.toggle('-translate-x-full');
        if(overlay) overlay.classList.toggle('hidden');
    };

    window.toggleProfileMenu = function() {
        const dropdown = document.getElementById('profileDropdown');
        
        if (dropdown.classList.contains('opacity-0')) {
            dropdown.classList.remove('opacity-0', 'invisible', 'scale-95', 'pointer-events-none');
            dropdown.classList.add('opacity-100', 'visible', 'scale-100', 'pointer-events-auto');
        } else {
            dropdown.classList.add('opacity-0', 'invisible', 'scale-95', 'pointer-events-none');
            dropdown.classList.remove('opacity-100', 'visible', 'scale-100', 'pointer-events-auto');
        }
    };

    window.toggleQuickAccess = function() {
        const group = document.getElementById('quickAccessGroup');
        const icon = document.getElementById('quickAccessIcon');
        
        icon.classList.toggle('rotate-180');
        
        if (group.classList.contains('opacity-0')) {
            group.classList.remove('opacity-0', '-translate-x-4', 'pointer-events-none');
            group.classList.add('opacity-100', 'translate-x-0', 'pointer-events-auto');
        } else {
            group.classList.add('opacity-0', '-translate-x-4', 'pointer-events-none');
            group.classList.remove('opacity-100', 'translate-x-0', 'pointer-events-auto');
        }
    };

    window.addEventListener('click', function(e) {
        const profileContainer = document.getElementById('profileContainer');
        const profileDropdown = document.getElementById('profileDropdown');
        
        if (profileContainer && profileDropdown && !profileContainer.contains(e.target)) {
            if (profileDropdown.classList.contains('opacity-100')) {
                profileDropdown.classList.add('opacity-0', 'invisible', 'scale-95', 'pointer-events-none');
                profileDropdown.classList.remove('opacity-100', 'visible', 'scale-100', 'pointer-events-auto');
            }
        }
    });
</script>

</html>