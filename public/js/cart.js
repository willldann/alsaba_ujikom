document.addEventListener("DOMContentLoaded", function () {
    updatePrice();

    let checkoutButton = document.querySelector(".checkout-button");
    if (checkoutButton) {
        checkoutButton.addEventListener("click", function () {
            let cartItems = [];
            document.querySelectorAll(".cart-item").forEach(item => {
                let id = item.id;
                let nameElement = item.querySelector(".cart-item-details strong");
                let quantityElement = item.querySelector("input[type='text']");
                let priceElement = item.querySelector(".price");

                if (nameElement && quantityElement && priceElement) {
                    let name = nameElement.textContent;
                    let quantity = parseInt(quantityElement.value);
                    let price = parseFloat(priceElement.textContent.replace('€', ''));

                    if (quantity > 0) {
                        cartItems.push({ id, name, quantity, price });
                    }
                }
            });

            localStorage.setItem("cart", JSON.stringify(cartItems));  // Simpan data ke localStorage
            window.location.href = "checkout.html"; // Redirect ke halaman checkout
        });
    } else {
        console.error("Checkout button not found!");
    }
});

function updatePrice() {
    let total = 0;
    document.querySelectorAll(".cart-item").forEach(item => {
        let priceElement = item.querySelector(".price");
        let quantityElement = item.querySelector("input[type='text']");

        if (priceElement && quantityElement) {
            let price = parseFloat(priceElement.textContent.replace('€', ''));
            let quantity = parseInt(quantityElement.value);
            total += price * quantity;
        }
    });

    let totalPriceElement = document.getElementById('total-price');
    if (totalPriceElement) {
        totalPriceElement.textContent = `€${total.toFixed(2)}`;
    }
}

function changeQuantity(itemIndex, price, change) {
    let quantityInput = document.getElementById(`quantity-${itemIndex}`);
    if (quantityInput) {
        let newValue = parseInt(quantityInput.value) + change;
        if (newValue > 0) {
            quantityInput.value = newValue;
            updatePrice();
        }
    }
}

function removeItem(itemIndex) {
    let item = document.getElementById(`item-${itemIndex}`);
    if (item) {
        item.remove();
        updatePrice();
    }
}
