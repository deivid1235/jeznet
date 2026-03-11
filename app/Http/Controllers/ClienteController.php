<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cliente = Cliente::all();
        return view('home.create.index', compact('clientes'));
        
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
        $request->validate([
            'correo' => 'required|max:255|unique:clientes,correo',
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'password' => 'required|max:255',
            'tipo_documento' => 'required|max:255',
            'numero_documento' => 'required|max:255|unique:clientes,numero_documento',
            'celular' => 'nullable|max:255',
        ]);
        $cliente =new Cliente();
        $cliente->correo = $request->correo;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->password = bcrypt($request->password);
        $cliente->tipo_documento = $request->tipo_documento;
        $cliente->numero_documento = $request->numero_documento;
        $cliente->celular = $request->celular;

        $cliente->save();
        return redirect()->back()
        ->with('mensaje', 'El cliente se ha creado correctamente.')
        ->with('icono', 'success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
