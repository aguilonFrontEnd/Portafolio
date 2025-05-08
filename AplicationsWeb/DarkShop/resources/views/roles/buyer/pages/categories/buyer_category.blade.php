<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar -   {{ ucfirst($categoria) }}</title> 

    {{-- LINK DE FONT AWESONE PARA ICONOS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @vite(['resources/scss/roles/buyer/buyer_category.scss'])
    @vite('resources/js/pages/categories.js')


</head>
<body>
  
    <div class="container_header">
        @include('layout.categories.header_category')
    </div>

    <div class="container_nav">
        @include('layout.categories.nav_category')
    </div>

    <main class="main_categories">

        <figure class="container_categories">
            
            @if($categoriaExists)
                @foreach($productos as $producto)
                    <span class="span_categories">
                        <figure class="figure_categories">
                            <img src="{{ $producto->foto_prenda ?? 'https://via.placeholder.com/300' }}" 
                                alt="{{ $producto->nombre }}" 
                                class="image_categories">
                            <div class="container_cart">
                                @if(auth()->user()->id_rol == 1) <!-- Vendor -->
                                    <button type="button" class="btn-editar" data-id="{{ $producto->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                @else <!-- Buyer -->
                                    <button type="button" class="btn-comprar" data-id="{{ $producto->id }}">
                                        Comprar
                                    </button>
                                    <i class="fas fa-cart-plus"></i>
                                @endif
                            </div>
                        </figure>

                        <div class="categories_dates">
                            <div class="categories_name">
                                <h3 class="categories_h3">{{ $producto->nombre }}</h3>
                                <p class="categories_p">{{ $producto->marca ?? 'Marca Genérica' }}</p> <!-- Mostrar siempre la marca -->
                            </div>
                            <p class="categories_price">
                                {{ number_format($producto->precio, 0, ',', '.') }} 
                                <strong>CO</strong>
                            </p>
                        </div>
                    </span>
                @endforeach
            @else
                <div class="no-products">
                    <p>No hay productos en esta categoría</p>
                </div>
            @endif

        </figure>
    </main>

</body>
</html>