<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table = 'carritos';

    protected $fillable = [
        'id_usuario',
        'estado',
    ];

    // Un carrito pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Un carrito puede tener muchos elementos
    public function elementos()
    {
        return $this->hasMany(elementosCarrito::class, 'id_carrito');
    }

    // Un carrito puede tener un pedido asociado
    public function pedido()
    {
        return $this->hasOne(Pedido::class, 'id_carrito');
    }
}
