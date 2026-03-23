<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Muestra el listado y las estadísticas.
     */
    public function index()
    {
        $totalAreas = Area::count();
        $activas = Area::where('estado', 'Activo')->count();
        $inactivas = Area::where('estado', 'Inactivo')->count();

        $pctActivas = $totalAreas > 0 ? ($activas / $totalAreas) * 100 : 0;
        $pctInactivas = $totalAreas > 0 ? ($inactivas / $totalAreas) * 100 : 0;

        $areas = Area::withCount('proyectos')->latest()->get();

        return view('admin.areas.index', compact(
            'areas', 'totalAreas', 'activas', 'inactivas', 'pctActivas', 'pctInactivas'
        ));
    }

    /**
     * Guarda una nueva área.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|unique:areas,nombre',
            'icono' => 'required|string',
            'descripcion' => 'required|string',
            'entregables' => 'required|string',
            'proceso_trabajo' => 'required|string',
            'estado' => 'nullable|in:Activo,Inactivo',
        ], [
            'nombre.unique' => 'El nombre de esta área ya ha sido registrado.',
            'icono.required' => 'Debes seleccionar un ícono.',
            'nombre.required' => 'El nombre del área es obligatorio.',
            'descripcion.required' => 'Debes ingresar una descripción.',
            'entregables.required' => 'Los entregables son obligatorios.',
            'proceso_trabajo.required' => 'El proceso de trabajo es obligatorio.'
        ]);

        if(!isset($validatedData['estado'])) {
            $validatedData['estado'] = 'Activo';
        }

        Area::create($validatedData);

        return redirect()->route('admin.areas.index')
                        ->with('success', 'El área técnica se ha creado exitosamente.');
    }

    /**
     * Retorna los datos de un área en JSON para el modal de edición.
     */
    public function edit(Area $area)
    {
        return response()->json($area);
    }

    /**
     * Actualiza el área en la base de datos.
     */
    public function update(Request $request, Area $area)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|unique:areas,nombre,' . $area->id,
            'descripcion' => 'required|string',
            'entregables' => 'required|string',
            'proceso_trabajo' => 'required|string',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $area->update($validatedData);

        return redirect()->route('admin.areas.index')
                        ->with('success', 'El área técnica se ha actualizado correctamente.');
    }

    /**
     * Alterna el estado entre Activo e Inactivo.
     */
    public function toggleStatus(Area $area)
    {
        $area->estado = ($area->estado === 'Activo') ? 'Inactivo' : 'Activo';
        $area->save();

        return redirect()->route('admin.areas.index')
                        ->with('success', 'El estado del área ha sido actualizado.');
    }

    public function show(Area $area)
    {
        return view('admin.areas.show', compact('area'));
    }

    /**
     * Elimina el área de forma lógica (Soft Delete).
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('admin.areas.index')
                        ->with('success', 'Área eliminada correctamente.');
    }

    /**
     * Muestra la vista con las áreas eliminadas (Papelera).
     */
    public function trashed()
    {
        $areas = Area::onlyTrashed()->get();

        return view('admin.areas.trashed', compact('areas'));
    }

    /**
     * Restaura un área que estaba en la papelera.
     */
    public function restore($id)
    {
        $area = Area::withTrashed()->findOrFail($id);
        $area->restore();

        return redirect()->route('admin.areas.index')
                        ->with('success', 'Área restaurada correctamente.');
    }
}