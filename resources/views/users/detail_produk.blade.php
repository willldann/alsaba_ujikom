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
            <img id="main-image" src="/assets/{{ $product->image }}" alt="{{ $product->name }}">
            <div class="thumbnail-container">
                @foreach ($product->thumbnails as $thumb)
                    <img src="/assets/{{ $thumb }}" alt="{{ $product->name }}" class="thumbnail" onclick="changeImage(this)">
                @endforeach
            </div>
        </div>
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    
            <select name="size">
                <option disabled selected>Pilih Ukuran</option>
                @foreach ($product->sizes as $size)
                    <option value="{{ $size }}">{{ $size }}</option>
                @endforeach
            </select>
    
            <input type="number" name="quantity" value="1" min="1">
            <a href="{{ route('users.cart') }}" class="buy-btn">Beli Sekarang</a>
    
            <h2>Product Details</h2>
            <p>{{ $product->description }}</p>
        </div>
    </section>
    
    <script>
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }
        // Event Listener untuk tombol Add to Cart
        document.getElementById('addToCartButton').addEventListener('click', function() {
            window.location.href = "users.cart"; // Pastikan file cart.html ada di proyek
        });
    </script>
    
</body>
</html>