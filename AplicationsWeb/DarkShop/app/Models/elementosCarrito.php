<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementosCarrito extends Model
{
    protected $table = 'elementos_carrito';

    protected $fillable = [
        'carrito_id',       // Mejor usar snake_case para consistencia
        'producto_id',      // Coincide con convención de Laravel
        'talla_id',        // Coincide con migración
        'usuario_id',       // Coincide con migración
        'cantidad',
        'precio_unitario'   // Agregado para manejo histórico de precios
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2'  // Aseguramos formato monetario
    ];

    // Relación con Carrito
    public function carrito(): BelongsTo
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    // Relación con Producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }

    // Relación con Talla
    public function talla(): BelongsTo
    {
        return $this->belongsTo(Talla::class, 'talla_id');
    }

    // Relación con Usuario
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Método para calcular subtotal (opcional)
    public function getSubtotalAttribute(): float
    {
        return $this->cantidad * $this->precio_unitario;
    }
}