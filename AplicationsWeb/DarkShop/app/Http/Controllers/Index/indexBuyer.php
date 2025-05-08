<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Productos;
use App\Models\Categoria;



class indexBuyer extends Controller
{

    public function indexBuyer()
    {
        if(Auth::user()->id_rol != 2) {
            return redirect()->route('vendor.index', ['id' => Auth::id()])->with('error', 'Acceso no autorizado');
        }
    
        $productosOutlet = Productos::whereHas('categorias', function($query) {
                $query->where('nombre', 'outlet');
            })
            ->where('stock', '>', 0)
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Filtrar solo las categorías que necesitas
        $categoriasFiltradas = Categoria::whereIn('nombre', [
            'Zapatos', 
            'Camisetas', 
            'Chaquetas', 
            'Pantalones', 
            'Gorras'
        ])->get();
    
        return view('roles.buyer.pages.home.buyer_index', [
            'categorias' => $categoriasFiltradas, 
            'productosOutlet' => $productosOutlet,
            'outletExists' => $productosOutlet->isNotEmpty()
        ]);
    }
}