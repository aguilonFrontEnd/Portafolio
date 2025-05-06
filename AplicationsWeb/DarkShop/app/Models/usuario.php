<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'documento',
        'nombre',
        'correo',
        'telefono',
        'contraseña',
        'foto_perfil',
        'id_rol',  
    ];

    // Relación con el modelo Rol (Usuario pertenece a un Rol)
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    // Un usuario puede tener muchos carritos
    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'id_usuario');
    }

    // Un usuario puede hacer muchos pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }

    // Un usuario puede tener múltiples registros en el historial de actividades
    public function historialActividades()
    {
        return $this->hasMany(HistorialActividades::class, 'id_usuario');
    }

    // Relación con la tabla productos (un usuario puede tener muchos productos)
    public function productos()
    {
        return $this->hasMany(Productos::class, 'usuario_id');
    }
}
