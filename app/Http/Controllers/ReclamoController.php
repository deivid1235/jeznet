<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamo;

class ReclamoController extends Controller
{
    public function index()
    {
        return view('home.libroReclamaciones');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoDocumento' => 'required|string',
            'numeroDocumento' => 'required|string|max:15',
            'primerNombre' => 'required|string|max:255',
            'primerApellido' => 'required|string|max:255',
            'segundoApellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'departamento' => 'required|string',
            'provincia' => 'required|string',
            'distrito' => 'required|string',
            'servicioContratado' => 'required|string|max:255',
            'tipo_reclamo' => 'required|string|in:Reclamo,Queja',
            'motivo' => 'required|string',
            'detalleSolicitud' => 'required|string',
            'pedidoConcreto' => 'required|string',
            'aceptoPoliticas' => 'accepted'
        ]);

        Reclamo::create([
            'tipo_documento' => $request->tipoDocumento,
            'numero_documento' => $request->numeroDocumento,
            'primer_nombre' => $request->primerNombre,
            'segundo_nombre' => $request->segundoNombre,
            'primer_apellido' => $request->primerApellido,
            'segundo_apellido' => $request->segundoApellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'departamento' => $request->departamento,
            'provincia' => $request->provincia,
            'distrito' => $request->distrito,
            
            'servicio_contratado' => $request->servicioContratado,
            'numero_orden' => $request->numeroOrden,
            'identificacion_servicio' => $request->identificacionServicio,
            'monto_reclamado' => $request->montoReclamado,
            
            'tipo_reclamo' => $request->tipo_reclamo,
            'motivo' => $request->motivo,
            'detalle_solicitud' => $request->detalleSolicitud,
            'pedido_concreto' => $request->pedidoConcreto,
            'acepto_politicas' => $request->has('aceptoPoliticas') ? true : false,
        ]);

        return redirect()->back()->with('success', 'Su documento ha sido registrado exitosamente. En breve nos comunicaremos con usted.');
    }
}