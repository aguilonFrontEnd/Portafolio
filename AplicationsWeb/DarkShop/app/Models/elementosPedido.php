<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class elementosPedido extends Model
{
    protected $table = 'elementos_pedido';
    public $timestamps = false;

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'id_talla',
        'cantidad',
        'precio',
        
    ];

    // Un elemento pertenece a un pedido
    public function pedido()
    {
        return $this->belongsTo(pedido::class, 'id_pedido');
    }

    // Un elemento está asociado a un producto
    public function producto()
    {
        return $this->belongsTo(productos::class, 'id_producto');
    }

    // Un elemento tiene una talla
    public function talla()
    {
        return $this->belongsTo(talla::class, 'id_talla');
    }
}
