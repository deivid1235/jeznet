<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamo;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'montoReclamado' => 'nullable|numeric|max:9999999999',
            'tipo_reclamo' => 'required|string|in:Reclamo,Queja',
            'motivo' => 'required|string',
            'detalleSolicitud' => 'required|string',
            'pedidoConcreto' => 'required|string',
            'aceptoPoliticas' => 'accepted'
        ]);

        $cliente = Cliente::where('numero_documento', $request->numeroDocumento)->first();

        Reclamo::create([
            'cliente_id' => $cliente ? $cliente->id : null,
            
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

    public function adminIndex(Request $request)
    {
        $totalDocumentos = Reclamo::count();
        $totalReclamosCard = Reclamo::where('tipo_reclamo', 'Reclamo')->count();
        $totalQuejasCard = Reclamo::where('tipo_reclamo', 'Queja')->count();

        $pctReclamos = $totalDocumentos > 0 ? ($totalReclamosCard / $totalDocumentos) * 100 : 0;
        $pctQuejas = $totalDocumentos > 0 ? ($totalQuejasCard / $totalDocumentos) * 100 : 0;

        $query = Reclamo::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('numero_documento', 'like', "%{$search}%")
                ->orWhere('correo', 'like', "%{$search}%")
                ->orWhere('primer_nombre', 'like', "%{$search}%")
                ->orWhere('primer_apellido', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tipo')) {
            $query->where('tipo_reclamo', $request->tipo);
        }

        $reclamos = $query->latest()->paginate(10);
        $reclamos->withQueryString();

        return view('admin.reclamos.index', compact(
            'reclamos', 'totalDocumentos', 'totalReclamosCard', 'totalQuejasCard', 'pctReclamos', 'pctQuejas'
        ));
    }

    public function show($id)
    {
        $reclamo = Reclamo::findOrFail($id);
        return view('admin.reclamos.show', compact('reclamo'));
    }

    public function generarPDF($id)
    {
        $reclamo = Reclamo::findOrFail($id);
        $pdf = Pdf::loadView('admin.reclamos.pdf', compact('reclamo'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('Jeznet_Documento_00' . $reclamo->id . '.pdf');
    }

    public function imprimir($id)
    {
        $reclamo = Reclamo::findOrFail($id);
        
        return view('admin.reclamos.pdf', compact('reclamo'))->with('imprimir', true);
    }
}