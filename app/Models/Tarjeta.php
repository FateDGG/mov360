<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{

    protected $table = 'tarjetas';

    protected $fillable = [
        'id_usuario',
        'titular',
        'numero',
        'mes',
        'anio',
        'cvv',
    ];
    
    use HasFactory;

}
