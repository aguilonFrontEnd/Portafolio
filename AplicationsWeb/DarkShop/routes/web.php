<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\dashboard;
use App\Http\Controllers\Clothes\showClothes;
use App\Http\Controllers\Auth\startSesion;
use App\Http\Controllers\Index\indexVendor;
use App\Http\Controllers\Index\indexBuyer;
use App\Http\Controllers\Categories\category;
use App\Http\Controllers\Cart\cartController;


// RUTAS PÚBLICAS 
Route::prefix('sesion')->group(function() {

    // Logueo de los usarios
    Route::get('/login', [startSesion::class, 'loginUsers'])->name('sesion.login');
    Route::post('/logueo_post', [startSesion::class, 'logueo'])->name('loginUser');

    // Registro de los usurios
    Route::get('/register', [startSesion::class, 'registerUsers'])->name('register');
    Route::post('/register_post', [startSesion::class, 'register'])->name('registerUser');
});

// RUTAS DE LOS DASHBOARD
Route::prefix('dashboard')->group(function() {
    // RUTAS VENDEDOR
    Route::prefix('vendor')->group(function() {
        Route::get('/', [dashboard::class, 'dashboardVendor'])->name('vendor.dashboard');
        Route::post('/register-clothes', [dashboard::class, 'registerClothes'])->name('vendor.registerClothes');
        Route::get('/account', [dashboard::class, 'showAccountForm'])->name('vendor.account');
        Route::put('/account/update', [dashboard::class, 'updateAccount'])->name('vendor.account.update');
        
        // Productos del vendedor
        Route::get('/prendas/{id}', [showClothes::class, 'show'])->name('productos.show');
        Route::put('/productos/{id}', [showClothes::class, 'update'])->name('productos.update');
        Route::delete('/productos/{id}', [showClothes::class, 'destroy'])->name('productos.destroy');
    });

    // RUTAS COMPRADOR
    Route::prefix('buyer')->group(function() {
        Route::get('/', [dashboard::class, 'dashboardBuyer'])->name('buyer.dashboard');
        Route::get('/index', [indexBuyer::class, 'indexBuyer'])->name('buyer.index');
        

        // Rutas para categorías para los compradores
        Route::get('/categoriasBuyer/{categoria}', [category::class, 'showCategoriesBuyer'])->name('categorias.buyer.show');
        Route::get('/categoriasBuyer/{categoria}', [category::class, 'showCategoriesBuyer'])->name('categorias.show');

    });


        // Cerrar sesión (compartido)
        Route::post('/logout', function () {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect()->route('sesion.login');
        })->name('logout');
    });


// RUTAS PARA ACCEDER AL CARRITO DE COMPRAS DE LA PERSONA QUE COMPRA
    Route::get('/carrito', [cartController::class, 'cartSelection']);
