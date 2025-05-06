<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Talla extends Model
{
    protected $table = 'tallas';

    protected $fillable = [
        'nombre',
        'tipo', 
        'descripcion'
    ];

    // Relación con Productos (a través de elementos_carrito)
    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Productos::class, 'elementos_carrito', 'talla_id', 'producto_id')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    // Elementos del carrito que usan esta talla
    public function elementosCarrito(): HasMany
    {
        return $this->hasMany(ElementosCarrito::class, 'talla_id');
    }

    // Elementos de pedido que usan esta talla
    public function elementosPedido(): HasMany
    {
        return $this->hasMany(ElementosPedido::class, 'talla_id');
    }

    // Método para obtener tallas por tipo
    public static function porTipo(string $tipo)
    {
        return self::where('tipo', $tipo)->get();
    }

    // Accesor para mostrar tipo + nombre
    public function getNombreCompletoAttribute(): string
    {
        $tipos = [
            'torso' => 'Torso',
            'pierna' => 'Pierna',
            'calzado' => 'Calzado',
            'cabeza' => 'Cabeza'
        ];

        return sprintf('%s (%s)', $this->nombre, $tipos[$this->tipo] ?? 'Sin tipo');
    }
}