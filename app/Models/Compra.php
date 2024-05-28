<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';
    protected $fillable = ['id_usuario', 'valor', 'descripción']; // Asegúrate de ajustar esto según tus necesidades

}
