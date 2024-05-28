<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre', 'telefono', 'email', 'password', 'genero', 'documento', 'fechaNac', 'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_CLIENTE = 'cliente';

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isCliente()
    {
        return $this->role === self::ROLE_CLIENTE;
    }
}
