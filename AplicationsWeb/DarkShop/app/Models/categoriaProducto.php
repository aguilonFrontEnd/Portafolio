<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    protected $table = 'categoria_producto';
    public $timestamps = true;  // Esto es correcto si deseas seguir el seguimiento de las fechas de creación y actualización

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
