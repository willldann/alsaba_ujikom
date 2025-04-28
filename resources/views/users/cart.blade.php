<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Dendeng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #f7f9fc;
            padding: 0;
            min-height: 100vh;
        }

        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1a1a1a;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .brand {
            font-size: 24px;
            font-weight: 700;
            color: #ff6b00;
            text-decoration: none;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .navbar .nav-links li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar .nav-links li a:hover,
        .navbar .nav-links li a.active {
            color: #ff6b00;
        }

        /* Hover underline effect */
        .navbar .nav-links li a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: #ff6b00;
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
        }

        .navbar .nav-links li a:hover::after,
        .navbar .nav-links li a.active::after {
            width: 100%;
        }

        /* Hamburger Menu */
        #menu-toggle {
            display: none;
        }

        .hamburger {
            display: none;
            font-size: 28px;
            color: white;
            cursor: pointer;
        }

        /* Adjust content to avoid overlap with fixed navbar */
        .cart-container {
            max-width: 900px;
            margin: 90px auto 30px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #1a1a1a;
            font-size: 28px;
            font-weight: 600;
        }

        h2 i {
            color: #ff6b00;
            margin-right: 8px;
        }

        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 100px 2fr 1fr 1fr 40px;
            align-items: center;
            background: #f9fafb;
            padding: 15px;
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .cart-item-details {
            padding: 0 15px;
            color: #1a1a1a;
        }

        .cart-item-details strong {
            font-size: 18px;
            font-weight: 600;
        }

        .cart-item-details span {
            font-size: 14px;
            color: #6b7280;
            display: block;
            margin-top: 4px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantity-controls form {
            display: inline-block;
        }

        .qty-btn {
            background: #ff6b00;
            border: none;
            padding: 8px;
            cursor: pointer;
            border-radius: 8px;
            color: white;
            transition: background 0.2s ease;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: #e55f00;
        }

        .qty-input {
            width: 48px;
            text-align: center;
            border: 1px solid #d1d5db;
            padding: 8px;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
        }

        .price {
            font-weight: 600;
            font-size: 16px;
            color: #1a1a1a;
            text-align: right;
        }

        .remove-btn {
            background: none;
            border: none;
            color: #ef4444;
            cursor: pointer;
            font-size: 20px;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            color: #dc2626;
        }

        .cart-summary {
            margin-top: 30px;
            padding: 20px;
            background: #f9fafb;
            border-radius: 12px;
            text-align: right;
        }

        .cart-summary p {
            font-size: 16px;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .cart-summary strong {
            font-weight: 600;
        }

        .free {
            color: #16a34a;
            font-weight: 600;
        }

        .checkout-button {
            background: #16a34a;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            transition: background 0.2s ease, transform 0.2s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .checkout-button:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-wrap: wrap;
            }

            .navbar .brand {
                font-size: 20px;
            }

            .hamburger {
                display: block;
            }

            .navbar .nav-links {
                flex-direction: column;
                background-color: #1a1a1a;
                width: 100%;
                position: absolute;
                top: 60px;
                left: 0;
                display: none;
                padding: 0;
            }

            .navbar .nav-links li {
                padding: 15px 30px;
                border-bottom: 1px solid #444;
            }

            .navbar .nav-links li a {
                font-size: 14px;
            }

            #menu-toggle:checked + .hamburger + .nav-links {
                display: flex;
            }

            .cart-container {
                margin-top: 70px;
                padding: 20px;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
                grid-template-rows: auto auto auto;
                gap: 10px;
            }

            .cart-item img {
                grid-row: 1 / 3;
            }

            .cart-item-details {
                grid-column: 2 / 3;
                grid-row: 1 / 2;
                padding: 0;
            }

            .quantity-controls {
                grid-column: 2 / 3;
                grid-row: 2 / 3;
            }

            .price {
                grid-column: 1 / 3;
                grid-row: 3 / 4;
                text-align: left;
            }

            .remove-btn {
                grid-column: 2 / 3;
                grid-row: 3 / 4;
                justify-self: end;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 10px 15px;
            }

            .navbar .brand {
                font-size: 18px;
            }

            .navbar .nav-links li a {
                font-size: 12px;
            }

            .navbar .nav-links {
                top: 50px;
            }

            .cart-container {
                margin-top: 60px;
            }

            h2 {
                font-size: 24px;
            }

            .cart-item img {
                width: 60px;
                height: 60px;
            }

            .cart-item-details strong {
                font-size: 16px;
            }

            .checkout-button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <div class="cart-container">
        <h2><i class="fa-solid fa-cart-shopping"></i> Shopping Cart - Dendeng</h2>

        <div class="cart-items">
            @php
                $total = 0;
                $totalWeightAll = 0;
            @endphp

            @foreach($cartItems as $index => $item)
                @php
                    $product = $item->product;
                    $subtotal = $product->price * $item->quantity;
                    $total += $subtotal;

                    // Hitung total berat per item (gram)
                    $totalWeight = $item->quantity * 50; // Berat produk dalam gram (50 gram per item)
                    $formattedWeight = $totalWeight >= 1000
                        ? number_format($totalWeight / 1000, 2) . ' kg'
                        : $totalWeight . ' gram';

                    $totalWeightAll += $totalWeight;
                @endphp

                <div class="cart-item" id="item-{{ $item->id }}">
                    <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}">

                    <div class="cart-item-details">
                        <strong>{{ $product->name }}</strong>
                        <span>Berat: {{ $formattedWeight }}</span>
                    </div>

                    <div class="quantity-controls">
                        <form action="{{ route('users.cart.update', $item->id) }}" method="POST" class="quantity-form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="change" value="-1">
                            <button type="submit" class="qty-btn"><i class="fa-solid fa-minus"></i></button>
                        </form>

                        <input type="text" class="qty-input" value="{{ $item->quantity }}" readonly>

                        <form action="{{ route('users.cart.update', $item->id) }}" method="POST" class="quantity-form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="change" value="1">
                            <button type="submit" class="qty-btn"><i class="fa-solid fa-plus"></i></button>
                        </form>
                    </div>

                    <div class="price">Rp{{ number_format($subtotal, 0, ',', '.') }}</div>

                    <form action="{{ route('users.cart.remove', $item->product_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="remove-btn" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="cart-summary">
            <p><strong>Total: <span id="total-price">Rp{{ number_format($total, 0, ',', '.') }}</span></strong></p>

            @php
                $formattedTotalWeight = $totalWeightAll >= 1000
                    ? number_format($totalWeightAll / 1000, 2) . ' kg'
                    : $totalWeightAll . ' gram';
            @endphp

            <p><strong>Total Berat: </strong>{{ $formattedTotalWeight }}</p>
            <p>🚚 Pengiriman: <span class="free">Gratis</span></p>

            <button class="checkout-button" onclick="window.location.href='{{ route('checkout.index') }}'">
                <i class="fa-solid fa-credit-card"></i> Checkout
            </button>
        </div>
    </div>

</body>
</html>
