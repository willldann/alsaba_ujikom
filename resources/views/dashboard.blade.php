<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dendeng Ayam Premium</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">Dendeng<span>Shop</span></div>
        <nav>
            <ul>
                <li><a href="dashboard" class="active">Home</a></li>
                <li><a href="product">Shop</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html">🛒 Cart</a></li>
                <li><a href="login" onclick="openModal('loginModal')">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <section class="hero">
        <div class="hero-text">
            <h4>Selamat Datang di Dendeng Shop</h4>
            <h1>Promo Spesial Dendeng Ayam</h1>
            <h2>Diskon Hingga <span>50%</span>!</h2>
            <p>Jangan lewatkan kesempatan ini, hanya di bulan ini!</p>
            <a href="product" class="btn">Beli Sekarang</a>
        </div>
    </section>
    
    <section class="keunggulan">
        <div class="features">
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h3>Free Shipping</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-shopping-cart"></i>
                <h3>Online Order</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-money-bill-wave"></i>
                <h3>Save Money</h3>
            </div>
            <div class="feature-item">
                <i class="fas fa-tag"></i>
                <h3>Promotions</h3>
            </div>
        </div>
    </section>
    
    <section class="our-products">
        <h2>Our Products</h2>
        <div class="product-container">
            <div class="product">
                <img src="../assets/dendeng_manis.jpg" alt="Dendeng Sapi">
                <h3>Dendeng Sapi</h3>
                <p>Rp 50.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
            <div class="product">
                <img src="../assets/dendeng_pedas.jpg" alt="Dendeng Ayam">
                <h3>Dendeng Ayam</h3>
                <p>Rp 45.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
            <div class="product">
                <img src="../assets/dendeng_manis.jpg" alt="Dendeng Pedas">
                <h3>Dendeng Pedas</h3>
                <p>Rp 55.000</p>
                <button class="buy-btn">Beli Sekarang</button>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h2 class="logo">DendengShop</h2>
                <p>Your tagline here</p>
                <p><strong>Address:</strong> 562 Wellington Road, San Francisco</p>
                <p><strong>Phone:</strong> +01 2222 3665, (+91) 01 2345 6789</p>
                <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            </div>
            
            <div class="footer-section">
                <h3>Information</h3>
                <a href="#">About Us</a>
                <a href="#">More Search</a>
                <a href="#">Blog</a>
                <a href="#">Testimonials</a>
                <a href="#">Events</a>
            </div>
    
            <div class="footer-section">
                <h3>Helpful Links</h3>
                <a href="#">Services</a>
                <a href="#">Supports</a>
                <a href="#">Terms & Condition</a>
                <a href="#">Privacy Policy</a>
            </div>
    
            <div class="footer-section">
                <h3>Subscribe More Info</h3>
                <div class="subscribe-box">
                    <input type="email" placeholder="Enter your Email">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
    
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    
        <p class="footer-bottom">&copy; 2025 DendengShop | All Rights Reserved</p>
    </footer>
    

    <script>
        function goToDetailPage(event) {
            let button = event.target;
            let product = button.closest('.product');
            let productName = product.querySelector('h3').innerText;
            let productPrice = product.querySelector('p').innerText.replace('Rp ', '').replace('.', '');
            let productImage = product.querySelector('img').src;
            localStorage.setItem('selectedProduct', JSON.stringify({
                name: productName,
                price: parseInt(productPrice),
                image: productImage
            }));
            window.location.href = 'detail_produk.html';
        }
        document.addEventListener('DOMContentLoaded', function () {
            let buyButtons = document.querySelectorAll('.buy-btn');
            buyButtons.forEach(button => {
                button.addEventListener('click', goToDetailPage);
            });
        });
    </script>
</body>
</html>