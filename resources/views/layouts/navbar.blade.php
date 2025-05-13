<link rel="stylesheet" href="/css/navbar.css">

<header>
    <div class="logo">Al-<span>Saba</span></div>

    <!-- Checkbox untuk toggle menu hamburger -->
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="hamburger">&#9776;</label>

    <!-- Navbar Menu -->
    <nav>
        <ul>
            @guest
                <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Product</a></li>
                <li><a href="{{ url('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ url('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                <li><a href="{{ url('cart') }}" class="{{ Request::is('cart') ? 'active' : '' }}">🛒 Cart</a></li>
                <li><a href="{{ url('login') }}" onclick="openModal('loginModal')">Login</a></li>
            @endguest

            @auth
                @if (Auth::user()->role == 'admin')
                    <li><a href="{{ url('admin/dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">Admin Dashboard</a></li>
                @elseif (Auth::user()->role == 'user')
                    <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ url('product') }}" class="{{ Request::is('product') ? 'active' : '' }}">Product</a></li>
                    <li><a href="{{ url('about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ url('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                    <li><a href="{{ url('cart') }}" class="{{ Request::is('cart') ? 'active' : '' }}">Cart</a></li>
                @endif

                <li><a href="#">Halo, {{ Auth::user()->name }}!</a></li>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <li><a href="#" onclick="document.getElementById('logout-form').submit(); return false;">Logout</a></li>
                </form>
            @endauth
        </ul>
    </nav>
</header>
