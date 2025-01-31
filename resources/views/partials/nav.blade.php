<header class="header-admin">
    
    @if(Auth::check())
    <nav>
        @if(Auth::user()->role == 'admin')
        <ul>
            <li><a href="{{route('admin_cartas')}}">Cartas</a></li>
            <li><a href="{{route('pedidos')}}">Pedidos</a></li>
            <li><a href="{{route('logout')}}">Cerrar Sesión ({{Auth::user()->name}})</a></li>
        </ul>
        @else
        <ul>
            <li><a href="{{route('catalogo')}}">Catalogo</a></li>
            <li><a href="{{route('carrito.index')}}">Carrito</a></li>
            <li><a href="{{route('logout')}}">Cerrar Sesión ({{Auth::user()->name}})</a></li>
        </ul>
        @endif
    </nav>
    @endif
</header>