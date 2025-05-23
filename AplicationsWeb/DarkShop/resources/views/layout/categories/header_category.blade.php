@vite('resources/scss/layout/categories/header_category.scss')

<header class="header_category">

    @if(auth()->user()->id_rol == 2)
        <a class="categories_a" href="{{ route('buyer.index') }}">
            <i class="fas fa-arrow-left"></i>
        </a>
    @endif

    <h1 class="categories_h1">Visualizar {{ ucfirst($categoria) }}</h1>

</header>
