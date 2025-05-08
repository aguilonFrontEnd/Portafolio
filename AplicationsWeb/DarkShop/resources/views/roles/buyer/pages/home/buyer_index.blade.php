<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/scss/roles/buyer/buyer_index.scss'])
    @vite('resources/js/pages/index.js')

    {{-- Link de fontAwesone para iconos  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <title>Comprador - DarkShop</title>
</head>
<body>
    
        {{-- Banner de ventajas de la darkshop --}} 
        <span class="span_introduction">
            @include('layout.index.banner_index')
        </span>

        {{-- Encabezado de la darkshop --}}
        <header class="header_introduction">
            @include('layout.index.header_index')
        </header>

        {{-- Carrusel de la plataforma darkshop --}}
        <figure class="figure_introduction">
            @include('layout.index.carrusel_index')
        </figure>


    {{-- Section de productos en outlet de la darkshop --}}
    <section class="section section_outlet ">

        <div class="container_outlet">
            @foreach ($productosOutlet as $producto)
                <span class="span_outlet">
                    <figure class="figure_outlet">
                        <img src="{{ $producto->foto_prenda }}" alt="{{ $producto->nombre }}" class="image_outlet">
                        <div class="container_cart">
                            <button type="button">Comprar</button>
                            <i class="fas fa-cart-plus"></i> {{-- Carro de compra --}}
                        </div>
                    </figure>

                    <div class="outlet_dates">
                        <div class="outlet_name">
                            <h3 class="outlet_h3">{{ $producto->nombre }}</h3>
                            <p class="outlet_p">{{ $producto->marca }}</p>
                        </div>
                        <p class="outlet_price">{{ number_format($producto->precio) }} <strong>CO</strong></p>
                    </div>
                </span>
            @endforeach
        </div>

        <span class="span_oulet">
            <!-- Contenedor del track del carrusel -->
            <div class="carrusel-track">
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 1" class="image_outlet">
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 2" class="image_outlet">
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 3" class="image_outlet">
              <!-- Duplicados -->
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 1" class="image_outlet">
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 2" class="image_outlet">
              <img src="https://www.tricorp.com/Admin/Public/GetImage.ashx?Image=/ProductData/Images/ProductImageProductDetail01/127e74f8-24ef-4142-9e4b-e9716dd9c2b8.png&Crop=7&Format=png&Quality=90&Compression=80&Width=1000" alt="Descripción 3" class="image_outlet">
            </div>
        </span>

    </section>

      {{-- Section de comunidad de la darkshop --}}
      <section class="section section_comunity">

        <article class="article_comunity">

            <h2 class="comunity_h2">Bienvenido a la DarkShop</h2>

            <p class="comunity_p">DarkShop es una tienda online exclusiva dedicada a la ropa negra,
                diseñada para quienes encuentran estilo en la simplicidad. Nuestra propuesta
                combina comodidad, elegancia y minimalismo, ofreciendo prendas pensadas para personas que no 
                buscan definirse por la moda, sino por su autenticidad. En nuestra plataforma 
                encontrarás una experiencia de compra ágil, con envíos rápidos y todos los medios de 
                pago disponibles.
            </p>

        </article>

    </section>

    {{-- Section categorias de la darkshop --}}
    <section class="section section_category">

        <figure class="figure_category">
            <img src="https://img.freepik.com/fotos-premium/grupo-personas-vestidas-negro-edificio-al-fondo_662214-178012.jpg" alt="" class="image_category">
        </figure>

        <main class="main_category">
            @foreach($categorias as $categoria)
                <article class="article_category">
                    <h4 class="article_h5">{{ $categoria->nombre }}</h4>
                    <a href="{{ route('categorias.show', $categoria->nombre) }}" class="article_btn"> Ver más </a>
                </article>
            @endforeach
        </main>

        <span class="container_category">
            <img src="https://i.pinimg.com/736x/50/4e/9f/504e9f12293244cddad0154025317102.jpg" alt="" class="image_category">
            <img src="https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202501/03/00188241500383____2__967x1200.jpg" alt="" class="image_category">
            <img src="https://static.dafiti.com.co/p/chevignon-5361-4954642-4-zoom.jpg" alt="" class="image_category">
            <img src="https://i.pinimg.com/736x/cd/55/69/cd55697ca897add5f0e8310b6f43849b.jpg" alt="" class="image_category">
            <img src="https://dcdn.mitiendanube.com/stores/539/463/products/jerson-negro-10-e5673e1cd2db38d04c17254686661877-480-0.jpg" alt="" class="image_category">
        </span>

    </section>

    {{-- Section de publicidad de la darkshop --}}
    <section class="section section_services">

        {{-- Control de calidad de las prendas --}}
        <article class="article_services">
            <img src="https://cdn-icons-png.flaticon.com/512/1326/1326677.png" alt="" class="image_services">
            <p class="services_p"> En DarkShop te ofrecemos una línea de prendas superiores confeccionadas con 
                materiales de alta calidad, pensadas para quienes buscan comodidad sin renunciar a la estética. 
                Cada prenda está diseñada para adaptarse a tu estilo de vida, con cortes limpios, tejidos 
                duraderos y una elegancia discreta que transmite seguridad en cada uso.
            </p>
        </article>

        {{-- Cobertura a nivel nacional --}}
        <article class="article_services">
            <img src="https://cdn-icons-png.flaticon.com/512/286/286112.png" alt="" class="image_services">
            <p class="services_p">En DarkShop contamos con cobertura de envíos a nivel nacional, lo que garantiza 
                que sin importar en qué parte del país te encuentres, tus productos llegarán a tu puerta de 
                forma segura, puntual y en perfectas condiciones. Ofrecemos tiempos de entrega ágiles, 
                seguimiento y empaques diseñados para proteger cada prenda durante el traslado. 
            </p>
        </article>
        
        {{-- Soporte el los productos averiados --}}
        <article class="article_services">
            <img src="https://cdn-icons-png.freepik.com/512/81/81117.png" alt="" class="image_services">
            <p class="services_p"> Nuestro servicio de soporte en la aplicación está diseñado para 
                brindarte asistencia rápida, clara y eficiente en todo momento. técnico, nuestro equipo de 
                atención está disponible para responderte directamente desde la app.
                Hemos integrado canales de contacto accesibles y funcionales para que tu experiencia sea fluida y 
                segura.
            </p>
        </article>
        

    </section>

    {{-- Section banner de imagenes de contexto de la darkshop --}}
    <section class="section section_banner">

        <img src="https://s2.abcstatics.com/media/bienestar/2022/02/19/perchero-ropa-negra-km0F--1248x698@abc.jpg" alt="" class="image_event">

    </section>

    {{-- Section de conjuntos de la darkshop --}}
    <section class="section section_sets">

        <div class="container_sets">

            <span class="span_sets">
                <h3 class="span_h3">D A R K S H O P</h3>
            </span>

            <figure class="figure_span">

                <p class="span_p">NEW</p>
                    <img src="https://highxtar.com/wp-content/uploads/2023/07/thumb-nike-nocta-fleece-1440x1080.jpg" alt="" class="image_span">
                <p class="span_p">NEW</p>

            </figure>

            <span class="span_sets">
                <h3 class="span_h3"> C O N J U N T O S </h3>
            </span>
        </div>

        <span class="redirect_span">
            <p class="redirect_p">-------------------------------- <button type="button" class="redirect_btn">Ver más</button> -------------------------------- </p>
        </span>
    </section>

    {{-- Section de pie de pagina de la darkshop --}}
    <section class="section section_footer">

        <div class="span_email">

            <figure class="figure_email">
                <img src="https://www.sevenseven.com/dw/image/v2/BHFM_PRD/on/demandware.static/-/Sites-SevenSeven-Library/default/dw7adbd452/ENVIOGRATISCAMPA%C3%91A.png" alt="" class="image_email">
            </figure>

            <form action="" method="POST" class="form_email">

                <input type="text" class="input_email" placeholder="Ingrese su dirección electronica">
                <button type="submit" class="btn_email">Recibir Notificaciones</button>

            </form>
        </div>

        <footer class="container_footer">

            <span class="span_footer">
                <h3 class="footer_h3">DARKSHOP</h3>
                <p class="footer_p">
                    <strong>Ecommerce</strong> realizado como prueba para acumular el aprendizaje 
                    en laravel el manejo de sus rutas y demas funcionalidades.
                </p>
        
                <div class="footer_media">
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://wa.me/1234567890" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:contacto@tusitio.com"><i class="fas fa-envelope"></i></a>
                </div>
        
                <h3 class="footer_h3">Grupo Conecta</h3>
            </span>
        
            <span class="span_footer">
                <h5 class="footer_h5">Productos</h5>
                <a href="/sobre-nosotros" class="footer_a">Gorras</a>
                <a href="/sobre-nosotros" class="footer_a">Camisetas</a>
                <a href="/sobre-nosotros" class="footer_a">Camisillas</a>
                <a href="/sobre-nosotros" class="footer_a">Chaquetas</a>
                <a href="/sobre-nosotros" class="footer_a">Pantalones</a>
                <a href="/sobre-nosotros" class="footer_a">Zapatos</a>
                <a href="/sobre-nosotros" class="footer_a">Zapatillas</a>

            </span>
        
            <span class="span_footer">
                <h5 class="footer_h5">Compañia</h5>
                <a href="/preguntas-frecuentes" class="footer_a">Nosotros</a>
                <a href="/preguntas-frecuentes" class="footer_a">Sitio web</a>
                <a href="/preguntas-frecuentes" class="footer_a">Proyectos</a>
                <a href="/preguntas-frecuentes" class="footer_a">Misión</a>
                <a href="/preguntas-frecuentes" class="footer_a">Visión</a>
            </span>
        
            <span class="span_footer">
                <h5 class="footer_h5">Políticas</h5>
                <a href="/politica-de-privacidad" class="footer_a">Política de privacidad</a>
                <a href="/politica-de-cookies" class="footer_a">Política de cookies</a>
                <a href="/terminos-y-condiciones" class="footer_a">Términos y condiciones</a>
                <a href="/politica-de-devoluciones" class="footer_a">Política de devoluciones</a>
            </span>
        
            <span class="span_footer">
                <h5 class="footer_h5">legales</h5>
                <a href="/terminos-y-condiciones" class="footer_a">Términos y condiciones</a>
                <a href="/aviso-legal" class="footer_a">Aviso legal</a>
                <a href="/uso-del-sitio" class="footer_a">Condiciones de uso</a>
                <a href="/propiedad-intelectual" class="footer_a">Propiedad intelectual</a>
                <a href="/propiedad-intelectual" class="footer_a">Cerrar Sesión</a>
            </span>
            
        
        </footer>
        

        <div class="copy_footer">
            <p class="footer_p">&copy; 2025 <strong>Grupo Conecta</strong>. Todos los derechos reservados de la DarkShop.</p>
        </div>

    </section>

</body>
</html>