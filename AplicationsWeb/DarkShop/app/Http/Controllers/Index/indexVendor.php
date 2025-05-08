<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Productos;

class IndexVendor extends Controller  
{
    public function indexVendor($id)
    {
        // Verificación de que el ID coincide con el usuario autenticado
        if(Auth::id() != $id || Auth::user()->id_rol != 1) {
            return redirect()->route('buyer.index')->with('error', 'Acceso no autorizado');
        }
    
        $productosOutlet = Productos::where('usuario_id', $id)
            ->whereHas('categorias', function($query) {
                $query->where('nombre', 'outlet');
            })
            ->where('stock', '>', 0)
            ->with('categorias')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('roles.vendor.pages.index.vendor_index', [
            'productosOutlet' => $productosOutlet,
            'outletExists' => $productosOutlet->isNotEmpty()
        ]);
    }
}