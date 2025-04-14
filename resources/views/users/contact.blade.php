<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - DendengShop</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Dendeng<span>Shop</span></div>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="product.html">Shop</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
        </ul>
    </nav>

    <!-- Contact Section -->
    <section class="contact-container">
        <h2>Hubungi Kami</h2>
        <p>Silakan hubungi kami jika ada pertanyaan atau kebutuhan terkait produk.</p>

        <div class="contact-content">
            <!-- Formulir Kontak -->
            <div class="contact-form">
                <h3>Kirim Pesan</h3>
                <form>
                    <label for="name">Nama</label>
                    <input type="text" id="name" placeholder="Masukkan Nama Anda">

                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Masukkan Email Anda">

                    <label for="message">Pesan</label>
                    <textarea id="message" placeholder="Tulis pesan Anda di sini..."></textarea>

                    <button type="submit">Kirim</button>
                </form>
            </div>

            <!-- Informasi Kontak -->
            <div class="contact-info">
                <h3>Detail Kontak</h3>
                <p><i class="fa-solid fa-map-marker-alt"></i>Brebes</p>
                <p><i class="fa-solid fa-phone"></i> +62 812-3456-7890</p>
                <p><i class="fa-solid fa-envelope"></i> support@dendengshop.com</p>

                <!-- Media Sosial -->
                <h3>Ikuti Kami</h3>
                <div class="social-icons">
                    <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="youtube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
