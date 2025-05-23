<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Categoria;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Dashboard extends Controller
{
    public function dashboardVendor()
    {
        $usuario = Auth::guard()->user();
        
        if ($usuario->id_rol != 1) {
            return redirect()->route('buyer.dashboard')->with('error', 'Acceso no autorizado');
        }

        $categorias = Categoria::all(); 
        $productos = Productos::where('usuario_id', $usuario->id)->get();
        
        return view('roles.vendor.pages.dashboard.vendor_dashboard', [
            'user' => $usuario, 
            'categorias' => $categorias, 
            'productos' => $productos
        ]);
    }

    // Registrar prendas
    public function registerClothes(Request $request) {
        try {
            DB::beginTransaction();
    
            // Procesar imagen (mantenemos esto porque es necesario)
            $imagen = $request->file('imagen');
            $fotoBase64 = 'data:' . $imagen->getClientMimeType() . ';base64,' . 
                         base64_encode(file_get_contents($imagen->path()));
    
            // Crear el producto con los datos directos del request
            $producto = Productos::create([
                'nombre' => $request->nombre,
                'precio' => $request->precio,
                'codigo_producto' => $request->codigo_producto,
                'foto_prenda' => $fotoBase64,
                'talla' => $request->talla,
                'stock' => $request->cantidad, 
                'tipo_talla' => $request->tipo_talla,
                'usuario_id' => Auth::id(),
                'marca' => $request->marca
            ]);
    
            // Asignar categoría
            $producto->categorias()->attach($request->ropa);
    
            DB::commit();
    
            return redirect()->route('vendor.dashboard')
                   ->with('success', '¡Prenda registrada exitosamente!');
    
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar prenda: ' . $e->getMessage());
            
            return back()->withInput()
                   ->with('error', 'Error al registrar la prenda: ' . $e->getMessage());
        }
    }

    // DashBoard de control de los Compradores
    public function dashboardBuyer()
    {
        $usuario = Auth::guard()->user();
        
        if ($usuario->id_rol != 2) {
            return redirect()->route('vendor.dashboard')->with('error', 'Acceso no autorizado');
        }

        return view('roles.buyer.dashboard.buyer_dashboard', ['user' => $usuario]);
    }

    // Mostrar formulario de configuración de cuenta
    public function showAccountForm() {
        $usuario = Auth::user();
        $categorias = Categoria::all();

        if (!$usuario) {
            return redirect()->route('login');
        }

        return view('roles.vendor.pages.dashboard.vendor_dashboard', [
            'user' => $usuario,
            'categorias' => $categorias
        ]);
    }
    // Cambiar los datos de la cuenta del usuario
    public function updateAccount(Request $request) {
        $usuario = Auth::user();
        
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        // Procesar imagen como Base64
        $imageData = null;
        if ($request->hasFile('image_users')) {
            $imagen = $request->file('image_users');
            $imageData = 'data:' . $imagen->getClientMimeType() . ';base64,' . 
                        base64_encode(file_get_contents($imagen->getRealPath()));
        }

        // Actualización directa en BD (usando los nombres correctos)
        $updateResult = DB::table('usuarios')
            ->where('id', $usuario->id)
            ->update([
                'documento' => $request->document,
                'nombre' => $request->full_name,
                'telefono' => $request->telefono, 
                'correo' => $request->email,
                'contraseña' => $request->password ? Hash::make($request->password) : $usuario->contraseña,
                'foto_perfil' => $imageData ?: $usuario->foto_perfil,
                'updated_at' => now()
            ]);

        if ($updateResult) {
            return back()->with('success', '¡Datos actualizados correctamente!');
        }

        return back()->with('error', 'Error al actualizar los datos');
    }
}