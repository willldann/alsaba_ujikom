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
                <span class="toggle-password" onclick="togglePassword()">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                        <circle cx="12" cy="12" r="3" stroke="currentColor" />
                    </svg>
                    <svg id="eyeOffIcon" style="display:none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.94 17.94A10.94 10.94 0 0112 19C5 19 1 12 1 12a21.21 21.21 0 015.17-5.88M22.54 12.88A10.94 10.94 0 0023 12s-4-7-11-7a11.05 11.05 0 00-3.38.55M1 1l22 22" />
                    </svg>
                </span>
            </div>
            <button type="submit" class="btn">Login</button>
            <p class="register-link">Belum punya akun? <a href="{{ route('register')}}">Daftar di sini</a></p>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
            const eyeOffIcon = document.getElementById("eyeOffIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.style.display = "none";
                eyeOffIcon.style.display = "inline";
            } else {
                passwordInput.type = "password";
                eyeIcon.style.display = "inline";
                eyeOffIcon.style.display = "none";
            }
        }
    </script>
</body>
</html>
