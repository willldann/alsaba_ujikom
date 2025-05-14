<header>
    <div class="logo">Dendeng<span>Shop</span></div>
    <nav>
        <ul>
            <li><a href="dashboard" class="active">Home</a></li>
            <li><a href="product">Shop</a></li>
            <li><a href="about">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="cart.html">🛒 Cart</a></li>
            @auth
                <p>Halo, {{ Auth::user()->name }}!</p>
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <li><a href="#" onclick="document.getElementById('logout-form').submit(); return false;">Logout</a></li>
                </form>
                
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form> --}}
            @endauth

            @guest
            <li><a href="login" onclick="openModal('loginModal')">Login</a></li>
            @endguest
        </ul>
    </nav>
</header>