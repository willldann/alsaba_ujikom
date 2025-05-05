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
                <form>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" placeholder="Masukkan Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit">Kirim Pesan</button>
                </form>
            </div>

            <!-- Informasi Kontak -->
            <div class="contact-info">
                <div class="info-details">
                    <h3>Detail Kontak</h3>
                    <p><i class="fa-solid fa-map-marker-alt"></i> Brebes, Jawa Tengah, Indonesia</p>
                    <p><i class="fa-solid fa-phone"></i> ‪+62 812-3456-7890‬</p>
                    <p><i class="fa-solid fa-envelope"></i> support@dendengshop.com</p>
                </div>
                <!-- Google Maps -->
                <div class="map-container">
                    <h3>Lokasi Kami</h3>
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.573123456789!2d109.0481233147701!3d-6.869876995023456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9e5c5b12345%3A0x123456789abcdef0!2sBrebes%2C%20Central%20Java%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1698765432100!5m2!1sen!2sid" 
                        width="100%" 
                        height="250" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <!-- Media Sosial -->
                <div class="social-icons">
                    <h3>Ikuti Kami</h3>
                    <div class="social-links">
                        <a href="#" class="facebook"><i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                        <a href="#" class="instagram"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i>
                        <a href="#" class="whatsapp"><i class="fa-brands fa-whatsapp" style="color: #ffffff;" ></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
