<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Dendeng</title>
    <link rel="stylesheet" href="/css/checkout.css">
    <script defer src="/js/checkout.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="checkout-container">
        <!-- Kiri: Ringkasan Pesanan -->
        <div class="checkout-left">
            <h2><i class="fa-solid fa-shopping-cart"></i> Ringkasan Pesanan</h2>
            <div class="cart-summary">
                @php
                    $totalWeightAll = 0;
                    $total = 0;
                @endphp

                @foreach ($cartItems as $item)
                    @php
                        $product = $item->product;
                        $quantity = $item->quantity;
                        $totalWeight = $quantity * 50;
                        $formattedWeight = $totalWeight >= 1000
                            ? number_format($totalWeight / 1000, 2, ',', '.') . ' kg'
                            : $totalWeight . ' gram';
                        $subtotal = $product->price * $quantity;
                        $total += $subtotal;
                        $totalWeightAll += $totalWeight;
                    @endphp

                    <div class="cart-item">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="cart-details">
                            <strong>{{ $product->name }}</strong>
                            <p>{{ $quantity }} x Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="price">Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                            <p>Berat: {{ $formattedWeight }}</p>
                        </div>
                    </div>
                @endforeach

                @php
                    $formattedTotalWeight = $totalWeightAll >= 1000
                        ? number_format($totalWeightAll / 1000, 2, ',', '.') . ' kg'
                        : $totalWeightAll . ' gram';
                @endphp

                <div class="cart-total">
                    <p><strong>Total: <span id="checkout-total">Rp{{ number_format($total, 0, ',', '.') }}</span></strong></p>
                    <p><strong>Total Berat: <span id="checkout-total-weight">{{ $formattedTotalWeight }}</span></strong></p>
                </div>
            </div>
        </div>

        <!-- Kanan: Formulir -->
        <div class="checkout-right">
            <a href="{{ route('users.cart') }}" class="back-button">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Keranjang
            </a>

            <h2><i class="fa-solid fa-truck"></i> Pengiriman & Pembayaran</h2>

            <form id="shipping-form" method="POST" action="{{ route('checkout.placeOrder') }}">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name', $user->name ?? '') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat', $latestAddress->alamat ?? '') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="kota" placeholder="Kota" value="{{ old('kota', $latestAddress->kota ?? '') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="kode_pos" placeholder="Kode Pos" value="{{ old('kode_pos', $latestAddress->kode_pos ?? '') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nomor_hp" placeholder="Nomor HP" value="{{ old('nomor_hp', $latestAddress->nomor_hp ?? '') }}" required>
                </div>
                <button type="submit" class="submit-button">
                    <i class="fa-solid fa-check"></i> Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</body>
</html>
