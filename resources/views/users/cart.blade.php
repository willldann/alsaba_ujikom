<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Dendeng</title>
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
</head>
<body>

    @include('layouts.navbar')

    <div class="cart-container">
        <h2><i class="fa-solid fa-cart-shopping"></i> Shopping Cart - Dendeng</h2>

        <!-- Tombol kembali ke halaman produk -->
        <button class="back-button" onclick="window.location.href='{{ route('users.product') }}'">
            <i class="fa-solid fa-arrow-left"></i> Tambah Produk Lain
        </button>

        <div class="cart-items">
            @php
                $total = 0;
                $totalWeightAll = 0;
            @endphp

            @foreach($cartItems as $index => $item)
                @php
                    $product = $item->product;
                    $subtotal = $product->price * $item->quantity;
                    $total += $subtotal;

                    // Hitung total berat per item (gram)
                    $totalWeight = $item->quantity * 50; // Berat produk dalam gram (50 gram per item)
                    $formattedWeight = $totalWeight >= 1000
                        ? number_format($totalWeight / 1000, 2) . ' kg'
                        : $totalWeight . ' gram';

                    $totalWeightAll += $totalWeight;
                @endphp

                <div class="cart-item" id="item-{{ $item->id }}">
                    <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}">

                    <div class="cart-item-details">
                        <strong>{{ $product->name }}</strong>
                        <span>Berat: {{ $formattedWeight }}</span>
                    </div>

                    <div class="quantity-controls">
                        <form action="{{ route('users.cart.update', $item->id) }}" method="POST" class="quantity-form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="change" value="-1">
                            <button type="submit" class="qty-btn"><i class="fa-solid fa-minus"></i></button>
                        </form>

                        <input type="text" class="qty-input" value="{{ $item->quantity }}" readonly>

                        <form action="{{ route('users.cart.update', $item->id) }}" method="POST" class="quantity-form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="change" value="1">
                            <button type="submit" class="qty-btn"><i class="fa-solid fa-plus"></i></button>
                        </form>
                    </div>

                    <div class="price">Rp{{ number_format($subtotal, 0, ',', '.') }}</div>

                    <form action="{{ route('users.cart.remove', $item->product_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="remove-btn" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>  
            @endforeach
        </div>

        <div class="cart-summary">
            <p><strong>Total: <span id="total-price">Rp{{ number_format($total, 0, ',', '.') }}</span></strong></p>

            @php
                $formattedTotalWeight = $totalWeightAll >= 1000
                    ? number_format($totalWeightAll / 1000, 2) . ' kg'
                    : $totalWeightAll . ' gram';
            @endphp

            <p><strong>Total Berat: </strong>{{ $formattedTotalWeight }}</p>

            <button class="checkout-button" onclick="window.location.href='{{ route('checkout.index') }}'">
                <i class="fa-solid fa-credit-card"></i> Checkout
            </button>
        </div>
    </div>
</body>
</html>
