let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(id, name, price) {
    cart.push({ id, name, price });
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartCount();
    alert("Produk ditambahkan ke keranjang!");
}

function updateCartCount() {
    document.getElementById("cart-count").textContent = cart.length;
}

function showCartItems() {
    let cartItems = document.getElementById("cart-items");
    cartItems.innerHTML = cart.map(item => `<p>${item.name} - Rp ${item.price}</p>`).join("");
}

function checkout() {
    alert("Checkout berhasil!");
    localStorage.removeItem("cart");
    window.location.href = "index.html";
}

document.addEventListener("DOMContentLoaded", updateCartCount);

const track = document.querySelector(".product-track");
const products = [...track.children];

Scroll;

