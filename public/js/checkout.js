document.addEventListener("DOMContentLoaded", function () {
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    console.log("Cart Items:", cartItems); // Debugging

    let cartContainer = document.getElementById("checkout-cart");
    let totalContainer = document.getElementById("checkout-total");

    if (!cartContainer || !totalContainer) {
        console.error("Element #checkout-cart atau #checkout-total tidak ditemukan!");
        return;
    }

    let totalPrice = 0;

    if (cartItems.length === 0) {
        cartContainer.innerHTML = "<p>Cart is empty.</p>";
    } else {
        cartItems.forEach((item, index) => {
            let itemElement = document.createElement("div");
            itemElement.classList.add("checkout-item");
            itemElement.innerHTML = `
                <p><strong>${item.name}</strong></p>
                <p>Quantity: ${item.quantity}</p>
                <p>Price: €${(item.price * item.quantity).toFixed(2)}</p>
                <button onclick="removeCheckoutItem(${index})">Remove</button>
                <hr>
            `;
            cartContainer.appendChild(itemElement);
            totalPrice += item.price * item.quantity;
        });

        totalContainer.textContent = `Total: €${totalPrice.toFixed(2)}`;
    }
});

// Fungsi untuk menghapus item di checkout
function removeCheckoutItem(index) {
    let cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    cartItems.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cartItems));
    location.reload(); // Refresh halaman untuk update tampilan
}
