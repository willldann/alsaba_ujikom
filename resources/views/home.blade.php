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
      <div class="rating">⭐ 4.8/5 by 2k+ customers</div>
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
        <p>Pedas menggigit untuk pecinta tantangan. Mulai dari Rp55.000</p>
        <a href="{{ route('users.product') }}" class="btn">Beli Sekarang</a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features">
    <h2>Bagaimana Cara Kerjanya</h2>
    <div class="feature-grid">
      <div class="feature-item">
        <div class="icon">📋</div>
        <h3>Browse Menu</h3>
        <p>Lihat pilihan dendeng ayam kami.</p>
      </div>
      <div class="feature-item">
        <div class="icon">❤️</div>
        <h3>Pilih Favorit</h3>
        <p>Temukan rasa yang Anda suka.</p>
      </div>
      <div class="feature-item">
        <div class="icon">🛒</div>
        <h3>Pesan Sekarang</h3>
        <p>Pesan dengan mudah secara online.</p>
      </div>
      <div class="feature-item">
        <div class="icon">🍽️</div>
        <h3>Nikmati Makanan</h3>
        <p>Rasakan kelezatan dendeng kami.</p>
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