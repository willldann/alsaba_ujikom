<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Dendeng Shop</title>
    <link rel="stylesheet" href="/css/detail_produk.css">
</head>

<body>

    @include('layouts.navbar')

    <section class="product-detail">
        <div class="product-gallery">
            <img id="main-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf

                <label for="weight">Berat Produk:</label>
                <input type="text" name="weight" id="weight" value="50 gram" readonly required>

                <label for="quantity">Jumlah:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>

                <button type="submit" class="buy-btn">Beli Sekarang</button>
            </form>

            <!-- Dropdown Deskripsi Produk -->
            <details class="product-description">
                <summary><h2>Deskripsi Produk</h2></summary>
                <p>
                    Dendeng sapi premium dengan cita rasa khas Nusantara. Dibuat dari daging sapi pilihan, 
                    diproses secara higienis dan dikemas rapi untuk menjaga kesegaran serta kualitas rasa.
                    Cocok dinikmati sebagai lauk pendamping nasi atau camilan saat santai.
                </p>
                <p>
                    Tersedia dalam ukuran 50 gram per bungkus. Tidak mengandung bahan pengawet dan 
                    tahan hingga 6 bulan dalam penyimpanan suhu ruang.
                </p>
            </details>
        </div>
    </section>

    <script>
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }

        document.getElementById('quantity').addEventListener('input', function () {
            const quantity = parseInt(this.value);
            const weightPerItem = 50;
            const totalWeight = quantity * weightPerItem;

            let displayWeight;
            if (totalWeight >= 1000) {
                const kg = totalWeight / 1000;
                displayWeight = `${kg} kg`;
            } else {
                displayWeight = `${totalWeight} gram`;
            }

            document.getElementById('weight').value = displayWeight;
        });
    </script>

</body>
</html>
