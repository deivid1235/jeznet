<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Cliente;
use App\Models\Proyecto;
use App\Models\Reclamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $ingresosTotales = Proyecto::sum('costo');
        
        $totalClientes = Cliente::count();
        
        $totalProyectos = Proyecto::count();
        $avancePromedioGeneral = Proyecto::avg('avance') ?? 0;
        
        $totalReclamos = Reclamo::count();

        $proyectosPorEstado = Proyecto::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->pluck('total', 'estado')
            ->toArray();

        $reclamosPorTipo = Reclamo::select('tipo_reclamo', DB::raw('count(*) as total'))
            ->groupBy('tipo_reclamo')
            ->pluck('total', 'tipo_reclamo')
            ->toArray();

        $proyectosPorArea = Area::withCount('proyectos')
            ->orderBy('proyectos_count', 'desc')
            ->take(5)
            ->get();

        $ultimosProyectos = Proyecto::with(['area', 'cliente'])
            ->latest()
            ->take(5)
            ->get();

        $ultimosClientes = Cliente::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'ingresosTotales',
            'totalClientes',
            'totalProyectos',
            'avancePromedioGeneral',
            'totalReclamos',
            'proyectosPorEstado',
            'reclamosPorTipo',
            'proyectosPorArea',
            'ultimosProyectos',
            'ultimosClientes'
        ));
    }
}