<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Area;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $proyectos = Proyecto::with(['area', 'cliente'])
            ->whereNotIn('estado', ['Finalizado', 'Cancelado'])
            ->get();
            $todosLosProyectos = Proyecto::all();
        return view('admin.proyectos.index', compact('proyectos', 'todosLosProyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $areas = Area::all();        
        $clientes = Cliente::all();  
        return view('admin.proyectos.create', compact('areas', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'ubicacion'   => 'nullable|string|max:255',
            'estado'      => 'required|string|max:50',
            'costo'       => 'required|numeric',
            'avance'      => 'nullable|numeric|min:0|max:100',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin'   => 'required|date|after_or_equal:fecha_inicio',
            'area_id'     => 'nullable|exists:areas,id',
            'cliente_id'  => 'nullable|exists:clientes,id',
        ]);

        Proyecto::create($request->all());
        return back()->with('success', 'Proyecto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }

    public function finalizar($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = 'Finalizado';
        $proyecto->save();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto finalizado correctamente');
    }

    public function cancelar($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = 'Cancelado';
        $proyecto->save();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto cancelado correctamente');
    }

    public function historial()
    {
        $proyectos = Proyecto::whereIn('estado', ['Finalizado', 'Cancelado'])
            ->with('cliente')
            ->get();

        return view('admin.proyectos.historial', compact('proyectos'));
    }

    public function reactivar($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->estado = 'En ejecución'; 
        $proyecto->save();

        return redirect()->route('proyectos.historial')
            ->with('success', 'Proyecto reactivado correctamente');
    }
}
