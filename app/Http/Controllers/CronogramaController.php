<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{
    public function index()
    {
       
        $proyectos = Proyecto::with(['area', 'cliente'])
            ->whereNotIn('estado', ['Finalizado', 'Cancelado'])
            ->get();

        $proyectosGantt = $proyectos->map(function ($proyecto) {

            $inicio = $proyecto->fecha_inicio ? date('n', strtotime($proyecto->fecha_inicio)) : 1;
            $fin    = $proyecto->fecha_fin ? date('n', strtotime($proyecto->fecha_fin)) : 12;

            $tipo = 'civil';

            if ($proyecto->area) {
                $nombreArea = strtolower($proyecto->area->nombre);

                if (str_contains($nombreArea, 'electric')) {
                    $tipo = 'electrica';
                } elseif (str_contains($nombreArea, 'agua')) {
                    $tipo = 'aguas';
                } elseif (str_contains($nombreArea, 'automat')) {
                    $tipo = 'automatizacion';
                }
            }

            return [
                'nombre' => $proyecto->nombre,
                'inicio' => $inicio,
                'fin'    => $fin,
                'tipo'   => $tipo,
            ];
        });

        return view('admin.cronograma.index', compact('proyectos', 'proyectosGantt'));
    }
}