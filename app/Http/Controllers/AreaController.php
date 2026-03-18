<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all(); 
        
        $totalAreas = $areas->count();
        $activas = $areas->where('estado', 'Activo')->count();
        $inactivas = $areas->where('estado', 'Inactivo')->count();

        $pctActivas = $totalAreas > 0 ? ($activas / $totalAreas) * 100 : 0;
        $pctInactivas = $totalAreas > 0 ? ($inactivas / $totalAreas) * 100 : 0;
        
        return view('areas.index', compact(
            'areas', 'totalAreas', 'activas', 'inactivas', 'pctActivas', 'pctInactivas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function toggleStatus(Area $area)
    {
        $area->estado = $area->estado === 'Activo' ? 'Inactivo' : 'Activo';
        $area->save();

        return redirect()->route('areas.index')->with('success', 'El estado del área ha sido actualizado.');
    }
}
