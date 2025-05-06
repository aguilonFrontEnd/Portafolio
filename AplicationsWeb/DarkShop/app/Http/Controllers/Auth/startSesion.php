<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\usuario; 

class startSesion extends Controller
{
    /* LOGICA PARA EL INICIO DE SESION DE LOS USUARIOS */
    public function loginUsers() {
        return view('auth.auth_login.login_users'); 
    }

    // Función para loguear usuarios automáticamente
    public function logueo(Request $request) 
    {
      
        // Intentar obtener el usuario por el documento
        $user = usuario::where('documento', $request->document)->first();

        if (!$user || !Hash::check($request->password, $user->contraseña)) {
            return back()->withErrors([
                'document' => 'Documento o contraseña incorrectos.',
            ])->onlyInput('document');
        }

        // El usuario se autentica correctamente
        Auth::login($user);
        $request->session()->regenerate();

        // Redirigir al usuario dependiendo de su rol
        if ($user->id_rol == 1) {
            return redirect()->intended('dashboard/vendor'); // Redirige a vendedor
        } else {
            return redirect()->intended('dashboard/comprador'); // Redirige a comprador
        }
    }

    /* LOGICA PARA EL REGISTRO DE LOS USUARIOS */
    public function registerUsers() {
        return view('auth.auth_login.register_users'); 
    }

    // Función para registrar al usuario y loguearlo automáticamente
    public function register(Request $request) {

        $user = Usuario::create([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contraseña' => Hash::make(value: $request->contraseña), 
            'id_rol' => $request->id_rol,
        ]);
    
        Auth::login($user); 
        return redirect()->route($user->id_rol == 1 ? 'vendor.dashboard' : 'buyer.dashboard');
    }
}
