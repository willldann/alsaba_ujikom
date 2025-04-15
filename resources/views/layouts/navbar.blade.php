<link rel="stylesheet" href="/css/navbar.css">

<header>
    <div class="logo">Dendeng<span>Shop</span></div>

    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="hamburger">&#9776;</label>

    <nav>
        <ul>
            <li><a href="{{ url('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ url('product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Product</a></li>
            <li><a href="{{ url('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ url('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            <li><a href="{{ url('cart') }}">🛒 Cart</a></li>

            @auth
                <li>Halo, {{ Auth::user()->name }}!</li>
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <li><a href="#" onclick="document.getElementById('logout-form').submit(); return false;">Logout</a></li>
                </form>
            @endauth

            @guest
                <li><a href="{{ url('login') }}" onclick="openModal('loginModal')">Login</a></li>
            @endguest
        </ul>
    </nav>
</header>
