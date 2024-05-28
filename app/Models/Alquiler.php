<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';

    protected $fillable = [
        'id_usuario',
        'vehiculo_nombre',
        'vehiculo_modelo',
        'precio_total',
        'lugar_recogida',
        'lugar_entrega',
        'fecha_entrega',
        'fecha_recogida',
        'hora_entrega',
        'hora_recogida',
        'forma_pago',
    ];

    use HasFactory;
}
