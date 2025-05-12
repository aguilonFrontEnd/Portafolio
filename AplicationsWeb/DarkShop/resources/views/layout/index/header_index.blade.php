@vite(['resources/scss/layout/index/header_index.scss'])


{{-- Encabezado de la darkshop --}}
<div class="header_introduction_layout">

<h1 class="header_h1">DARKSHOP</h1>

<nav class="header_nav">

    <button type="button" class="btn_nav">Inicio</button>
    <button type="button" class="btn_nav">Outlet</button>
    <button type="button" class="btn_nav">Categorias</button>
    <button type="button" class="btn_nav">Servicios</button>
    <button type="button" class="btn_nav">Conjuntos</button>
    <button type="button" class="btn_nav">Contacto</button>
</nav>

<figure class="header_figure">

    <a href="{{ route('vendor.dashboard') }}" class="profile-link">
        @auth
            @if(auth()->user()->foto_perfil)
                <img src="{{ auth()->user()->foto_perfil }}" 
                     alt="Foto de {{ auth()->user()->nombre }}" 
                     class="image_figure">
            @else
                <img src="{{ asset('images/default-profile.jpg') }}" 
                     alt="Foto por defecto" 
                     class="image_figure">
            @endif
        @else
            <img src="{{ asset('images/default-profile.jpg') }}" 
                 alt="Usuario no autenticado" 
                 class="image_figure">
        @endauth
    </a>
</figure>

</header>