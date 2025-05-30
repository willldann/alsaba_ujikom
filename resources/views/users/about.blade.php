<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Dendeng Shop</title>
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

    @include('layouts.navbar')

    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <h2>Tentang Kami</h2>
                <p><strong>Dendeng Shop</strong> adalah toko online yang menyediakan berbagai macam dendeng berkualitas tinggi, dibuat dengan bahan pilihan dan proses terbaik.</p>
                <p>Kami berdiri sejak <strong>tahun 2020</strong> dan berlokasi di <strong>Jl. Pulosaren RT 2 / RW 2, Losari Lor, Losari, Brebes, Jawa Tengah</strong>. Dengan komitmen tinggi terhadap kualitas dan pelayanan, kami terus tumbuh untuk menjadi pilihan utama pecinta dendeng di seluruh Indonesia.</p>
                <p>Kami berdedikasi untuk memberikan pengalaman belanja yang mudah dan menyenangkan, serta memastikan bahwa setiap pelanggan mendapatkan produk terbaik.</p>
                <a href="{{ route('users.product') }}" class="btn">Lihat Produk</a>
            </div>
            <div class="about-image">
                <img src="{{ asset('assets/baner.jpg') }}" alt="Tentang Kami">
            </div>
        </div>
    </section>

    @include('layouts.footer')

</body>
</html>
