<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proyecto',
        'pago',
        'id_colaboradorE',
    ];

}
