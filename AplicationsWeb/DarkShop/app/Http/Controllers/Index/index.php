<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Productos;
use App\Models\Categoria;

class index extends Controller
{
    public function indexVendor()
    {

        
        $user = Auth::user();

        $outletCategoria = Categoria::where('nombre', 'outlet')->first();

        if ($outletCategoria) {

            $productosOutlet = Productos::where('usuario_id', $user->id) 
                ->whereHas('categorias', function ($query) use ($outletCategoria) {
                    $query->where('categorias.id', $outletCategoria->id);
                })
                ->get();
        } else {
            $productosOutlet = collect(); 
        }

        return view('roles.vendor.pages.index.vendor_index', [
            'user' => $user,
            'productosOutlet' => $productosOutlet
        ]);
    }
}
