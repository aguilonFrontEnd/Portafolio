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

        <!-- Contenedor con los productos y la pasarela de pagos de los productos -->
        <form class="form_main">

            <!-- Contenedor con los productos a pagar o cancelar -->
            <figure class="figure_main">
                <div class="shopping_main">
                    <h3 class="name_shopping">Shopping Cart DarkShop</h3>
                    <p class="count_shopping">3 Items</p>
                </div>

                <!-- Contenedor de productos -->
                <article class="article_main">
                    
                    <!-- Producto 1 -->
                    <div class="items_main">
                        <div class="image_main">
                            <img src="https://www.puntoblanco.co/cdn/shop/files/uhev-negro-799-715436_000799-1_d84888f1-f250-43a6-8d85-ffee90aedba2.jpg?v=1736299206" alt="Descripción" class="image_cart">
                        </div>

                        <span class="date_main">
                            <h5 class="category_main">Camiseta</h5>
                            <h4 class="name_main">CAMISETA SMART OVERSIDE</h4>
                            <p class="march_main">Smart</p>
                        </span>

                        <!-- Controles de cantidad y precio -->
                        <div class="select_count">
                            <p class="count_option" id="mas1">+</p>
                            <input type="text" class="option_input" value="1" id="cantidad1" readonly>
                            <p class="count_option" id="menos1">-</p>
                        </div>

                        <span class="price_main" id="precio1">
                            <p>31.000 <strong>CO</strong></p>
                        </span>

                        <figure class="icon_main">
                            <a href="http://" class="delete_main">
                                <i class="fa-solid fa-xmark"></i>
                            </a> 
                        </figure>
                    </div>

                    <!-- Producto 2 -->
                    <div class="items_main">
                        <div class="image_main">
                            <img src="https://dynamobrand.co/cdn/shop/products/camiseta-basica-negra-para-hombre-oversize.jpg?v=1728058583" alt="Descripción" class="image_cart">
                        </div>

                        <span class="date_main">
                            <h5 class="category_main">Camiseta</h5>
                            <h4 class="name_main">CAMISETA START OVERSIDE</h4>
                            <p class="march_main">Start</p>
                        </span>

                        <!-- Controles de cantidad y precio -->
                        <div class="select_count">
                            <p class="count_option" id="mas2">+</p>
                            <input type="text" class="option_input" value="1" id="cantidad2" readonly>
                            <p class="count_option" id="menos2">-</p>
                        </div>

                        <span class="price_main" id="precio2">
                            <p>37.800 <strong>CO</strong></p>
                        </span>

                        <figure class="icon_main">
                            <a href="http://" class="delete_main">
                                <i class="fa-solid fa-xmark"></i>
                            </a> 
                        </figure>
                    </div>

                    <!-- Producto 3 -->
                    <div class="items_main">
                        <div class="image_main">
                            <img src="https://www.puntoblanco.co/cdn/shop/files/uhev-negro-799-715436_000799-1_d84888f1-f250-43a6-8d85-ffee90aedba2.jpg?v=1736299206" alt="Descripción" class="image_cart">
                        </div>

                        <span class="date_main">
                            <h5 class="category_main">Camiseta</h5>
                            <h4 class="name_main">CAMISETA PRESS OVERSIDE</h4>
                            <p class="march_main">Press</p>
                        </span>

                        <!-- Controles de cantidad y precio -->
                        <div class="select_count">
                            <p class="count_option" id="mas3">+</p>
                            <input type="text" class="option_input" value="1" id="cantidad3" readonly>
                            <p class="count_option" id="menos3">-</p>
                        </div>

                        <span class="price_main" id="precio3">
                            <p>34.500 <strong>CO</strong></p>
                        </span>

                        <figure class="icon_main">
                            <a href="http://" class="delete_main">
                                <i class="fa-solid fa-xmark"></i>
                            </a> 
                        </figure>
                    </div>
                </article>

                <!-- Redirección a añadir más productos -->
                <span class="redirect_main">
                    <i class="fas fa-arrow-left"></i>
                    <a href="http://">Añadir más prendas</a>
                </span>
            </figure>

            <!-- Contenedor con la seleccion de la pasarela de pagos -->
            <aside class="aside_main"></aside>
            
        </form>

    </main>


    <script>

        document.addEventListener("DOMContentLoaded", function() {
    // Botones de incremento y decremento para el producto 1
    const mas1 = document.getElementById("mas1");
    const menos1 = document.getElementById("menos1");
    const cantidad1 = document.getElementById("cantidad1");
    const precio1 = document.getElementById("precio1");
    const precioBase1 = 31000;

    // Incrementar y decrementar la cantidad y precio del producto 1
    mas1.addEventListener("click", function() {
        let cantidad = parseInt(cantidad1.value);
        cantidad1.value = cantidad + 1;
        precio1.innerHTML = `<p>${precioBase1 * cantidad1.value} <strong>CO</strong></p>`;
    });

    menos1.addEventListener("click", function() {
        let cantidad = parseInt(cantidad1.value);
        if (cantidad > 1) {
            cantidad1.value = cantidad - 1;
            precio1.innerHTML = `<p>${precioBase1 * cantidad1.value} <strong>CO</strong></p>`;
        }
    });

    // Botones de incremento y decremento para el producto 2
    const mas2 = document.getElementById("mas2");
    const menos2 = document.getElementById("menos2");
    const cantidad2 = document.getElementById("cantidad2");
    const precio2 = document.getElementById("precio2");
    const precioBase2 = 37800;

    // Incrementar y decrementar la cantidad y precio del producto 2
    mas2.addEventListener("click", function() {
        let cantidad = parseInt(cantidad2.value);
        cantidad2.value = cantidad + 1;
        precio2.innerHTML = `<p>${precioBase2 * cantidad2.value} <strong>CO</strong></p>`;
    });

    menos2.addEventListener("click", function() {
        let cantidad = parseInt(cantidad2.value);
        if (cantidad > 1) {
            cantidad2.value = cantidad - 1;
            precio2.innerHTML = `<p>${precioBase2 * cantidad2.value} <strong>CO</strong></p>`;
        }
    });

    // Botones de incremento y decremento para el producto 3
    const mas3 = document.getElementById("mas3");
    const menos3 = document.getElementById("menos3");
    const cantidad3 = document.getElementById("cantidad3");
    const precio3 = document.getElementById("precio3");
    const precioBase3 = 34500;

    // Incrementar y decrementar la cantidad y precio del producto 3
    mas3.addEventListener("click", function() {
        let cantidad = parseInt(cantidad3.value);
        cantidad3.value = cantidad + 1;
        precio3.innerHTML = `<p>${precioBase3 * cantidad3.value} <strong>CO</strong></p>`;
    });

    menos3.addEventListener("click", function() {
        let cantidad = parseInt(cantidad3.value);
        if (cantidad > 1) {
            cantidad3.value = cantidad - 1;
            precio3.innerHTML = `<p>${precioBase3 * cantidad3.value} <strong>CO</strong></p>`;
        }
    });
});


    </script>

</body>
</html>