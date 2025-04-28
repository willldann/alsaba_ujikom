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
            <div class="thumbnail-container">
                @foreach ($product->thumbnails as $thumb)
                    <img class="thumbnail" onclick="changeImage(this)" src="{{ asset('storage/' . $thumb) }}" alt="{{ $product->name }}">
                @endforeach
            </div>
        </div>

        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    
            <!-- Form untuk menambahkan produk ke keranjang -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                
                <!-- Berat produk otomatis -->
                <label for="weight">Berat Produk:</label>
                <input type="text" name="weight" id="weight" value="50 gram" readonly required>

                <label for="quantity">Jumlah:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" required>
    
                <button type="submit" class="buy-btn">Beli Sekarang</button>
            </form>

            <h2>Deskripsi Produk</h2>
            <p>{{ $product->description }}</p>
        </div>
    </section>
    
    <script>
        // Fungsi untuk mengganti gambar utama ketika thumbnail diklik
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }

        // Update berat berdasarkan jumlah
        document.getElementById('quantity').addEventListener('input', function () {
            const quantity = parseInt(this.value);
            const weightPerItem = 50; // gram per produk
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
