<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre', 'telefono', 'email', 'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
