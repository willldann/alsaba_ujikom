<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DendengProduct</title>
  <link rel="stylesheet" href="/css/product.css">
</head>
<body>

  @include('layouts.navbar')

  <!-- Produk Section -->
  <div class="container">
    <h2 class="section-title">Product Dendeng</h2>
    <div class="product-grid">

      @foreach ($products as $product)
      <div class="product-item">
        <img src="/assets/{{ $product->image }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p class="category">Kategori: {{ $product->category }}</p>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <div class="product-buttons">
          <!-- Tombol ke halaman detail -->
          <a href="{{ route('users.detail_produk', $product->id) }}" class="view-btn">Lihat Detail</a>

          <!-- Tombol langsung beli -->
          <a href="{{ route('cart.add', $product->id) }}" class="buy-btn">Beli Sekarang</a>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</body>
</html>
