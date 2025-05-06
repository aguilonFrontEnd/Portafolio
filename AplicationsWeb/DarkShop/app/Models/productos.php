<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'precio',
        'codigo_producto',
        'foto_prenda',
        'talla',
        'tipo_talla',
        'stock',
        'usuario_id',
        'marca' 
    ];

    // Relación muchos a muchos con las categorías
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto', 'producto_id', 'categoria_id');
    }

    // Relación uno a muchos inversa con el usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Método para obtener el tipo de talla formateado
    public function getTipoTallaFormateadoAttribute()
    {
        return match($this->tipo_talla) {
            'torso' => 'Torso (Camisas, Blusas)',
            'pierna' => 'Pierna (Pantalones)',
            'calzado' => 'Calzado',
            'cabeza' => 'Cabeza (Gorras)',
            default => 'Sin tipo definido'
        };
    }
}