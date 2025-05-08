<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- LINK DE FONT AWESONE PARA ICONOS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    {{-- LINK DEL COPILADOR DE VITE --}}
    @vite(['resources/scss/roles/buyer/buyer_dashboard.scss'])
    @vite('resources/js/pages/dashboard.js')


    <title>Panel Comprador - DarkShop</title>

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

           
                  
        </section>
        
        {{-- Seccion de pedidos de compras del comprador en la darkshop --}}
        <section class="section section_products">

                 

        </section>

        {{-- Seccion de pedidos de compras del comprador en la darkshop --}}
        <section class="section section_order">

        

        </section>

        {{-- Seccion de historial de pasos del vendedor en la darkshop --}}
        <section class="section section_history">

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