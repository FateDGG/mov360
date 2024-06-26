<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $table = 'aeropuertos';

    protected $fillable = [
        'nombre',
        'ciudad',
        'url_foto',
    ];
}
