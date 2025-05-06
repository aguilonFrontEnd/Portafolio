<?php

namespace App\Http\Controllers\Clothes;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class showClothes extends Controller
{
    public function show($id) 
    {
        $producto = Productos::with('categorias')->findOrFail($id);
        $categorias = Categoria::all();
        
        return view('form.clothes.show_clothes', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, $id) {
        $producto = Productos::findOrFail($id);
    
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'codigo_producto' => 'required|string|max:50',
            'talla' => 'required|string|max:10',
            'cantidad' => 'required|integer',
            'tipo_talla' => 'required|string|max:20',
            'marca' => 'required|string|max:50',
            'ropa' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|max:2048', // max 2MB
        ]);
    
        // Procesar imagen si existe
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $validated['foto_prenda'] = 'data:' . $imagen->getClientMimeType() . ';base64,' .
                                        base64_encode(file_get_contents($imagen->path()));
        }
    
        // Actualizar el producto
        $producto->update([
            'nombre' => $validated['nombre'],
            'precio' => $validated['precio'],
            'codigo_producto' => $validated['codigo_producto'],
            'talla' => $validated['talla'],
            'stock' => $validated['cantidad'],
            'tipo_talla' => $validated['tipo_talla'],
            'marca' => $validated['marca'],
            'foto_prenda' => $validated['foto_prenda'] ?? $producto->foto_prenda
        ]);
    
        // Actualizar la categoría
        $producto->categorias()->sync([$validated['ropa']]);
    
        return redirect()->route('vendor.dashboard')
           ->with('success', 'Prenda actualizada correctamente');
    }
    
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        
        return redirect()->route('vendor.dashboard')
           ->with('success', 'Prenda eliminada correctamente');
    }
}