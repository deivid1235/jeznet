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
    public function index(Request $request)
    {
        $estado = $request->query('estado'); 
        $buscar = $request->query('buscar'); 

        $query = Proyecto::with(['area', 'cliente']);

       
        if ($estado && $estado !== 'todos') {
            $query->where('estado', $estado);
        } else {
            $query->whereNotIn('estado', ['Finalizado', 'Cancelado']);
        }

        if ($buscar && $buscar !== '') {
            $buscar = strtolower(trim($buscar));
            $query->whereRaw('LOWER(nombre) LIKE ?', ["%{$buscar}%"]);
        }

        $proyectos = $query->get();
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
            'avance' => 'nullable|integer|min:0|max:10',
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
        $proyecto->avance = 100; 
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

    public function historial(Request $request)
    {
        $buscar = $request->query('buscar');

        $query = Proyecto::with('cliente')
            ->whereIn('estado', ['Finalizado', 'Cancelado']);

        if ($buscar && $buscar !== '') {
            $buscar = strtolower(trim($buscar));

            $query->whereRaw('LOWER(nombre) LIKE ?', ["%{$buscar}%"]);
        }

        $proyectos = $query->get();

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
