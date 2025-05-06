<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- LINK DE FONT AWESONE PARA ICONOS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    {{-- LINK DEL COPILADOR DE VITE --}}
    @vite(['resources/scss/roles/vendor/vendor_dashboard.scss'])
    @vite('resources/js/pages/dashboard.js')


    <title>Panel Administrador - DarkShop</title>

</head>
<body>
    
    {{-- CONTENEDOR DEL ENCABEZADO DEL VENDEDOR EN SU DASHBOARD EN LA DAKSHOP --}}
    <header class="darkshop container_header">
        @include('layout.dashboard.header_dashboard')
    </header>

    {{-- CONTENEDOR DEL MENU DE NAVEHACION DEL VENDEDOR EN SU DASHBOARD EN LA DARKSHOP --}}
    <nav class="darkshop container_nav">
        @include('layout.dashboard.nav_dashboard')
    </nav>

    {{-- CONTENEDOR CON LAS SECCIONES DE INTERACCION DEL VENDEDOR EN SU DASHBOARD EN LA DARKSHOP --}}
    <main class="darkshop container_main">

        {{-- Seccion por defecto al entrar en el dashboard del vendedor de la darkshop --}}
        <section class="section section_default">

            <article class="article_section">

                <h2 class="article_h2">Bienvenido a la DarkShop {{ Auth::user()->nombre }} <br><br></h2>
                
                <p class="article_p">
                    Este es el panel de gestión para llevar tu tienda al siguiente
                    nivel. Aquí puedes registrar tus prendas, actualizar tu 
                    catálogo y ofrecer a tus clientes lo más exclusivo en moda dark.
                    Únete a una comunidad que valora la elegancia, la identidad
                    y la actitud. Destaca, conecta y haz que tu marca hable por sí sola.
                </p>                

                <ul class="article_list">
                    <li class="list_option">Registrar nuevas prendas y ampliar tu catálogo dark.</li>
                    <li class="list_option">Supervisar el estado actual de tus productos publicados.</li>
                    <li class="list_option">Monitorear el progreso y gestión de pedidos en tiempo real.</li>
                    <li class="list_option">Consultar el historial completo de actividad y transacciones.</li>
                    <li class="list_option">Actualizar y personalizar los datos de tu cuenta administrativa.</li>
                </ul>
                
            </article>
        
            <h4 class="article_h4">
                Importante: Cada cambio o acción realizada en esta sección influirá
                directamente en cómo los usuarios perciben y experimentan tu marca. Asegúrate de gestionar tus prendas
                con precisión y coherencia.
            </h4>
                        

        </section>

        {{-- Seccion de registro de productos del vendedor en la darkshop --}}
        <section class="section section_register">

            {{-- Formulario de registro de prendas en la tienda --}} 
            <form action="{{ route('vendor.registerClothes') }}" method="POST" class="form_section" enctype="multipart/form-data">
                @csrf
            
                {{-- Inputs del formulario --}}
                <span class="span_form">
            
                    {{-- Contenedor de select de categorías de la prenda a registrar --}}
                    <div class="container_form input_category">
                            
                      {{-- Select de categorías de las prendas --}}
                    <select name="ropa" class="select_category" required>
                        <option value="" disabled selected>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    </div>
            
                    {{-- Contenedor de código y tallas de la prenda a registrar --}}
                    <div class="container_form input_auth">
            
                        {{-- Contenedor del código de la prenda --}}
                        <span class="span_number">
                            <label for="" class="label_number">Código de la prenda:</label>
                            <input type="text" class="input_number" name="codigo_producto" required>
                        </span>
            
                        {{-- Contenedor de tallas de la prenda --}}
                        <span class="span_size">
                            <span class="span_size size_select">
                                <select name="talla" class="select_size" id="tallaSelect">
                                    <option value="" disabled selected>Talla:</option>
                                    
                                    <!-- Torso (Camisas, Blusas, etc.) -->
                                    <optgroup label="Torso">
                                        <option value="XS">XS</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                    </optgroup>
                                    
                                    <!-- Pierna (Pantalones, Jeans) -->
                                    <optgroup label="Pierna">
                                        @for($i = 30; $i <= 38; $i += 2)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </optgroup>
                                    
                                    <!-- Calzado -->
                                    <optgroup label="Calzado">
                                        @for($i = 30; $i <= 42; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </optgroup>
                                    
                                    <!-- Cabeza (Gorras, Sombreros) -->
                                    <optgroup label="Cabeza">
                                        @for($i = 6; $i <= 14; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </optgroup>
                                </select>
                            </span>
                            
                            <!-- Campo oculto para el tipo de talla -->
                            <input type="hidden" name="tipo_talla" id="tipoTalla">
                            
                         
                    </div>
            
                    {{-- Contenedor del nombre de la prenda --}}
                    <div class="container_form input_name">
                        {{-- Contenedor del nombre de la prenda --}}
                        <span class="span_name">
                            <label for="" class="label_name">Nombre de la prenda:</label>
                            <input type="text" class="input_name" name="nombre" required>
                        </span>
                    </div>
            
                    {{-- Contenedor de marca, precio y cantidad de la prenda --}}
                    <div class="container_form input_info">
                        {{-- Contenedor de la marca de la prenda --}}
                        <span class="span_brand">
                            <label for="" class="label_brand">Marca de la prenda:</label>
                            <input type="text" class="input_brand" name="marca" required>
                        </span>
            
                        {{-- Contenedor del precio de la prenda --}}
                        <span class="span_price">
                            <label for="" class="label_price">Precio de la prenda:</label>
                            <input type="text" class="input_price" name="precio" required>
                        </span>
            
                        {{-- Contenedor de la cantidad de la prenda --}}
                        <span class="span_amount">
                            <label for="" class="label_amount">Cantidad:</label>
                            <input type="number" class="input_amount" name="cantidad" required>
                        </span>
                    </div>
            
                    {{-- Contenedor de imagen de la prenda --}}
                    <div class="container_form input_image">
                        {{-- Contenedor de imagen de la prenda --}}
                        <span class="span_image">
                            <!-- Input real oculto -->
                            <input type="file" id="fileInput" class="input-file" accept="image/*" name="imagen">
                            <!-- Label que actúa como botón -->
                            <label for="fileInput" class="custom-label">Haz clic para subir imagen</label>
                        </span>
                    </div>
            
                    {{-- Contenedor de botones de envío --}}
                    <div class="container_form input_btn">
                        {{-- Contenedor del botón de envío --}}
                        <span class="span_btn">
                            <button type="submit" class="btn_post">Registrar Prenda</button>
                        </span>
                    </div>
                </span>
            
                {{-- Previsualización de la prenda --}}
                <figure class="figure_form">
                    <img src="https://64.media.tumblr.com/2385eeaeee033262e920ac5096ad1def/tumblr_peuyk8Tyhm1ww01r3o1_1280.png" alt="Imagen de la prenda" class="image_form">
                </figure>
            
            </form>
                  
        </section>
        
        {{-- Seccion de pedidos de compras del comprador en la darkshop --}}
        <section class="section section_products">

            {{-- Contenedor de la tabla de los productos en la plataforma --}}
            <div class="container_table">

                {{-- Tabla de productos en la plataforma --}}
                <table class="table_products">

                    {{-- Encabezado de la tabla --}}
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>codigo</th>
                            <th>nombre de prenda</th>
                            <th>categoria</th>
                            <th>talla</th>
                            <th>sctok</th>
                            <th>accion</th>
                        </tr>
                    </thead>

                    {{-- Cuerpo de la tabla --}}
                    <tbody>

                        {{-- GRUPO NO1 -- Datos sinteticos -- --}}
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->codigo_producto }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>
                                @if($producto->categorias->first())
                                    {{ $producto->categorias->first()->nombre }}
                                @else
                                    Sin categoría
                                @endif
                            </td>
                            <td>{{ $producto->talla }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <!-- Ver -->
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn-icon">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>                
            </div>              

        </section>

        {{-- Seccion de pedidos de compras del comprador en la darkshop --}}
        <section class="section section_order">

            {{-- Contenedor de la tabla de los pedidos en la plataforma --}}
            <div class="container_table">

                {{-- Tabla de pedidos en la plataforma --}}
                <table class="table_order">

                    {{-- Encabezado de la tabla --}}
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>codigo</th>
                            <th>nombre de prenda</th>
                            <th>documento del comprador</th>
                            <th>fecha</th>
                            <th>estado</th>
                            <th>acción</th>
                        </tr>
                    </thead>

                    {{-- Cuerpo de la tabla --}}
                    <tbody>

                        {{-- GRUPO NO1 -- Datos sinteticos -- --}}
                        <tr>
                            <td>1</td>
                            <td>ZPT321</td>
                            <td>Zapatillas Versace Style Dash</td>
                            <td>100567742</td>
                            <td>23 / 03 / 2025</td>
                            <td>Pendiente</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>

                    {{--  GRUPO NO2 -- Datos sinteticos -- --}}
                        <tr>
                            <td>2</td>
                            <td>ZPT653</td>
                            <td>Zapatillas Disnayplus Store</td>
                            <td>199758382</td>
                            <td>25 / 05 / 2025</td>
                            <td>Entregado</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>
                            
                        {{-- GRUPO NO3 -- Datos sinteticos -- --}}
                        <tr>
                            <td>3</td>
                            <td>CST456</td>
                            <td>Camiseta Overside Fresh HUD</td>
                            <td>15642453</td>
                            <td>26 / 05 / 2025</td>
                            <td>Entregado</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>

                    </tbody>
                </table>                
            </div>   

        </section>

        {{-- Seccion de historial de pasos del vendedor en la darkshop --}}
        <section class="section section_history">

            {{-- Contenedor de la tabla de los pedidos en la plataforma --}}
            <div class="container_table">

                {{-- Tabla de pedidos en la plataforma --}}
                <table class="table_history">

                    {{-- Encabezado de la tabla --}}
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>codigo</th>
                            <th>nombre de prenda</th>
                            <th>categoria</th>
                            <th>fecha</th>
                            <th>modulo</th>
                            <th>acción</th>
                        </tr>
                    </thead>

                    {{-- Cuerpo de la tabla --}}
                    <tbody>

                        {{-- GRUPO NO1 -- Datos sinteticos -- --}}
                        <tr>
                            <td>1</td>
                            <td>ZPT321</td>
                            <td>Zapatillas Versace Style Dash</td>
                            <td>Zapatillas</td>
                            <td>23 / 03 / 2025</td>
                            <td>Registro</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>

                    {{--  GRUPO NO2 -- Datos sinteticos -- --}}
                        <tr>
                            <td>2</td>
                            <td>ZPT653</td>
                            <td>Zapatillas Disnayplus Store</td>
                            <td>Zapatillas</td>
                            <td>25 / 05 / 2025</td>
                            <td>Modificado</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>
                            
                        {{-- GRUPO NO3 -- Datos sinteticos -- --}}
                        <tr>
                            <td>3</td>
                            <td>CST456</td>
                            <td>Camiseta Overside Fresh HUD</td>
                            <td>Camiseta</td>
                            <td>26 / 05 / 2025</td>
                            <td>Separado</td>
                            <td>
                                <i class="fa-solid fa-eye"></i>
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash"></i>
                            </td>
                        </tr>

                    </tbody>
                </table>                
            </div>   

        </section>

        {{-- Section de configuracion de cuenta del vendedor en la darkshop --}}
        <section class="section section_account" style="display: none;">

            <form action="{{ route('vendor.account.update') }}" method="POST" class="form_account" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <!-- Foto de perfil -->
                <figure class="figure_account">
                    @if($user->foto_perfil)
                        <img src="{{ $user->foto_perfil }}" alt="Foto de perfil" class="image_account" id="profile-preview">
                    @else
                        <img src="https://cdn.pixabay.com/photo/2013/07/13/10/44/man-157699_640.png" alt="Foto de perfil" class="image_account" id="profile-preview">
                    @endif
                    <label for="file-input" class="camera_icon">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="file-input" name="image_users" accept="image/*" style="display: none;">
                </figure>
            
                <!-- Campos del formulario -->
                <span class="span_account">
                    <div class="input_update">
                        <input type="text" name="document" class="input_post" value="{{ $user->documento }}" placeholder="1005356567" required>
                        <label class="label_post">Documento:</label>
                    </div>
            
                    <div class="input_update">
                        <input type="text" name="full_name" class="input_post" value="{{ $user->nombre }}" placeholder="Manuel Camilo Bonilla" required>
                        <label class="label_post">Nombre completo:</label>
                    </div>
                    
                    <!-- Campo de teléfono ajustado -->
                    <div class="input_update">
                        <input 
                            type="tel" 
                            name="telefono" 
                            class="input_post" 
                            value="{{ old('telefono', $user->telefono ?? '') }}" 
                            placeholder="3215678901" 
                            required
                            pattern="[0-9]{7,15}"
                            title="Solo números (7-15 dígitos)"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        >
                        <label class="label_post">Teléfono:</label>
                        @error('telefono')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input_update">
                        <input type="email" name="email" class="input_post" value="{{ $user->correo }}" placeholder="mario777@gmail.com" required>
                        <label class="label_post">Correo electrónico:</label>
                    </div>
            
                    <div class="input_update">
                        <input type="password" name="password" class="input_post" placeholder="***********">
                        <i class="fas fa-exchange-alt"></i>
                        <label class="label_post">Contraseña:</label>
                    </div>
            
                    <div class="input_update" id="btn_update">
                        <button type="submit" class="btn_update">Guardar cambios</button>
                    </div>
                </span>
            </form>
        </section>
    </main>

</body>
</html>