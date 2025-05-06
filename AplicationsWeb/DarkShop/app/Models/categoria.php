<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';  

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación muchos a muchos con los productos a través de la tabla intermedia categoria_producto
    public function productos()
    {
        return $this->belongsToMany(Productos::class, 'categoria_producto', 'categoria_id', 'producto_id');
    }
}
