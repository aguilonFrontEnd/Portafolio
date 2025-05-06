<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'id_pedido',
        'metodo_pago',
        'estado_pago',
        'monto',
    ];

    // Un pago pertenece a un pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
