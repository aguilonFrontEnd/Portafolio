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

            <!-- Cart de la prenda -->
            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="https://tennis.vtexassets.com/arquivos/ids/2460444/tshirt-para-hombre-tennis-negro.jpg?v=638629000451700000" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            
                               <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3">Nombre del Producto 1</h3>
                                        <p class="outlet_p">Marca del Producto 1</p>
                                        <p class="outlet_price">225.000 <strong>CO</strong></p>
                                    </div>
                                </div>

                            <button type="button">Eliminar</button>
                        </div>
                    </figure>
            </span>

            
            <!-- Cart de la prenda -->
            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="https://tennis.vtexassets.com/arquivos/ids/2460444/tshirt-para-hombre-tennis-negro.jpg?v=638629000451700000" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            
                               <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3">Nombre del Producto 1</h3>
                                        <p class="outlet_p">Marca del Producto 1</p>
                                        <p class="outlet_price">225.000 <strong>CO</strong></p>
                                    </div>
                                </div>

                            <button type="button">Eliminar</button>
                        </div>
                    </figure>
            </span>

            
            <!-- Cart de la prenda -->
            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="https://tennis.vtexassets.com/arquivos/ids/2460444/tshirt-para-hombre-tennis-negro.jpg?v=638629000451700000" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            
                               <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3">Nombre del Producto 1</h3>
                                        <p class="outlet_p">Marca del Producto 1</p>
                                        <p class="outlet_price">225.000 <strong>CO</strong></p>
                                    </div>
                                </div>

                            <button type="button">Eliminar</button>
                        </div>
                    </figure>
            </span>

            
            <!-- Cart de la prenda -->
            <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="https://tennis.vtexassets.com/arquivos/ids/2460444/tshirt-para-hombre-tennis-negro.jpg?v=638629000451700000" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            
                               <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3">Nombre del Producto 1</h3>
                                        <p class="outlet_p">Marca del Producto 1</p>
                                        <p class="outlet_price">225.000 <strong>CO</strong></p>
                                    </div>
                                </div>

                            <button type="button">Eliminar</button>
                        </div>
                    </figure>
            </span>

            
            <!-- Cart de la prenda -->
            <span class="span_outlet">
                <figure class="figure_outlet">
                        <img src="https://tennis.vtexassets.com/arquivos/ids/2460444/tshirt-para-hombre-tennis-negro.jpg?v=638629000451700000" alt="Producto 1" class="image_outlet">
                        <div class="container_cart">
                            
                               <div class="outlet_dates">
                                    <div class="outlet_name">
                                        <h3 class="outlet_h3">Nombre del Producto 1</h3>
                                        <p class="outlet_p">Marca del Producto 1</p>
                                        <p class="outlet_price">225.000 <strong>CO</strong></p>
                                    </div>
                                </div>
                        <button type="button">Eliminar</button>
                    </div>
                </figure>
            </span>
            
        </section>
    </main>


</body>
</html>