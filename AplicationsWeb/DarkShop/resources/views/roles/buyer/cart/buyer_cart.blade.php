<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- LINK DEL COPILADOR DE VITE --}}
    @vite(['resources/scss/roles/buyer/buyer_cart.scss'])
    @vite('resources/js/pages/cart/addCart.js')

    {{-- Link de fontAwesone para iconos  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Carrito De Compras - DarkShop</title>

</head>
<body>


    <!-- Container de encabezado del carro de compras de la darkshop -->
    <header class="container_header">

        <a href="http://">
            <i class="fas fa-arrow-left"></i> <!-- Icono de volver atras -->
        </a>

        <!-- Titulo de la vista -->
        <h1 class="header_h1">Carrito de compras</h1>

    </header>

    <!-- Container de pruductos a comprar en la darkshop -->
    <main class="container_main">

        <section class="section_main">

            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="ruta/a/tu/imagen1.jpg" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            <button type="button">Comprar</button>
                            <i class="fas fa-cart-plus"></i> {{-- Carro de compra --}}
                        </div>
                    </figure>

                    <div class="outlet_dates">
                        <div class="outlet_name">
                            <h3 class="outlet_h3">Nombre del Producto 1</h3>
                            <p class="outlet_p">Marca del Producto 1</p>
                        </div>
                        <p class="outlet_price">100,000 <strong>CO</strong></p>
                    </div>
            </span>

            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="ruta/a/tu/imagen2.jpg" alt="Producto 2" class="image_outlet">
                        <div class="container_cart">
                            <button type="button">Comprar</button>
                            <i class="fas fa-cart-plus"></i> {{-- Carro de compra --}}
                        </div>
                    </figure>

                    <div class="outlet_dates">
                        <div class="outlet_name">
                            <h3 class="outlet_h3">Nombre del Producto 2</h3>
                            <p class="outlet_p">Marca del Producto 2</p>
                        </div>
                        <p class="outlet_price">150,000 <strong>CO</strong></p>
                    </div>
            </span>

            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="ruta/a/tu/imagen3.jpg" alt="Producto 3" class="image_outlet">
                        <div class="container_cart">
                            <button type="button">Comprar</button>
                            <i class="fas fa-cart-plus"></i> {{-- Carro de compra --}}
                        </div>
                    </figure>

                    <div class="outlet_dates">
                        <div class="outlet_name">
                            <h3 class="outlet_h3">Nombre del Producto 3</h3>
                            <p class="outlet_p">Marca del Producto 3</p>
                        </div>
                        <p class="outlet_price">200,000 <strong>CO</strong></p>
                    </div>
            </span>

        </section>

    </main>


</body>
</html>