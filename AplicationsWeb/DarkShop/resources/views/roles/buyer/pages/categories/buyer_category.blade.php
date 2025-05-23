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
                @foreach ($productos as $producto)
                    <span class="span_outlet">
                        <figure class="figure_outlet">
                            <img src="{{ $producto->foto_prenda ?? 'https://via.placeholder.com/300' }}" 
                                alt="Chaqueta {{ $producto->nombre }}" 
                                class="image_outlet">
                            
                            <div class="container_cart">
                                <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3"> {{ $producto->nombre }}</h3>
                                        <p class="outlet_p">{{ $producto->marca ?? 'Marca Genérica' }}</p>
                                        <p class="outlet_price">
                                            {{ number_format($producto->precio, 0, ',', '.') }} 
                                            <strong>CO</strong>
                                        </p>
                                    </div>
                                </div>
       
                                <div class="btn_oulet">
                                    <a link href="" >Comprar</a>
                                </div>
                            </div>
                        </figure>
                    </span>
                @endforeach
            @else
                <div class="no-products">
                    <p>No hay chaquetas disponibles en esta categoría.</p>
                </div>
            @endif

        </figure>
    </main>

</body>
</html>