<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dendeng Ayam Premium</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    @include('layouts.navbar')

    <section class="hero">
        <div class="hero-text">
            <h4>Selamat Datang di Dendeng Shop</h4>
            <h1>Promo Spesial Dendeng Ayam</h1>
            <h2>Diskon Hingga <span>50%</span>!</h2>
            <p>Jangan lewatkan kesempatan ini, hanya di bulan ini!</p>
            <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
        </div>
    </section>


    <section class="keunggulan">
        <div class="features">
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h3>Free Shipping</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-shopping-cart"></i>
                <h3>Online Order</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Save Money</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-tag"></i>
                <h3>Promotions</h3>
            </div>
        </div>
    </section>

    <section class="our-products">
        <h2>Our Products</h2>
        <div class="product-container">
            <div class="product">
                <img src="/assets/dendeng-manis.jpg" alt="Dendeng Sapi">
                <h3>Dendeng Sapi</h3>
                <p>Rp 50.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
            <div class="product">
                <img src="/assets/dendeng-pedas.jpg" alt="Dendeng Ayam">
                <h3>Dendeng Ayam</h3>
                <p>Rp 45.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
            <div class="product">
                <img src="/assets/dendeng-manis.jpg" alt="Dendeng Pedas">
                <h3>Dendeng Pedas</h3>
                <p>Rp 55.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <script>
        function goToDetailPage(event) {
            let button = event.target;
            let product = button.closest('.product');
            let productName = product.querySelector('h3').innerText;
            let productPrice = product.querySelector('p').innerText.replace('Rp ', '').replace('.', '');
            let productImage = product.querySelector('img').src;
            localStorage.setItem('selectedProduct', JSON.stringify({
                name: productName,
                price: parseInt(productPrice),
                image: productImage
            }));
            window.location.href = 'detail_produk.html';
        }
        document.addEventListener('DOMContentLoaded', function() {
            let buyButtons = document.querySelectorAll('.buy-btn');
            buyButtons.forEach(button => {
                button.addEventListener('click', goToDetailPage);
            });
        });
    </script>
</body>

</html>
