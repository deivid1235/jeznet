<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'estado',
        'costo',
        'avance',
        'fecha_inicio',
        'fecha_fin',
        'area_id',
        'cliente_id',
    ];


    public function area()
    {
        return $this->belongsTo(Area::class);
    }

   
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

 
    public function getEstadoColorAttribute()
    {
        return match($this->estado) {
            'En ejecución' => 'bg-yellow-100 text-yellow-800',
            'Finalizado'   => 'bg-green-100 text-green-800',
            'Planificado'  => 'bg-blue-100 text-blue-800',
            'Cancelado'    => 'bg-rose-100 text-rose-800',
            default        => 'bg-gray-100 text-gray-800',
        };
    }

    public function getEstadoDotAttribute()
    {
        return match($this->estado) {
            'En ejecución' => 'bg-yellow-500',
            'Finalizado'   => 'bg-green-500',
            'Planificado'  => 'bg-blue-500',
            'Cancelado'    => 'bg-rose-500',
            default        => 'bg-gray-500',
        };
    }
}


