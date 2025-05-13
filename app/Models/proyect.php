<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proyect extends Model
{
    protected $fillable = [
        'nombre_proyecto',
        'fecha_inicio',
        'fecha_finalizacion',
        'prioridad',
        'id_colaborador',
        'id_colaborador2',
        'id_cliente',
        'descripcion',
        'archivo',
    ];

    public function collaboratorss()
    {
        return $this->hasMany(collaborator::class);
    }
}
