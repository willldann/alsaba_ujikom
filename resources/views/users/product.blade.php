<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DendengProduct</title>
  <link rel="stylesheet" href="/css/product.css">
  <!-- Menambahkan FontAwesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

        <form action="{{ route('cart.add', $product->id) }}" method="POST">
          @csrf
          <div class="product-buttons">
            <!-- Tombol ke halaman detail -->
            <a href="{{ route('users.detail_produk', $product->id) }}" class="view-btn">Lihat Detail</a>

            <!-- Tombol beli dengan ikon keranjang -->
            <button type="submit" class="buy-btn">
              <i class="fas fa-shopping-cart"> </i>
              <span style="margin-left: 10px;">
                Beli Sekarang
              </span>
            </button>
          </div>
        </form>
      </div>
      @endforeach

    </div>
  </div>

</body>
</html>
