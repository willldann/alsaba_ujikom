<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dendeng Shop menawarkan dendeng ayam dan sapi premium dengan promo spesial hingga 50% diskon.">
    <meta name="keywords" content="dendeng ayam, dendeng sapi, makanan premium, promo dendeng">
    <meta name="author" content="Dendeng Shop">
    <title>Dendeng Ayam & Sapi Premium - Dendeng Shop</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    @include('layouts.navbar')

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-text">
            <h4>Selamat Datang di Dendeng Shop</h4>
            <h1>Promo Spesial Dendeng Premium</h1>
            <h2>Diskon Hingga <span>50%</span>!</h2>
            <p>Manfaatkan kesempatan ini hanya di bulan ini!</p>
            <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
        </div>
    </section>

    <section class="keunggulan">
        <h2>Kenapa Memilih Kami?</h2>
        <div class="features">
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h3>Gratis Ongkir</h3>
                <p>Pengiriman gratis untuk seluruh Indonesia.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shopping-cart"></i>
                <h3>Pesan Online</h3>
                <p>Pemesanan mudah melalui website kami.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Hemat Biaya</h3>
                <p>Harga terbaik dengan kualitas premium.</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-tag"></i>
                <h3>Promo Menarik</h3>
                <p>Diskon dan penawaran spesial setiap bulan.</p>
            </div>
        </div>
    </section>

    <section class="our-products">
        <h2>Produk Terlaris Kami</h2>
        <div class="product-container">
            <div class="product">
                <img src="/assets/dendeng-manis.jpg" alt="Dendeng Sapi" loading="lazy">
                <h3>Dendeng Sapi</h3>
                <p>Rp 50.000</p>
                <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
            </div>
            <div class="product">
                <img src="/assets/dendeng-pedas.jpg" alt="Dendeng Ayam" loading="lazy">
                <h3>Dendeng Ayam</h3>
                <p>Rp 50.000</p>
                <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buyButtons = document.querySelectorAll('.buy-btn');
            buyButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    const product = button.closest('.product');
                    const productName = product.querySelector('h3').textContent;
                    const productPrice = product.querySelector('p').textContent.replace('Rp ', '').replace('.', '');
                    const productImage = product.querySelector('img').src;

                    localStorage.setItem('selectedProduct', JSON.stringify({
                        name: productName,
                        price: parseInt(productPrice),
                        image: productImage
                    }));
                    window.location.href = 'detail_produk.html';
                });
            });
        });
    </script>
</body>
</html>