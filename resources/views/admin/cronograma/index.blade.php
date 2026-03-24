@extends('layouts.dashboard')
@section('content')

<div class="p-6 bg-gray-50 min-h-full overflow-x-hidden">

    {{-- BANNER PRINCIPAL --}}
    <div class="bg-gradient-to-br from-[#081423] to-[#1a2f4f] rounded-2xl p-5 sm:p-6 md:p-8 text-white flex flex-col md:flex-row justify-between items-start md:items-center mb-8 shadow-xl relative overflow-hidden border-l-[6px] border-[#d4af37]">
        <div class="absolute top-1/2 left-0 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 bg-[#d4af37] opacity-10 blur-[80px] rounded-full pointer-events-none"></div>

        <div class="flex flex-col md:flex-row items-center md:items-start gap-4 sm:gap-5 z-10 w-full mb-6 md:mb-0 text-center md:text-left">
            <div class="p-3 sm:p-4 bg-white/5 text-[#d4af37] rounded-xl sm:rounded-2xl border border-[#d4af37]/20 shadow-inner shrink-0">
                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="flex-1">
                <span class="text-xs sm:text-sm text-[#d4af37] font-medium tracking-wider uppercase flex items-center justify-center md:justify-start mb-1">
                    <span class="hidden sm:inline-block w-8 h-[2px] bg-[#d4af37] mr-3 shrink-0"></span>
                    Planificación Temporal
                </span>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold mt-1 text-white leading-tight tracking-tight">
                    Cronogramas
                </h1>
                <p class="text-white/50 text-xs sm:text-sm mt-1">Diagrama Gantt — planificación temporal de proyectos</p>
            </div>
        </div>

        <div class="z-10 w-full md:w-auto shrink-0 mt-4 md:mt-0 flex flex-wrap gap-3">
            <a href="{{ route('cronograma.index') }}"
               class="bg-[#d4af37] hover:bg-[#c19b2e] text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Actualizar
            </a>
            <button class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 transition-all shadow-lg hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Vista Semanal
            </button>
        </div>
    </div>

    {{-- CÁLCULOS DINÁMICOS --}}
    @php
        $hoy = \Carbon\Carbon::today();

        // Año activo desde query param (default: año actual)
        $anioGantt = (int) request()->query('anio', $hoy->year);

        // Años disponibles: todos los años únicos entre fecha_inicio y fecha_fin de proyectos
        $aniosDisponibles = $proyectos
            ->filter(fn($p) => $p->fecha_inicio && $p->fecha_fin)
            ->flatMap(fn($p) => [
                \Carbon\Carbon::parse($p->fecha_inicio)->year,
                \Carbon\Carbon::parse($p->fecha_fin)->year,
            ])
            ->unique()
            ->sortDesc()
            ->values();

        // Si no hay años, al menos mostrar el año actual
        if ($aniosDisponibles->isEmpty()) {
            $aniosDisponibles = collect([$hoy->year]);
        }

        // Filtro de búsqueda y estado
        $buscar     = request()->query('buscar', '');
        $filtroEstado = request()->query('estado', 'todos'); // 'todos' | 'en_tiempo' | 'con_desvio'

        // Solo proyectos que tienen fecha_inicio y fecha_fin definidas
        $conCronograma = $proyectos->filter(fn($p) => $p->fecha_inicio && $p->fecha_fin);
        $totalCron     = $conCronograma->count();

        $enTiempo  = $conCronograma->filter(fn($p) =>
            \Carbon\Carbon::parse($p->fecha_fin)->gte($hoy) && $p->estado !== 'Cancelado'
        )->count();

        $conDesvio = $conCronograma->filter(fn($p) =>
            \Carbon\Carbon::parse($p->fecha_fin)->lt($hoy) && $p->estado !== 'Finalizado'
        )->count();

        $pctEnTiempo  = $totalCron > 0 ? round(($enTiempo  / $totalCron) * 100) : 0;
        $pctConDesvio = $totalCron > 0 ? round(($conDesvio / $totalCron) * 100) : 0;

        // Aplicar filtros sobre $conCronograma para el Gantt
        $ganttProyectos = $conCronograma;

        // Filtro por búsqueda
        if ($buscar !== '') {
            $ganttProyectos = $ganttProyectos->filter(fn($p) =>
                str_contains(strtolower($p->nombre), strtolower($buscar))
            );
        }

        // Filtro por estado (En Tiempo / Con Desvío)
        if ($filtroEstado === 'en_tiempo') {
            $ganttProyectos = $ganttProyectos->filter(fn($p) =>
                \Carbon\Carbon::parse($p->fecha_fin)->gte($hoy) && $p->estado !== 'Cancelado'
            );
        } elseif ($filtroEstado === 'con_desvio') {
            $ganttProyectos = $ganttProyectos->filter(fn($p) =>
                \Carbon\Carbon::parse($p->fecha_fin)->lt($hoy) && $p->estado !== 'Finalizado'
            );
        }

        // Filtro: solo proyectos que corresponden al año Gantt activo
        $ganttProyectos = $ganttProyectos->filter(function($p) use ($anioGantt) {
            $ini = \Carbon\Carbon::parse($p->fecha_inicio)->year;
            $fin = \Carbon\Carbon::parse($p->fecha_fin)->year;
            return $ini <= $anioGantt && $fin >= $anioGantt;
        });

        // Mapeo de área → clase de color Tailwind para las barras Gantt
        $coloresArea = [
            'electrica'      => 'bg-blue-600',
            'eléctrica'      => 'bg-blue-600',
            'aguas'          => 'bg-green-500',
            'civil'          => 'bg-gray-400',
            'automatizacion' => 'bg-teal-600',
            'automatización' => 'bg-teal-600',
        ];

        // Índice del año activo en la lista ordenada descendente
        $anioIndex      = $aniosDisponibles->search($anioGantt);
        $anioAnterior   = $aniosDisponibles->get($anioIndex + 1); // más antiguo
        $anioSiguiente  = $anioIndex > 0 ? $aniosDisponibles->get($anioIndex - 1) : null; // más reciente
    @endphp

    {{-- ESTADÍSTICAS --}}
    <div class="flex flex-wrap gap-4 mb-8">

        {{-- Con Cronograma --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-[#081423] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $totalCron }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Con Cronograma</p>
                </div>
            </div>
            <div class="w-full h-1.5 rounded-full bg-[#d4af37]"></div>
        </div>

        {{-- En Tiempo --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $enTiempo }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">En Tiempo</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $pctEnTiempo }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-green-500 transition-all duration-500" style="width: {{ $pctEnTiempo }}%"></div>
                </div>
            </div>
        </div>

        {{-- Con Desvío --}}
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex flex-col gap-3 flex-1 min-w-[160px]">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-[#0f1d3a] leading-none">{{ $conDesvio }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mt-1">Con Desvío</p>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-[10px] font-semibold text-gray-400 uppercase tracking-widest mb-1">
                    <span>Porcentaje</span>
                    <span>{{ $pctConDesvio }}%</span>
                </div>
                <div class="w-full h-1.5 rounded-full bg-gray-100 overflow-hidden">
                    <div class="h-full rounded-full bg-amber-400 transition-all duration-500" style="width: {{ $pctConDesvio }}%"></div>
                </div>
            </div>
        </div>

    </div>

    {{-- BUSCADOR Y FILTROS DE ESTADO --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">

        {{-- Buscador (sin JS, GET puro) --}}
        <form action="{{ route('cronograma.index') }}" method="GET" class="relative w-full sm:max-w-sm flex gap-2">
            {{-- Conservar otros parámetros activos --}}
            @if(request()->query('anio'))
                <input type="hidden" name="anio" value="{{ request()->query('anio') }}">
            @endif
            @if(request()->query('estado'))
                <input type="hidden" name="estado" value="{{ request()->query('estado') }}">
            @endif

            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 0 5 11a6 6 0 0 0 12 0z"/>
                    </svg>
                </div>
                <input
                    type="text"
                    name="buscar"
                    value="{{ $buscar }}"
                    placeholder="Buscar proyecto..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm text-gray-700 placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#d4af37]/40 focus:border-[#d4af37] transition"
                />
            </div>
            <button type="submit"
                class="px-4 py-2.5 bg-[#d4af37] hover:bg-[#c19b2e] text-white rounded-xl font-bold text-sm shadow-sm transition-all">
                Buscar
            </button>
        </form>

        {{-- Filtros por estado de cronograma --}}
        <div class="flex flex-wrap gap-2">

            <a href="{{ route('cronograma.index', array_merge(request()->query(), ['estado' => 'todos'])) }}"
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold shadow-sm transition-all
               {{ $filtroEstado === 'todos'
                    ? 'bg-[#081423] text-white border-[#081423]'
                    : 'bg-white text-gray-600 border-gray-200 hover:border-[#081423] hover:text-[#081423]' }}">
                Todos
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-full
                    {{ $filtroEstado === 'todos' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                    {{ $totalCron }}
                </span>
            </a>

            <a href="{{ route('cronograma.index', array_merge(request()->query(), ['estado' => 'en_tiempo'])) }}"
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold shadow-sm transition-all
               {{ $filtroEstado === 'en_tiempo'
                    ? 'bg-green-600 text-white border-green-600'
                    : 'bg-white text-gray-600 border-gray-200 hover:border-green-500 hover:text-green-600' }}">
                <span class="w-2 h-2 rounded-full {{ $filtroEstado === 'en_tiempo' ? 'bg-white' : 'bg-green-500' }}"></span>
                En Tiempo
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-full
                    {{ $filtroEstado === 'en_tiempo' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                    {{ $enTiempo }}
                </span>
            </a>

            <a href="{{ route('cronograma.index', array_merge(request()->query(), ['estado' => 'con_desvio'])) }}"
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border text-sm font-semibold shadow-sm transition-all
               {{ $filtroEstado === 'con_desvio'
                    ? 'bg-amber-500 text-white border-amber-500'
                    : 'bg-white text-gray-600 border-gray-200 hover:border-amber-400 hover:text-amber-600' }}">
                <span class="w-2 h-2 rounded-full {{ $filtroEstado === 'con_desvio' ? 'bg-white' : 'bg-amber-400' }}"></span>
                Con Desvío
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-full
                    {{ $filtroEstado === 'con_desvio' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' }}">
                    {{ $conDesvio }}
                </span>
            </a>

        </div>
    </div>

    {{-- DIAGRAMA GANTT --}}
    <div class="bg-white rounded-2xl shadow-[0_4px_10px_rgba(0,0,0,0.04)] border border-gray-100 overflow-hidden">

        {{-- Cabecera del bloque --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 px-6 py-4 border-b border-gray-100">
            <h2 class="text-base font-extrabold text-[#0f1d3a] uppercase tracking-widest">
                Cronograma General — {{ $anioGantt }}
            </h2>
            <span class="text-xs text-gray-400 font-medium">
                {{ $ganttProyectos->count() }} proyecto(s) encontrado(s)
            </span>
        </div>

        {{-- Tabla Gantt --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] border-collapse border border-gray-200">

                <thead>
                    <tr class="bg-gradient-to-r from-[#081423] to-[#1a2f4f] text-white text-[11px] font-bold uppercase tracking-widest">
                        <th class="text-left px-5 py-3 w-44 border-r border-white/10">Proyecto</th>
                        <th class="text-left px-3 py-3 w-28 border-r border-white/10">Área</th>
                        <th class="text-left px-3 py-3 w-24 border-r border-white/10">Estado</th>
                        @foreach(['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'] as $mesLabel)
                        <th class="text-center px-1 py-3 w-[5.5%] border-r border-white/10">{{ $mesLabel }}</th>
                        @endforeach
                        <th class="text-center px-3 py-3 w-16">Avance</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ganttProyectos as $i => $proyecto)
                    @php
                        $fechaInicio = \Carbon\Carbon::parse($proyecto->fecha_inicio);
                        $fechaFin    = \Carbon\Carbon::parse($proyecto->fecha_fin);

                        $mesInicio = ($fechaInicio->year === $anioGantt)
                            ? $fechaInicio->month
                            : ($fechaInicio->year < $anioGantt ? 1 : 13);

                        $mesFin = ($fechaFin->year === $anioGantt)
                            ? $fechaFin->month
                            : ($fechaFin->year > $anioGantt ? 12 : 0);

                        $areaNombre = strtolower(
                            str_replace(['á','é','í','ó','ú'], ['a','e','i','o','u'],
                                $proyecto->area?->nombre ?? ''
                            )
                        );
                        $colorBarra = $coloresArea[$areaNombre] ?? 'bg-[#d4af37]';

                        $tieneDesvio = $fechaFin->lt($hoy) && $proyecto->estado !== 'Finalizado';
                    @endphp
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150 {{ $i % 2 !== 0 ? 'bg-gray-50/40' : '' }}">

                        {{-- Nombre del proyecto --}}
                        <td class="px-5 py-3 text-sm font-bold text-[#0f1d3a] border-r border-gray-200">
                            <div class="flex flex-col gap-0.5">
                                <span class="leading-snug">{{ $proyecto->nombre }}</span>
                                @if($proyecto->cliente)
                                <span class="text-[10px] text-gray-400 font-medium">{{ $proyecto->cliente->nombre }}</span>
                                @endif
                            </div>
                        </td>

                        {{-- Área --}}
                        <td class="px-3 py-3 text-xs text-gray-500 font-medium whitespace-nowrap border-r border-gray-200">
                            {{ $proyecto->area?->nombre ?? '—' }}
                        </td>

                        {{-- Estado --}}
                        <td class="px-3 py-3 border-r border-gray-200">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold {{ $proyecto->estado_color ?? 'bg-gray-100 text-gray-600' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $proyecto->estado_dot ?? 'bg-gray-400' }}"></span>
                                {{ $proyecto->estado }}
                            </span>
                        </td>

                        {{-- Barras mensuales --}}
                        @for($mes = 1; $mes <= 12; $mes++)
                        <td class="px-0.5 py-3 border-r border-gray-100">
                            @if($mesInicio <= $mesFin && $mes >= $mesInicio && $mes <= $mesFin)
                                @php
                                    $isFirst = $mes === $mesInicio;
                                    $isLast  = $mes === $mesFin;
                                    $radius  = $isFirst && $isLast ? 'rounded-lg' : ($isFirst ? 'rounded-l-lg' : ($isLast ? 'rounded-r-lg' : ''));
                                    $desvioClass = $tieneDesvio ? 'opacity-60 ring-1 ring-red-400' : 'opacity-90 hover:opacity-100';
                                @endphp
                                <div class="h-7 {{ $colorBarra }} {{ $radius }} {{ $desvioClass }} transition-all duration-200 shadow-sm"
                                     title="{{ $proyecto->nombre }} | {{ $fechaInicio->format('d/m/Y') }} – {{ $fechaFin->format('d/m/Y') }}">
                                </div>
                            @endif
                        </td>
                        @endfor

                        {{-- Avance --}}
                        <td class="px-3 py-3">
                            <div class="flex flex-col items-center gap-1">
                                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="h-full rounded-full bg-[#d4af37]" style="width: {{ $proyecto->avance ?? 0 }}%"></div>
                                </div>
                                <span class="text-[10px] font-bold text-gray-500">{{ $proyecto->avance ?? 0 }}%</span>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="16" class="px-6 py-14 text-center">
                            <p class="text-2xl font-extrabold text-[#0f1d3a] mb-2">Sin resultados</p>
                            <p class="text-sm text-gray-400">
                                @if($buscar !== '')
                                    No se encontraron proyectos para "{{ $buscar }}" en {{ $anioGantt }}.
                                @else
                                    No hay proyectos con cronograma para {{ $anioGantt }}.
                                @endif
                            </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer con paginación por año --}}
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-400 font-medium">

            <span>Mostrando {{ $ganttProyectos->count() }} proyecto(s) — Año {{ $anioGantt }}</span>

            {{-- Paginación por año (estilo numérica, sin JS) --}}
            <nav class="flex items-center gap-1">

                {{-- Anterior (año más reciente en la lista) --}}
                @if($anioSiguiente)
                    <a href="{{ route('cronograma.index', array_merge(request()->query(), ['anio' => $anioSiguiente])) }}"
                       class="px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 hover:border-[#d4af37] font-semibold text-xs transition-all">
                        ← Anterior
                    </a>
                @else
                    <span class="px-3 py-1.5 rounded-lg border border-gray-100 bg-gray-50 text-gray-300 font-semibold text-xs cursor-not-allowed">
                        ← Anterior
                    </span>
                @endif

                {{-- Botones de año --}}
                @foreach($aniosDisponibles as $yearNum)
                    <a href="{{ route('cronograma.index', array_merge(request()->query(), ['anio' => $yearNum])) }}"
                       class="w-10 h-8 flex items-center justify-center rounded-lg border font-bold text-xs transition-all
                       {{ $yearNum == $anioGantt
                            ? 'bg-[#d4af37] text-white border-[#d4af37] shadow-sm'
                            : 'bg-white text-gray-600 border-gray-200 hover:border-[#d4af37] hover:text-[#d4af37]' }}">
                        {{ $yearNum }}
                    </a>
                @endforeach

                {{-- Siguiente (año más antiguo en la lista) --}}
                @if($anioAnterior)
                    <a href="{{ route('cronograma.index', array_merge(request()->query(), ['anio' => $anioAnterior])) }}"
                       class="px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 hover:border-[#d4af37] font-semibold text-xs transition-all">
                        Siguiente →
                    </a>
                @else
                    <span class="px-3 py-1.5 rounded-lg border border-gray-100 bg-gray-50 text-gray-300 font-semibold text-xs cursor-not-allowed">
                        Siguiente →
                    </span>
                @endif

            </nav>

            <span class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-green-400 inline-block animate-pulse"></span>
                Actualizado hoy
            </span>
        </div>

    </div>

</div>

@endsection