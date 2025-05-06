<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      {{-- LINK DE FONT AWESONE PARA ICONOS --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
      {{-- LINK DEL COPILADOR DE VITE --}}
      @vite(['resources/scss/auth/auth_register.scss'])
      @vite(['resources/js/auth/auth_login.js'])

    <title>Registro - DarkShop</title>
</head>
<body>
    
    {{-- Contenedor del formulario de inicio de sesion de vendor y buyer --}}
    <main class="container_main">

        <article class="article_main">

            {{-- Formulario de inicio de sesion de la DarkShop --}}
            <form action="{{ route('registerUser') }}" method="POST" class="form_register">
                @csrf
                <input type="hidden" name="id_rol" id="rolInput" value="2">
            
                <span class="span_register btn_roles">
                    <button type="button" class="btn_rol" id="btnVendedor">Vendedor</button>
                    <button type="button" class="btn_rol" id="btnComprador">Comprador</button>
                </span>

                <span class="span_register">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su documento:</label>
                        <input type="text" class="input_post" name="documento">
                        <div class="document-error" style="display: none;">Por favor, ingrese su documento</div>
                        <div class="document-format-error" style="display: none;">El documento no es válido</div>
                    </div>
                </span>
            
                <span class="span_register">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su nombre completo:</label>
                        <input type="text" class="input_post" name="nombre">
                        <div class="name-error" style="display: none;">Por favor, ingrese su nombre</div>
                        <div class="name-format-error" style="display: none;">El nombre no es válido</div>
                    </div>
                </span>
            
                <span class="span_register">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su correo:</label>
                        <input type="email" class="input_post" name="correo">
                        <div class="email-error" style="display: none;">Por favor, ingrese un correo válido</div>
                        <div class="email-format-error" style="display: none;">El formato del correo es incorrecto</div>
                    </div>
                </span>
            
                <span class="span_register">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su contraseña:</label>
                        <input type="password" class="input_post" name="contraseña">
                        <div class="password-error" style="display: none;">Por favor, ingrese su contraseña</div>
                        <div class="password-format-error" style="display: none;">La contraseña debe tener al menos 8 caracteres</div>
                    </div>
                </span>
            
                <span class="span_register btn_post">
                    <button type="submit" class="btn_sesion">Registrarse</button>
                </span>
            </form>
            
        </article>

        <figure class="figure_main">

            <video source src="{{ asset('asset/film/vid_register.mp4') }}" type="video/mp4" class="vid_login" autoplay loop muted>
                Tu navegador no soporta la etiqueta de video. class="vid_login" autoplay loop muted
            </video>
            
        </figure>

     </main>

</body>
</html>