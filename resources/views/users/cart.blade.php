<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Dendeng</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
    function updatePrice() {
        let total = 0;
        document.querySelectorAll(".cart-item").forEach(item => {
            let price = parseFloat(item.querySelector(".price").textContent.replace('Rp', '').replace(/\./g, ''));
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
</script>

</head>
<body>
    <div class="cart-container">
        <h2><i class="fa-solid fa-cart-shopping"></i> Shopping Cart - Dendeng</h2>

        <div class="cart-items">
            <div class="cart-item" id="item-1">
                <img src="../assets/dendeng-balado.jpg" alt="Dendeng Balado">
                <div class="cart-item-details">
                    <strong>Dendeng Balado</strong><br>
                    <span>Berat: 250g</span>
                </div>
                <div class="quantity-controls">
                    <button onclick="changeQuantity(1, 65000, -1)"><i class="fa-solid fa-minus"></i></button>
                    <input type="text" id="quantity-1" value="1" readonly>
                    <button onclick="changeQuantity(1, 65000, 1)"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="price" id="price-1">Rp65,000</div>
                <button class="remove-btn" onclick="removeItem(1)"><i class="fa-solid fa-trash-can"></i></button>
            </div>

            <div class="cart-item" id="item-2">
                <img src="../assets/dendeng-batokok.jpg" alt="Dendeng Batokok">
                <div class="cart-item-details">
                    <strong>Dendeng Batokok</strong><br>
                    <span>Berat: 250g</span>
                </div>
                <div class="quantity-controls">
                    <button onclick="changeQuantity(2, 75000, -1)"><i class="fa-solid fa-minus"></i></button>
                    <input type="text" id="quantity-2" value="1" readonly>
                    <button onclick="changeQuantity(2, 75000, 1)"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="price" id="price-2">Rp75,000</div>
                <button class="remove-btn" onclick="removeItem(2)"><i class="fa-solid fa-trash-can"></i></button>
            </div>

            <div class="cart-item" id="item-3">
                <img src="../assets/dendeng-kering.jpg" alt="Dendeng Kering">
                <div class="cart-item-details">
                    <strong>Dendeng Kering</strong><br>
                    <span>Berat: 250g</span>
                </div>
                <div class="quantity-controls">
                    <button onclick="changeQuantity(3, 70000, -1)"><i class="fa-solid fa-minus"></i></button>
                    <input type="text" id="quantity-3" value="1" readonly>
                    <button onclick="changeQuantity(3, 70000, 1)"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="price" id="price-3">Rp70,000</div>
                <button class="remove-btn" onclick="removeItem(3)"><i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

        <div class="cart-summary">
            <p><strong>Total: <span id="total-price">Rp210,000</span></strong></p>
            <p>🚚 Pengiriman: <span class="free">Gratis</span></p>
            <button class="checkout-button" onclick="window.location.href='checkout.html'"><i class="fa-solid fa-credit-card"></i> Checkout</button>
        </div>
    </div>
</body>
</html>
