@vite('resources/scss/layout/categories/header_category.scss')

<header class="header_category">

    <a class="categories_a" href="{{ auth()->user()->id_rol == 1 ? route('vendor.index') : route('buyer.index') }}">
        <i class="fas fa-arrow-left"></i> <!-- Icono de flecha hacia atrás -->
    </a>

    <h1 class="categories_h1">Visualizar {{ ucfirst($categoria) }}</h1>
    
</header>