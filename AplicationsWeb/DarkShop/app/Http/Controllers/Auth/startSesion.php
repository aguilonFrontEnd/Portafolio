<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario; 

class startSesion extends Controller
{
    /* LOGICA PARA EL INICIO DE SESION DE LOS USUARIOS */
    public function loginUsers() {
        return view('auth.auth_login.login_users');  
    }

    // Función para loguear usuarios automáticamente
    public function logueo(Request $request) 
    {

        $user = Usuario::where('documento', $request->document)->first(); 

        if (!$user || !Hash::check($request->password, $user->contraseña)) {
            return back()->withErrors([
                'document' => 'Documento o contraseña incorrectos.',
            ])->onlyInput('document');
        }

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->id_rol == 1) {
            return redirect()->route('vendor.dashboard');  
        } else {
            return redirect()->route('buyer.index'); 
        }
    }

    /* LOGICA PARA EL REGISTRO DE LOS USUARIOS */
    public function registerUsers() {
        return view('auth.auth_login.register_users'); 
    }

    public function register(Request $request) {
        $user = Usuario::create([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->contraseña),  
            'id_rol' => $request->id_rol,
        ]);
    
        Auth::login($user); 
        return redirect()->route($user->id_rol == 1 ? 'vendor.dashboard' : 'buyer.index');  
    }
}