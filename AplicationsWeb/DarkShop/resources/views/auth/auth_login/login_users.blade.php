<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      {{-- LINK DE FONT AWESONE PARA ICONOS --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
      {{-- LINK DEL COPILADOR DE VITE --}}
      @vite(['resources/scss/auth/auth_login.scss'])
      @vite(['resources/js/auth/auth_login.js'])
  

    <title>Inicio Sesion - DarkShop</title>
</head>
<body>
    
    {{-- Contenedor del formulario de inicio de sesion de vendor y buyer --}}
    <main class="container_main">

        <figure class="figure_main">

            <video source src="{{ asset('asset/film/vid_login.mp4') }}" type="video/mp4" class="vid_login" autoplay loop muted>
                Tu navegador no soporta la etiqueta de video. class="vid_login" autoplay loop muted
            </video>
            
        </figure>

        <article class="article_main">

            {{-- Formulario de inicio de sesion de la DarkShop --}}
            <form action="{{ route('loginUser') }}" method="POST" class="form_login">
                @csrf
                <input type="hidden" name="id_rol" id="rolInput" value="2">
            
                <span class="span_login btn_roles">
                    <button type="button" class="btn_rol" id="btnVendedor">Vendedor</button>
                    <button type="button" class="btn_rol" id="btnComprador">Comprador</button>
                </span>
            
                <span class="span_login document_post">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su documento:</label>
                        <input type="text" class="input_post" name="document" required>
                        <div class="document-error" style="display: none;">Por favor, ingrese su documento</div> <!-- Error de vacío -->
                        <div class="document-format-error" style="display: none;">El documento no es válido</div> <!-- Error de formato -->
                    </div>
                </span>
            
                <span class="span_login password_post">
                    <div class="input_dates">
                        <label for="" class="label_post">Ingrese su contraseña:</label>
                        <input type="password" class="input_post" name="password" required>
                        <div class="password-error" style="display: none;">Por favor, ingrese su contraseña</div> <!-- Error de vacío -->
                        <div class="password-format-error" style="display: none;">La contraseña es incorrecta</div> <!-- Error de formato -->
                    </div>
                </span>
            
                <span class="span_login btn_post">
                    <button type="submit" class="btn_sesion">Iniciar Sesión</button>
                </span>
            
                <span class="span_login register_post">
                    <p class="register_p">¿Aún no tienes cuenta? <a href="{{ url('sesion/register') }}" class="register_a">Regístrate aquí</a></p>
                </span>
            </form>
            

        </article>

    </main>

</body>
</html>