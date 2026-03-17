<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JEZNET - Soluciones Industriales</title>
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('iconos/logotipo.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex h-screen overflow-hidden font-sans text-sm">

    <div id="mobileOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-[240px] bg-jez-navy flex flex-col transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0 shadow-2xl">
        
        {{-- Logo --}}
        <div class="flex items-center gap-3 p-4 border-b border-[#1E3050] shrink-0">
            <img src="{{ asset('iconos/logotipo.svg') }}" alt="Logo" class="w-10 h-10">
            <div class="leading-none">
                <span class="text-xl font-black text-white tracking-wide">JEZ</span><span class="text-xl font-black text-jez-gold tracking-wide">NET</span>
                <p class="text-xxs text-jez-text-dim tracking-widest uppercase mt-1">Soluciones sostenibles</p>
            </div>
        </div>

        {{-- Navegación --}}
        <nav class="flex-1 overflow-y-auto sidebar-scroll p-3 space-y-1">
            
            {{-- DASHBOARD --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-jez-navy bg-jez-gold font-bold transition-colors">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                <span class="text-xs uppercase tracking-wide">DASHBOARD</span>
            </a>

            {{-- GESTIÓN DE PROYECTOS (Con submenú) --}}
            <div>
                <button onclick="toggleSubmenu('submenu-proyectos', this)" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors group">
                    <div class="flex items-center gap-3 text-left">
                        <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="8" y1="13" x2="16" y2="13"/><line x1="8" y1="17" x2="16" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        <span class="text-xs uppercase font-bold tracking-wide leading-tight">GESTIÓN DE<br>PROYECTOS</span>
                    </div>
                    <svg class="w-4 h-4 text-jez-text-dim transition-transform duration-200 transform arrow-icon" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                
                {{-- Contenido del submenú --}}
                <div id="submenu-proyectos" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-black/20 rounded-b-lg">
                    <ul class="py-1">
                        <li><a href="#" class="block px-11 py-2 text-xs text-jez-text-dim hover:text-white hover:bg-jez-gold/10 border-l-2 border-transparent hover:border-jez-gold transition-colors">Todos los proyectos</a></li>
                        <li><a href="#" class="block px-11 py-2 text-xs text-jez-text-dim hover:text-white hover:bg-jez-gold/10 border-l-2 border-transparent hover:border-jez-gold transition-colors">En ejecución</a></li>
                        <li><a href="#" class="block px-11 py-2 text-xs text-jez-gold bg-jez-gold/10 border-l-2 border-jez-gold transition-colors">Finalizados</a></li>
                    </ul>
                </div>
            </div>

            {{-- ADMINISTRACIÓN --}}
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-jez-text hover:bg-jez-navy-hover hover:text-white transition-colors">
                <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
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

                <button onclick="history.back()" class="text-white p-2 hover:bg-white/10 rounded-lg transition-colors hidden sm:block">
                    <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>

                <div class="hidden md:flex items-center bg-white rounded-md p-0.5 gap-0.5 shadow-sm">
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
                    <img src="{{ asset('iconos/sunat-logo.png') }}" alt="SUNAT" class="h-5">
                    <div class="flex flex-col leading-none">
                        <span class="text-[9px] font-bold text-gray-800">MODO: DEMO</span>
                        <span class="text-[9px] font-bold text-gray-500">CONECTADO A SUNAT</span>
                    </div>
                </div>

                <div class="flex flex-col leading-none bg-[#d1dfef] px-3 py-1.5 rounded-md">
                    <span class="text-[10px] font-bold text-jez-navy">ADMINISTRADOR:</span>
                    <span class="text-[10px] text-gray-800">admin@gmail.com</span>
                </div>

                <div class="relative">
                    <button onclick="toggleProfileMenu()" class="p-1 border border-white/30 rounded-full hover:bg-white/10 transition-colors text-white">
                        <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </button>
                    
                    <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50 transform origin-top-right transition-all">
                        {{-- Formulario de Logout de Laravel --}}
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100 font-semibold">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 overflow-auto bg-[#f4f6f9]">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSubmenu(id, btnElement) {
            const submenu = document.getElementById(id);
            const arrow = btnElement.querySelector('.arrow-icon');
            
            if (submenu.classList.contains('max-h-0')) {
                submenu.classList.remove('max-h-0');
                submenu.classList.add('max-h-[400px]');
                arrow.classList.add('rotate-180');
            } else {
                submenu.classList.add('max-h-0');
                submenu.classList.remove('max-h-[400px]');
                arrow.classList.remove('rotate-180');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileOverlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function toggleProfileMenu() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            if (!document.querySelector('.relative').contains(e.target)) {
                document.getElementById('profileDropdown').classList.add('hidden');
            }
        });
    </script>
</body>
</html>