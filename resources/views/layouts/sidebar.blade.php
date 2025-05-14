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
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout"
                    style="display: flex; align-items: center; gap: 8px; background: #dc3545; color: #ffffff; border: none; border-radius: 5px; font-size: 16px; font-family: 'Poppins', sans-serif; cursor: pointer; transition: background 0.3s ease, transform 0.2s ease; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    <i class='bx bxs-log-out-circle' style="font-size: 18px;"></i>
                    <span class="text" style="font-weight: 400;">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</section>
