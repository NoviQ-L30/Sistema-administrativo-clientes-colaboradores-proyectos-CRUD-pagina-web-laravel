<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'username',
        'email',
        'password',
        'telefono',
        'nombre_empresa',
        'imagen',
    ];
    public function proyectoss()
    {
        return $this->hasMany(proyect::class);
    }
}
