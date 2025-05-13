<?php

namespace App\Models;
use App\Models\proyect;

use Illuminate\Database\Eloquent\Model;

class collaborator extends Model
{
    protected $fillable = [
        'name',
        'apellido',
        'username',
        'email',
        'password',
        'fecha_ingreso',
        'telefono',
        'company',
        'imagen',
        'departamento',
        'designacion',
    ];
    
    public function proyectoss()
    {
        return $this->hasMany(proyect::class);
    }
}