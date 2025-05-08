<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DendengProduct</title>
  <link rel="stylesheet" href="/css/product.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  @include('layouts.navbar')

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
          <a href="{{ route('users.detail_produk', $product->id) }}" class="view-btn">Lihat Detail</a>

          @auth
          <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="buy-btn">
              <i class="fas fa-shopping-cart"></i>
              <span>Beli Sekarang</span>
            </button>
          </form>
          @else
          <a href="{{ route('login') }}" class="buy-btn">
            <i class="fas fa-shopping-cart"></i>
            <span>Login untuk Beli</span>
          </a>
          @endauth
        </div>
      </div>
      @endforeach

    </div>
  </div>

</body>
</html>
