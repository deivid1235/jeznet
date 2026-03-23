<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'icono',
        'descripcion',
        'entregables',
        'proceso_trabajo',
        'estado'
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}