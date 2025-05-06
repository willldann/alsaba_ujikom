<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/admin/style.css">
    <title>AdminHub</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ route('dashboard') }}" aria-current="page">
                    <i class='bx bxs-home'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.my_store') }}">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">My Store</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">User</span>
                </a>
            </li>            
        </ul>
        <ul class="side-menu">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout" style="all: unset; cursor: pointer; display: flex; align-items: center;">
                        <i class='bx bxs-log-out-circle'></i>
                        <span class="text">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu' aria-label="Toggle Sidebar"></i>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Orders</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $index => $cart)
                                <tr class="{{ $index >= 10 ? 'hidden' : '' }}">
                                    <td>
                                        <p>{{ $cart->user->name }}</p>
                                    </td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ rtrim(rtrim(number_format($cart->weight, 2, '.', ''), '0'), '.') }} gram</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($recentOrders) > 10)
                        <div class="view-more">
                            <button class="view-more-btn" data-target="orders" data-state="more">Lihat Selengkapnya</button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Carts</h3>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentCarts as $index => $cart)
                                <tr class="{{ $index >= 10 ? 'hidden' : '' }}">
                                    <td>
                                        <p>{{ $cart->user->name }}</p>
                                    </td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ rtrim(rtrim(number_format($cart->weight, 2, '.', ''), '0'), '.') }} gram</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($recentCarts) > 10)
                        <div class="view-more">
                            <button class="view-more-btn" data-target="carts" data-state="more">Lihat Selengkapnya</button>
                        </div>
                    @endif
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Handle View More/Less Buttons
            const viewMoreButtons = document.querySelectorAll('.view-more-btn');

            viewMoreButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const target = button.dataset.target;
                    const state = button.dataset.state;
                    const rows = document.querySelectorAll(`.table-data .order table tbody tr${target === 'orders' ? '' : '[data-target="carts"]'}`);

                    if (state === 'more') {
                        // Show all rows
                        rows.forEach(row => row.classList.remove('hidden'));
                        button.textContent = 'Lihat Lebih Sedikit';
                        button.dataset.state = 'less';
                    } else {
                        // Show only top 10 rows
                        rows.forEach((row, index) => {
                            if (index >= 10) {
                                row.classList.add('hidden');
                            }
                        });
                        button.textContent = 'Lihat Selengkapnya';
                        button.dataset.state = 'more';
                    }
                });
            });

            // Toggle Sidebar
            const menuToggle = document.querySelector('.bx-menu');
            const sidebar = document.querySelector('#sidebar');
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hide');
            });
        });
    </script>
</body>
</html>