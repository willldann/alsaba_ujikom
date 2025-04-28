<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - DendengShop</title>
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts (Optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    @include('layouts.navbar')

    <!-- Contact Section -->
    <section class="contact-container">
        <h2>Hubungi Kami</h2>
        <p>Silakan hubungi kami jika ada pertanyaan atau kebutuhan terkait produk.</p>

        <div class="contact-content">
            <!-- Informasi Kontak -->
            <div class="contact-info">
                <h3>Detail Kontak</h3>
                <p><i class="fa-solid fa-map-marker-alt"></i> Brebes, Jawa Tengah</p>
                <p><i class="fa-solid fa-phone"></i> +62 812-3456-7890</p>
                <p><i class="fa-solid fa-envelope"></i> support@dendengshop.com</p>

                <h3>Ikuti Kami</h3>
                <div class="social-icons">
                    <a href="https://facebook.com/dendengshop" class="facebook" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://instagram.com/dendengshop" class="instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://twitter.com/dendengshop" class="twitter" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://youtube.com/dendengshop" class="youtube" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://wa.me/6281234567890" class="whatsapp" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Peta -->
            <div class="contact-map">
                <h3>Lokasi Kami</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.757456789012!2d109.04358661476994!3d-6.869689695038849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9e3b9b4f7d1%3A0x3b5b7f7f6e4b2a8!2sBrebes%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1634567890123!5m2!1sen!2sid"
                    width="100%" height="250" allowfullscreen="" loading="lazy" style="border:0;"></iframe>
            </div>

            <!-- Formulir Kontak -->
            <div class="contact-form">
                <h3>Kirim Pesan</h3>
                <form id="contactForm">
                    <label for="name">Nama</label>
                    <input type="text" id="name" placeholder="Masukkan Nama Anda" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Masukkan Email Anda" required>

                    <label for="message">Pesan</label>
                    <textarea id="message" placeholder="Tulis pesan Anda di sini..." required></textarea>

                    <button type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            if (name && email && message) {
                alert('Pesan berhasil dikirim!');
                this.reset();
            } else {
                alert('Harap isi semua kolom!');
            }
        });
    </script>

</body>
</html>
