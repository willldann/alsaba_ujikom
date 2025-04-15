<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Dendeng</title>
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
    function updatePrice() {
        let total = 0;
        document.querySelectorAll(".cart-item").forEach(item => {
            let price = parseFloat(item.querySelector(".price").textContent.replace('Rp', '').replace(/\./g, '').replace(',', ''));
            total += price;
        });
        document.getElementById('total-price').textContent = `Rp${total.toLocaleString('id-ID')}`;
    }

    function changeQuantity(itemIndex, price, change) {
        let quantityInput = document.getElementById(`quantity-${itemIndex}`);
        let priceElement = document.getElementById(`price-${itemIndex}`);
        let newValue = parseInt(quantityInput.value) + change;
        if (newValue > 0) {
            quantityInput.value = newValue;
            priceElement.textContent = `Rp${(price * newValue).toLocaleString('id-ID')}`;
            updatePrice();
        }
    }

    function removeItem(itemIndex) {
        let item = document.getElementById(`item-${itemIndex}`);
        item.remove();
        updatePrice();
    }

    document.addEventListener("DOMContentLoaded", updatePrice);
    </script>
</head>
<body>

    @include('layouts.navbar')

    <div class="cart-container">
        <h2><i class="fa-solid fa-cart-shopping"></i> Shopping Cart - Dendeng</h2>

        <div class="cart-items">
            @foreach($products as $index => $product)
            <div class="cart-item" id="item-{{ $index + 1 }}">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                <div class="cart-item-details">
                    <strong>{{ $product->name }}</strong><br>
                    <span>Berat: {{ $product->weight }}</span>
                </div>
                <div class="quantity-controls">
                    <button onclick="changeQuantity({{ $index + 1 }}, {{ $product->price }}, -1)"><i class="fa-solid fa-minus"></i></button>
                    <input type="text" id="quantity-{{ $index + 1 }}" value="1" readonly>
                    <button onclick="changeQuantity({{ $index + 1 }}, {{ $product->price }}, 1)"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="price" id="price-{{ $index + 1 }}">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                <button class="remove-btn" onclick="removeItem({{ $index + 1 }})"><i class="fa-solid fa-trash-can"></i></button>
            </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <p><strong>Total: <span id="total-price">Rp0</span></strong></p>
            <p>🚚 Pengiriman: <span class="free">Gratis</span></p>
            <button class="checkout-button" onclick="window.location.href='{{ route('users.checkout') }}'"><i class="fa-solid fa-credit-card"></i> Checkout</button>
        </div>
    </div>

</body>
</html>
