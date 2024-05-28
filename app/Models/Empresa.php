<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit',
        'representante_legal',
        'fecha_creacion',
        'localizacion',
        'email',
        'telefono',
    ];
}
