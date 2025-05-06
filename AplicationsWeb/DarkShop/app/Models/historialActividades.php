<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historialActividades extends Model
{
    protected $table = 'historial_actividades';

    protected $fillable = [
        'id_usuario',
        'id_pedido',
        'id_producto',
        'accion',
    ];

    // Una actividad pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(usuario::class, 'id_usuario');
    }

    // Puede estar relacionada a un pedido
    public function pedido()
    {
        return $this->belongsTo(pedido::class, 'id_pedido');
    }

    // Puede estar relacionada a un producto
    public function producto()
    {
        return $this->belongsTo(productos::class, 'id_producto');
    }
}
