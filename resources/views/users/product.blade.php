<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DendengProduct</title>
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .alert-danger:hover {
            background-color: #f5c6cb;
            border-color: #721c24;
        }
    </style>
</head>

<body>

    @include('layouts.navbar')


    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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
