<!-- File: resources/views/layouts/sidebar.blade.php -->
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<section id="sidebar">
    <!-- Brand Section -->
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>

    <!-- Top Menu Items -->
    <ul class="side-menu top">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-home'></i>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.my_store') ? 'active' : '' }}">
            <a href="{{ route('admin.my_store') }}">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">My Store</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}">
                <i class='bx bxs-group'></i>
                <span class="text">User</span>
            </a>
        </li>
    </ul>

    <!-- Logout Section -->
    <ul class="side-menu">
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</section>
