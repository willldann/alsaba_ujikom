<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Dendeng Shop</title>
    <link rel="stylesheet" href="../css/detail_produk.css">
</head>
<body>
    <header>
        <div class="logo">Dendeng<span>Shop</span></div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="product.html" class="active">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html">🛒 Cart</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="product-detail">
        <div class="product-gallery">
            <img id="main-image" src="../assets/dendeng manis.jpg" alt="Dendeng Manis">
            <div class="thumbnail-container">
                <img src="../assets/dendeng pedas.jpg" alt="Dendeng Manis" class="thumbnail" onclick="changeImage(this)">
                <img src="../assets/dendeng pedas.jpg" alt="Dendeng Pedas" class="thumbnail" onclick="changeImage(this)">
                <img src="../assets/dendeng manis.jpg" alt="Dendeng Sapi" class="thumbnail" onclick="changeImage(this)">
            </div>
        </div>
        <div class="product-info">
            <h1>Dendeng Manis</h1>
            <p class="price">Rp 50.000</p>
            <select>
                <option>Pilih Ukuran</option>
                <option>100 gram</option>
                <option>250 gram</option>
                <option>500 gram</option>
            </select>
            <input type="number" value="1" min="1">
            <button id="addToCartButton" class="buy-btn">Add to Cart</button>
            <h2>Product Details</h2>
            <p>Dendeng ayam manis dengan bumbu rempah khas nusantara, dibuat dari bahan pilihan dan berkualitas tinggi.</p>
        </div>
    </section>
    <script>
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }
        // Event Listener untuk tombol Add to Cart
        document.getElementById('addToCartButton').addEventListener('click', function() {
            window.location.href = "cart.html"; // Pastikan file cart.html ada di proyek
        });
    </script>
    
</body>
</html>