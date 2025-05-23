<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Productos;

class category extends Controller
{
    public function showCategoriesBuyer($categoria)
    {

        $categoriasPermitidas = ['zapatos', 'camisetas', 'chaquetas', 'pantalones', 'gorras', 'outlet'];
        
        if (!in_array(strtolower($categoria), $categoriasPermitidas)) {
            return redirect()->route('buyer.index')->with('error', 'Categoría no válida');
        }

        $productos = Productos::whereHas('categorias', function($query) use ($categoria) {
                $query->where('nombre', strtolower($categoria));
            })
            ->where('stock', '>', 0)
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('roles.buyer.pages.categories.buyer_category', [
            'categoria' => ucfirst($categoria),
            'productos' => $productos,
            'categoriaExists' => $productos->isNotEmpty()
        ]);
    }
}