@vite('resources/scss/layout/dashboard/nav_dashboard.scss')
@vite('resources/js/pages/dashboard.js')

<nav class="darkshop dashboard_nav">

    <ul class="option_nav">

        <a class="item_nav" href="{{ auth()->check() && auth()->user()->id_rol == 2 ? route('buyer.index') : '#' }}">
            <button class="btn_nav" id="add">
                <i class="fas fa-shopping-cart"></i> AÑADIR
            </button>
        </a>

        <!-- Opción 2: PRODUCTOS -->
        <li class="item_nav">
            <button class="btn_nav" id="productos">PRODUCTOS</button>
        </li>

        <!-- Opción 3: PEDIDOS -->
        <li class="item_nav">
            <button class="btn_nav" id="pedidos">PEDIDOS</button>
        </li>

        <!-- Opción 4: HISTORIAL -->
        <li class="item_nav">
            <button class="btn_nav" id="historial">HISTORIAL</button>
        </li>

        <!-- Opción 5: CUENTA -->
        <li class="item_nav">
            <button class="btn_nav" id="cuenta">CUENTA</button>
        </li>

        <!-- Opción 8: CERRAR SESIÓN -->
        <li class="item_nav">
            <form action="{{ url('/dashboard/logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn_nav" onclick="event.stopPropagation();">CERRAR SESIÓN</button>
            </form>
        </li>
    </ul>
</nav>