<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Dendeng</title>
    <link rel="stylesheet" href="../css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="../js/checkout.js"></script>
</head>
<body>
    <div class="checkout-container">
        <!-- Bagian Kiri (Ringkasan Pesanan) -->
        <div class="checkout-left">
            <h2><i class="fa-solid fa-shopping-cart"></i> Ringkasan Pesanan</h2>
            <div class="cart-summary">
                <div class="cart-item">
                    <img src="../assets/dendeng-pedas.jpg" alt="Dendeng Pedas">
                    <div class="cart-details">
                        <strong>Dendeng Pedas</strong>
                        <p>250g</p>
                        <p class="price">Rp65.000</p>
                    </div>
                </div>

                <div class="cart-item">
                    <img src="../assets/dendeng-manis.jpg" alt="Dendeng Manis">
                    <div class="cart-details">
                        <strong>Dendeng Manis</strong>
                        <p>250g</p>
                        <p class="price">Rp75.000</p>
                    </div>
                </div>
                
                <div class="cart-total">
                    <p><strong>Total: <span id="checkout-total">Rp140.000</span></strong></p>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Formulir Pengiriman & Pembayaran) -->
        <div class="checkout-right">
            <h2><i class="fa-solid fa-truck"></i> Pengiriman & Pembayaran</h2>

            <form id="shipping-form">
                <input type="text" id="name" placeholder="Nama Lengkap" required>
                <input type="text" id="address" placeholder="Alamat Lengkap" required>
                <input type="text" id="city" placeholder="Kota" required>
                <input type="text" id="postal-code" placeholder="Kode Pos" required>
                <input type="text" id="phone" placeholder="Nomor HP" required>
            </form>

            <h3><i class="fa-solid fa-credit-card"></i> Metode Pembayaran</h3>
            <select id="payment-method">
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

            <button id="place-order"><i class="fa-solid fa-check"></i> Pesan Sekarang</button>
        </div>
    </div>
</body>
</html>
