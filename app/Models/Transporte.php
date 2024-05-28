<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transporte extends Model
{
    protected $table = 'transportes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'lugar_recogida',
        'lugar_destino',
        'medio_pago',
        'precio',
        'nombre_conductor',
    ];

    use HasFactory;
}
