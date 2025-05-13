{{-- <!DOCTYPE html>
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
            <h4>Selamat Datang di Al-saba</h4>
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
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dendeng Ayam Premium - Al-saba</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/home.css">


  @vite([])
</head>

<body>

  <!-- Navbar -->
  @include('layouts.navbar')

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Promo Spesial <span>Dendeng Ayam</span></h1>
      <p>Diskon Hingga 50%! Jangan lewatkan kesempatan ini, hanya di bulan ini!</p>
      <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section">
    <div class="about-content">
      <h2>Kenapa Pilih Kami?</h2>
      <p>Di Al-saba, kami menyediakan dendeng ayam premium yang lezat dan berkualitas tinggi, dibuat dengan bahan terbaik untuk rasa autentik dan sehat.</p>
      <a href="{{ route('users.product') }}" class="btn">Lihat Sekarang</a>
    </div>
    <div class="about-image">
      <img src="/assets/logo.jpeg" alt="Dendeng Ayam">
    </div>
  </section>

  <!-- Menu Highlights Section -->
  <section class="menu-highlights">
    <h2>Kami Selalu Ada untuk Anda</h2>
    <div class="menu-grid">
      <div class="menu-item">
        <img src="/assets/dendeng-manis.jpg" alt="Dendeng Ayam Original">
        <h3>Dendeng Ayam Original</h3>
        <p>Rasa autentik dengan bumbu tradisional. Mulai dari Rp50.000</p>
        <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
      </div>
      <div class="menu-item">
        <img src="/assets/dendeng-pedas.jpg" alt="Dendeng Ayam Pedas">
        <h3>Dendeng Ayam Pedas</h3>
        <p>Pedas menggigit untuk pecinta tantangan. Mulai dari Rp50.000</p>
        <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
      </div>
    </div>
  </section>


  <!-- Testimonial Section -->
  <section class="testimonial">
    <h2>Testimoni Pelanggan</h2>
    <div class="carousel">
      <div class="slides">
        <div class="slide">
          <p>"Dendeng ayam Al-saba benar-benar lezat! Rasa autentik dan kualitasnya luar biasa. Saya pasti akan pesan lagi!"</p>
          <p class="author">- Rina Wulandari</p>
        </div>
        <div class="slide">
          <p>"Pelayanan cepat dan dendengnya enak banget! Cocok untuk oleh-oleh atau makan sehari-hari."</p>
          <p class="author">- Budi Santoso</p>
        </div>
        <div class="slide">
          <p>"Varian pedasnya juara! Rasanya pas, tidak terlalu pedas tapi tetap nendang."</p>
          <p class="author">- Siti Aminah</p>
        </div>
      </div>
      <div class="nav">
        <button onclick="moveSlide(-1)">❮</button>
        <button onclick="moveSlide(1)">❯</button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('layouts.footer')

  <script>
    // Hamburger Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });

    // Testimonial Carousel
    let currentSlide = 0;
    const slides = document.querySelector('.testimonial .slides');
    const totalSlides = document.querySelectorAll('.testimonial .slide').length;

    function moveSlide(direction) {
      currentSlide += direction;
      if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
      } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
      }
      slides.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Auto-slide every 5 seconds
    setInterval(() => {
      moveSlide(1);
    }, 5000);
  </script>
</body>
</html>