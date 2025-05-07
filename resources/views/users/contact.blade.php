<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - DendengShop</title>
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    @include('layouts.navbar')

    <!-- Contact Section -->
    <section class="contact-container">
        <div class="contact-header">
            <h2>Hubungi Kami</h2>
            <p>Kami siap membantu Anda! Silakan hubungi kami untuk pertanyaan atau informasi lebih lanjut.</p>
        </div>

        <div class="contact-content">
            <!-- Formulir Kontak -->
            <div class="contact-form">
                <h3>Kirim Pesan</h3>
                <form id="contact-form" method="POST" action="{{ route('kontak.kirim') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <input type="hidden" name="title" value="Pesan dari Form Kontak DendengShop">
                    <button type="submit">Kirim Pesan</button>
                    <p id="status-message" style="margin-top: 10px;"></p>
                </form>

            </div>

            <!-- Informasi Kontak -->
            <div class="contact-info">
                <div class="info-details">
                    <h3>Detail Kontak</h3>
                    <p><i class="fa-solid fa-map-marker-alt"></i> Brebes, Jawa Tengah, Indonesia</p>
                    <p><i class="fa-solid fa-phone"></i> +62 812-3456-7890</p>
                    <p><i class="fa-solid fa-envelope"></i> support@dendengshop.com</p>
                </div>

                <!-- Google Maps -->
                <div class="map-container">
                    <h3>Lokasi Kami</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=..."
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>

                <!-- Media Sosial -->
                <div class="social-icons">
                    <h3>Ikuti Kami</h3>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Revisi pada script.js bagian pengiriman -->


</body>
</html>