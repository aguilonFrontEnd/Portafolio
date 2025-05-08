@vite('resources/scss/layout/dashboard/header_dashboard.scss')

<header class="darkshop dashboard_header">
    <span class="span_header">
        <!-- Botón de retroceso dinámico -->
        <a href="{{ auth()->check() ? (auth()->user()->id_rol == 1 ? route('vendor.index', ['id' => auth()->id()]) : route('buyer.index')) : '#' }}" 
           class="back-link">
            <i class="fas fa-arrow-left"></i>
        </a>

        <h1 class="span_h1">DARSHOP</h1>
    </span>

    @auth
    <figure class="figure_header">
        <!-- Imagen de perfil con redirección dinámica -->
        <a href="{{ auth()->user()->id_rol == 1 ? route('vendor.dashboard') : route('buyer.dashboard') }}">
            @if(auth()->user()->foto_perfil)
                <img src="{{ auth()->user()->foto_perfil }}" alt="Imagen de perfil" class="image_figure">
            @else
                <img src="https://cdn.pixabay.com/photo/2013/07/13/10/44/man-157699_640.png" alt="Imagen de perfil" class="image_figure">
            @endif
        </a>
    </figure>
    @endauth
</header>