<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Dendeng Shop</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="/assets/logo.jpeg" alt="Dendeng Shop">
        </div>
        <h2>Masuk ke Akun Anda</h2>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p class="register-link">Belum punya akun? <a href="{{ route('register')}}">Daftar di sini</a></p>
        </form>
    </div>
</body>
</html>