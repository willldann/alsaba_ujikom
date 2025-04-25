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
                @foreach ($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                    <div class="cart-details">
                        <strong>{{ $item->product->name }}</strong>
                        <p>{{ $item->quantity }} x Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                        <p class="price">Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                        <p>Berat: {{ number_format($item->product->weight * $item->quantity, 2, ',', '.') }} kg</p>
                    </div>
                </div>
                @endforeach

                <div class="cart-total">
                    <p><strong>Total: <span id="checkout-total">Rp{{ number_format($total, 0, ',', '.') }}</span></strong></p>
                    <p><strong>Total Berat: <span id="checkout-total-weight">{{ number_format($totalWeight, 2, ',', '.') }} kg</span></strong></p>
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
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Alamat Lengkap" value="{{ old('address', $user->address ?? '') }}" required>
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="city" placeholder="Kota" value="{{ old('city', $user->city ?? '') }}" required>
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="postal_code" placeholder="Kode Pos" value="{{ old('postal_code', $user->postal_code ?? '') }}" required>
                    @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Nomor HP" value="{{ old('phone', $user->phone ?? '') }}" required>
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <h3><i class="fa-solid fa-credit-card"></i> Metode Pembayaran</h3>
                <div class="form-group">
                    <select name="payment_method" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="bca">BCA</option>
                        <option value="bni">BNI</option>
                        <option value="bri">BRI</option>
                        <option value="mandiri">Mandiri</option>
                        <option value="gopay">GoPay</option>
                        <option value="dana">DANA</option>
                        <option value="ovo">OVO</option>
                        <option value="shopeepay">ShopeePay</option>
                        <option value="credit-card">Kartu Kredit</option>
                        <option value="paypal">PayPal</option>
                    </select>
                    @error('payment_method') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="submit-button">
                    <i class="fa-solid fa-check"></i> Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</body>

</html>
