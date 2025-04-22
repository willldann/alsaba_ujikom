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
                
                <label for="size">Ukuran:</label>
                <select name="size" id="size" required>
                    <option disabled selected>Pilih Ukuran</option>
                    @foreach ($product->sizes as $size)
                        <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
    
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
    </script>
    
</body>
</html>
