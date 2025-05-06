<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_usuario',
        'id_carrito',
        'estado_pedido',
        'precio_total',
    ];

    // Un pedido pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'id_usuario');
    }

    // Un pedido está asociado a un carrito
    public function carrito()
    {
        return $this->belongsTo(carrito::class, 'id_carrito');
    }

    // Un pedido tiene muchos elementos
    public function elementos()
    {
        return $this->hasMany(elementosPedido::class, 'id_pedido');
    }

    // Un pedido puede tener un pago
    public function pago()
    {
        return $this->hasOne(pago::class, 'id_pedido');
    }

    // Un pedido puede aparecer en el historial
    public function historialActividades()
    {
        return $this->hasMany(historialActividades::class, 'id_pedido');
    }
}
