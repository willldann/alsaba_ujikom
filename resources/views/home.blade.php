<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dendeng Ayam Premium</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }

    body {
      color: #333;
      background-color: #f5f5f5;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero {
      position: relative;
      height: 90vh;
      background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.7)),
                  url('/assets/baner.jpg') no-repeat center/cover;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      padding: 0 5%;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: left;
      max-width: 600px;
      color: #fff;
      opacity: 0;
      transform: translateY(50px);
      animation: fadeInUp 1s ease forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-content h1 {
      font-size: 4.5rem;
      font-weight: 700;
      line-height: 1.1;
      font-family: 'Playfair Display', serif;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-content p {
      font-size: 1.3rem;
      margin-bottom: 30px;
      line-height: 1.6;
      font-weight: 300;
    }

    .hero-content p span {
      color: #ffd700;
      font-weight: 600;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      padding: 15px 30px;
      background: linear-gradient(90deg, #ff8c00, #ffcc00);
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      border-radius: 50px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .btn .arrow {
      margin-left: 10px;
      font-size: 1.2rem;
      transition: transform 0.3s ease;
    }

    .btn:hover .arrow {
      transform: translateX(5px);
    }

    /* About Section */
    .about-section {
      padding: 100px 5%;
      text-align: center;
      max-width: 1200px;
      margin: 0 auto;
      margin-top: -50px;
      position: relative;
      z-index: 1;
      background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                  url('/assets/images/about-background.jpg') no-repeat center/cover;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .about-content h2 {
      font-size: 2.8rem;
      font-family: 'Playfair Display', serif;
      margin-bottom: 25px;
      color: #222;
    }

    .about-content p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
      max-width: 700px;
      margin: 0 auto;
    }

    /* Partners Section */
    .partners {
      display: flex;
      justify-content: center;
      gap: 50px;
      padding: 60px 5%;
      background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                  url('/assets/images/partners-bg.jpg') no-repeat center/cover;
      flex-wrap: wrap;
    }

    .partners img {
      height: 50px;
      filter: grayscale(100%);
      opacity: 0.7;
      transition: all 0.3s ease;
    }

    .partners img:hover {
      filter: grayscale(0%);
      opacity: 1;
      transform: scale(1.1);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .hero {
        height: 80vh;
        justify-content: center;
        text-align: center;
      }

      .hero-content h1 {
        font-size: 3.5rem;
      }

      .hero-content p {
        font-size: 1.1rem;
      }
    }

    @media (max-width: 768px) {
      .hero {
        height: 70vh;
        padding: 0 20px;
      }

      .hero-content h1 {
        font-size: 2.8rem;
      }

      .hero-content p {
        font-size: 1rem;
      }

      .btn {
        padding: 12px 25px;
        font-size: 0.9rem;
      }

      .about-section {
        padding: 60px 20px;
        margin-top: -30px;
      }

      .about-content h2 {
        font-size: 2.2rem;
      }

      .about-content p {
        font-size: 1rem;
      }

      .partners {
        gap: 30px;
        padding: 40px 20px;
      }

      .partners img {
        height: 40px;
      }
    }

    @media (max-width: 480px) {
      .hero {
        height: 60vh;
      }

      .hero-content h1 {
        font-size: 2rem;
      }

      .hero-content p {
        font-size: 0.9rem;
      }

      .btn {
        padding: 10px 20px;
        font-size: 0.8rem;
      }

      .about-section {
        padding: 40px 15px;
      }

      .about-content h2 {
        font-size: 1.8rem;
      }

      .partners {
        gap: 20px;
        padding: 30px 15px;
      }

      .partners img {
        height: 30px;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  @include('layouts.navbar')

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Promo Spesial<br>Dendeng Ayam</h1>
      <p>Diskon Hingga <span>50%</span>! Jangan lewatkan kesempatan ini, hanya di bulan ini!</p>
      <a href="product" class="btn">Beli Sekarang <span class="arrow">→</span></a>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section">
    <div class="about-content">
      <h2>About Dendeng Shop</h2>
      <p>
        Di Dendeng Shop, kami berkomitmen untuk menyediakan dendeng ayam premium yang lezat dan berkualitas tinggi.
        Produk kami dibuat dengan bahan-bahan terbaik untuk memastikan rasa yang autentik dan sehat untuk Anda.
        Nikmati promo spesial kami dan mulailah perjalanan kuliner Anda bersama kami!
      </p>
    </div>
  </section>

  <!-- Partners Section -->
  <div class="partners">
    <img src="/assets/images/partner1.png" alt="Partner 1">
    <img src="/assets/images/partner2.png" alt="Partner 2">
    <img src="/assets/images/partner3.png" alt="Partner 3">
    <img src="/assets/images/partner4.png" alt="Partner 4">
  </div>

</body>
</html>
