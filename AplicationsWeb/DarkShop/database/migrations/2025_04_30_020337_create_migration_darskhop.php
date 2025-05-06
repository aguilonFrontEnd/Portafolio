<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rol');
            $table->text('descripcion')->nullable();
            $table->timestamps(0);
        });

        // Tabla usuarios
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('documento');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('telefono', 20)->nullable();
            $table->string('contraseña');
            $table->longText('foto_perfil')->nullable();
            $table->foreignId('id_rol')->constrained('roles');
            $table->timestamps(0);
        });

        // Tabla categorias
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps(0);
        });

        // Tabla productos
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 10, 2);
            $table->string('codigo_producto')->unique();
            $table->longText('foto_prenda');
            $table->string('talla');
            $table->string('tipo_talla');
            $table->integer('stock')->default(0); 
            $table->string('marca'); 
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamps();
        });     

        // Migración de categoria_producto
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('categoria_id');  
            $table->unsignedBigInteger('producto_id');  
            $table->timestamps();

            // Relaciones de claves foráneas
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });

        // Tabla tallas (agrégala después de categorias y antes de productos)
        Schema::create('tallas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo');   
            $table->timestamps(0);
        });

        // Tabla carritos
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->timestamps(0);
        });

        // Tabla elementos_carrito
       Schema::create('elementos_carrito', function (Blueprint $table) {
            $table->id();
            // Claves foráneas
            $table->foreignId('carrito_id')->constrained('carritos')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->foreignId('talla_id')->constrained('tallas')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            
            // Campos adicionales
            $table->integer('cantidad')->default(1);
            $table->decimal('precio_unitario', 10, 2); // Precio en el momento de agregar al carrito
            
            $table->timestamps();
            
            // Índices para mejorar rendimiento
            $table->index(['carrito_id', 'producto_id', 'talla_id']);
        });

        // Tabla pedidos
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_carrito')->constrained('carritos');
            $table->enum('estado_pedido', ['PENDIENTE', 'CANCELADO', 'COMPLETADO'])->default('PENDIENTE');
            $table->decimal('precio_total', 10, 2);
            $table->timestamps(0);
        });

        // Tabla elementos_pedido
        Schema::create('elementos_pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido')->constrained('pedidos');
            $table->foreignId('id_producto')->constrained('productos');
            $table->foreignId('id_talla')->constrained('tallas');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->timestamps(0);
        });

        // Tabla pagos
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido')->constrained('pedidos');
            $table->string('metodo_pago');
            $table->enum('estado_pago', ['PENDIENTE', 'COMPLETADO', 'FALLIDO'])->default('PENDIENTE');
            $table->decimal('monto', 10, 2);
            $table->timestamps(0);
        });

        // Tabla historial_actividades
        Schema::create('historial_actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->constrained('usuarios');
            $table->foreignId('id_pedido')->constrained('pedidos');
            $table->foreignId('id_producto')->constrained('productos');
            $table->string('accion');
            $table->timestamps(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_actividades');
        Schema::dropIfExists('pagos');
        Schema::dropIfExists('elementos_pedido');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('tallas');
        Schema::dropIfExists('elementos_carrito');
        Schema::dropIfExists('carritos');
        Schema::dropIfExists('categoria_producto'); 
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('productos');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('roles');
    }
};
