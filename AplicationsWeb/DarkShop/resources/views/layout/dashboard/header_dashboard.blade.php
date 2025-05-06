@vite('resources/scss/layout/dashboard/header_dashboard.scss')

{{-- CONTENEDOR PADDRE DEL DASHBOARD --}}
<header class="darkshop dashboard_header">

    {{-- CONETENEDOR DE INFORMACION DE LA PLATAFORMA --}}
    <span class="span_header">

        {{-- Icono de volver atrás con enlace a indexVendor --}}
        <a href="{{ route('vendor.index', ['id' => auth()->user()->id]) }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
        </a>

        {{-- Titulo de la plataforma --}}
        <h1 class="span_h1">DARSHOP</h1>

    </span>

    {{-- CONTENEDOR DE LA FOTO DE PERFIL DEL USUARIO LOGUEADO --}}
    <figure class="figure_header">
        {{-- Imagen de perfil desde la base de datos --}}
        @if(auth()->user()->foto_perfil)
            <img src="{{ auth()->user()->foto_perfil }}" alt="Imagen de perfil" class="image_figure">
        @else
            <img src="https://cdn.pixabay.com/photo/2013/07/13/10/44/man-157699_640.png" alt="Imagen de perfil" class="image_figure">
        @endif
    </figure>

</header>