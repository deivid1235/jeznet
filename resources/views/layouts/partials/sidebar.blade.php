@extends('layouts.dashboard')
@section('content')

<div class="mobile-menu-btn" onclick="jeznetSidebar('toggle')">
☰
</div>

<aside id="sidebar" class="jeznet-sidebar">

  
    {{-- Logo --}}
   <div class="sidebar-logo">
        <div class="logo-icon">
            <img src="{{ asset('iconos/logotipo.svg') }}" alt="Logo JEZNET" style="width:40px; height:40px;">
        </div>
        <div class="logo-text">
            <span class="logo-jez">JEZ</span><span class="logo-net">NET</span>
            <p class="logo-slogan">SOLUCIONES INTEGRALES SOSTENIBLES</p>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        <ul>

            {{-- DASHBOARD --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <rect x="3" y="3" width="7" height="7" rx="1"/>
                            <rect x="14" y="3" width="7" height="7" rx="1"/>
                            <rect x="3" y="14" width="7" height="7" rx="1"/>
                            <rect x="14" y="14" width="7" height="7" rx="1"/>
                        </svg>
                    </span>
                    <span class="nav-label">DASHBOARD</span>
                </a>
            </li>

            {{-- GESTIÓN DE PROYECTOS --}}
            <li class="nav-item has-submenu {{ request()->routeIs('proyectos.*') ? 'open active' : '' }}">
                <a href="#" class="nav-link nav-toggle">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="8" y1="13" x2="16" y2="13"/>
                            <line x1="8" y1="17" x2="16" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                    </span>
                    <span class="nav-label">GESTIÓN DE<br>PROYECTOS</span>
                    <span class="nav-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </span>
                </a>
                <ul class="submenu">
                    <li><a href="">Todos los Proyectos</a></li>
                    <li><a href="">Nuevo Proyecto</a></li>
                    <li><a href="">Tareas</a></li>
                    <li><a href="">Cronograma</a></li>
                    <li><a href="">Recursos</a></li>
                </ul>
            </li>

            {{-- ÁREAS TÉCNICAS --}}
            <li class="nav-item has-submenu {{ request()->routeIs('areas.*') ? 'open active' : '' }}">
                <a href="#" class="nav-link nav-toggle">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </span>
                    <span class="nav-label">ÁREAS<br>TÉCNICAS</span>
                    <span class="nav-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </span>
                </a>
                <ul class="submenu">
                    <li><a href="">Todos los Proyectos</a></li>
                    <li><a href="">Nuevo Proyecto</a></li>
                    <li><a href="">Tareas</a></li>
                    <li><a href="">Cronograma</a></li>
                    <li><a href="">Recursos</a></li>
                </ul>
             
            </li>

            {{-- REPORTES & CONTROL --}}
            <li class="nav-item has-submenu {{ request()->routeIs('reportes.*') ? 'open active' : '' }}">
                <a href="#" class="nav-link nav-toggle">
                    <span class="nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"/>
                            <line x1="12" y1="20" x2="12" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="14"/>
                            <polyline points="2 20 22 20"/>
                        </svg>
                    </span>
                    <span class="nav-label">REPORTES &<br>CONTROL</span>
                    <span class="nav-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </span>
                </a>
              
            </li>

            

        </ul>
    </nav>

    {{-- Footer: Configuración --}}
    <div class="sidebar-footer">
        <a href="" class="config-link {{ request()->routeIs('configuracion') ? 'active' : '' }}">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                </svg>
            </span>
            <span>CONFIGURACIÓN</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="{{ route('logout') }}" class="config-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="nav-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l..."/>
                </svg>
            </span>
            <span>SALIR</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</aside>

@endsection