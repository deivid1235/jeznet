<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'correo',
        'telefono',
        'direccion',
        'departamento',
        'provincia',
        'distrito',
        'servicio_contratado',
        'numero_orden',
        'identificacion_servicio',
        'monto_reclamado',
        'tipo_reclamo',
        'motivo',
        'detalle_solicitud',
        'pedido_concreto',
        'acepto_politicas'
    ];
}