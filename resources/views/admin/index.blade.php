<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/admin/style.css">
    <title>AdminHub</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- SIDEBAR -->
    @include('layouts.sidebar')
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
        </nav>

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
                                <th>No</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentOrders as $index => $cart)
                                <tr class="{{ $index >= 10 ? 'hidden' : '' }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cart->user->name }}</td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ rtrim(rtrim(number_format($cart->weight, 2, '.', ''), '0'), '.') }} gram</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($recentOrders) > 10)
                        <div class="view-more">
                            <button class="view-more-btn" data-target="orders" data-state="more">Lihat
                                Selengkapnya</button>
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
                                <th>No</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentCarts as $index => $cart)
                                <tr class="{{ $index >= 10 ? 'hidden' : '' }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cart->user->name }}</td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>{{ rtrim(rtrim(number_format($cart->weight, 2, '.', ''), '0'), '.') }} gram
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($recentCarts) > 10)
                        <div class="view-more">
                            <button class="view-more-btn" data-target="carts" data-state="more">Lihat
                                Selengkapnya</button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- CHARTS -->
            <div
                style="display: flex; flex-direction: column; align-items: center; padding: 40px 20px; background-color: #f9f9f9;">

                <div
                    style="background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; max-width: 400px; width: 100%; margin-bottom: 40px; text-align: center;">
                    <h3 style="margin-bottom: 5px;">Visualisasi Orders</h3>
                    <p style="font-size: 14px; color: #666; margin-top: 0;">Distribusi Order per User</p>
                    <canvas id="ordersChart" style="width: 100%; height: auto;"></canvas>
                </div>

                <div
                    style="background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; max-width: 400px; width: 100%; text-align: center;">
                    <h3 style="margin-bottom: 5px;">Quantity vs Weight</h3>
                    <p style="font-size: 14px; color: #666; margin-top: 0;">Perbandingan Quantity dan Weight</p>
                    <canvas id="quantityWeightChart" style="width: 100%; height: auto;"></canvas>
                </div>

            </div>


        </main>
    </section>

    <!-- SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const viewMoreButtons = document.querySelectorAll('.view-more-btn');
            viewMoreButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const state = button.dataset.state;
                    const section = button.closest('.order');
                    const rows = section.querySelectorAll('tbody tr');
                    if (state === 'more') {
                        rows.forEach(row => row.classList.remove('hidden'));
                        button.textContent = 'Lihat Lebih Sedikit';
                        button.dataset.state = 'less';
                    } else {
                        rows.forEach((row, index) => {
                            if (index >= 10) row.classList.add('hidden');
                        });
                        button.textContent = 'Lihat Selengkapnya';
                        button.dataset.state = 'more';
                    }
                });
            });

            const menuToggle = document.querySelector('.bx-menu');
            const sidebar = document.querySelector('#sidebar');
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hide');
            });
        });

        const orderData = @json($recentOrders);
        const userMap = {};
        let quantityData = 0;
        let weightData = 0;

        orderData.forEach(order => {
            const name = order.user.name;
            userMap[name] = (userMap[name] || 0) + 1;
            quantityData += order.quantity;
            weightData += parseFloat(order.weight);
        });

        // Doughnut Chart: Order per User
        new Chart(document.getElementById('ordersChart'), {
            type: 'doughnut',
            data: {
                labels: Object.keys(userMap),
                datasets: [{
                    label: 'Jumlah Order',
                    data: Object.values(userMap),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribusi Order per User (Doughnut Chart)'
                    }
                }
            }
        });

        // Pie Chart: Quantity vs Weight
        new Chart(document.getElementById('quantityWeightChart'), {
            type: 'pie',
            data: {
                labels: ['Total Quantity', 'Total Weight (gram)'],
                datasets: [{
                    label: 'Total',
                    data: [quantityData, weightData],
                    backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Perbandingan Quantity dan Weight (Pie Chart)'
                    }
                }
            }
        });
    </script>
</body>

</html>
