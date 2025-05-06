<?php

use App\Http\Controllers\returnViews;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\dashboard;
use App\Http\Controllers\Clothes\showClothes;
use App\Http\Controllers\Auth\startSesion;
use App\Http\Controllers\Index\index;

//  RUTAS DE ACCESO A LOS DASHBOARD DE LOS ROLES EN LA DARKSHOP
Route::prefix('dashboard')->group(function() {

    // Vendedor
    Route::get('/vendor', [Dashboard::class, 'dashboardVendor'])->name('vendor.dashboard');
    Route::post('/vendor/register-clothes', [Dashboard::class, 'registerClothes'])->name('vendor.registerClothes');
    
    // Configuración de cuenta
    Route::get('/vendor/account', [Dashboard::class, 'showAccountForm'])->name('vendor.account');
    Route::put('/vendor/account/update', [Dashboard::class, 'updateAccount'])->name('vendor.account.update');

        Route::prefix('show')->group(function() {

            // Modificacion y edicion del producto
            Route::get('/show/prendas/{id}', [showClothes::class, 'show'])->name('productos.show');
            Route::put('/productos/{id}', [showClothes::class, 'update'])->name('productos.update');
            Route::delete('/productos/{id}', [showClothes::class, 'destroy'])->name('productos.destroy');
        });

        
        Route::prefix('index')->group(function() {

            // Index del vendedor donde podra ver el contenido que tiene registrado
            Route::get('vendor/{id}', [index::class, 'indexVendor'])->name('vendor.index');        
        });

    /* -------------------------------------------------------------------------------------------------------------------- */

    // Comprador
    Route::get('/buyer', [Dashboard::class, 'dashboardBuyer'])->name('buyer.dashboard');
});

// RUTAS DE ACCESO A LOS DASHBOARD DE LOS ROLES EN LA DARKSHOP
Route::prefix('sesion')->group(function() {

    // Login de los usuarios
    Route::get('/login', [startSesion::class, 'loginUsers'])->name('login');
    Route::post('/logueo_post', [startSesion::class, 'logueo'])->name('loginUser');

    // Register de los usuarios
    Route::get('/register', [startSesion::class, 'registerUsers'])->name('register');
    Route::post('/register_post', [startSesion::class, 'register'])->name('registerUser');
});


