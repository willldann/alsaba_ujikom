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
        <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p class="category">Kategori: {{ $product->category }}</p>
        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        <div class="product-buttons">
          <!-- Tombol ke halaman detail -->
      </div>
      </div>
      @endforeach

    </div>
  </div>

</body>
</html>
