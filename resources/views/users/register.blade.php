<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="content">
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nama Anda</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Anda" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Isi Nomor Telepon" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required id="password">
            <span class="toggle-password" onclick="togglePassword('password', this)">
              <svg xmlns="http://www.w3.org/2000/svg" id="eye" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                <circle cx="12" cy="12" r="3" stroke="currentColor" />
              </svg>
            </span>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required id="confirmPassword">
            <span class="toggle-password" onclick="togglePassword('confirmPassword', this)">
              <svg xmlns="http://www.w3.org/2000/svg" id="eye" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                <circle cx="12" cy="12" r="3" stroke="currentColor" />
              </svg>
            </span>
          </div>
        </div>

        <div class="gender-details">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label>
              <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
              <span class="dot"></span> Male
            </label>
            <label>
              <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
              <span class="dot"></span> Female
            </label>
            <label>
              <input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
              <span class="dot"></span> Prefer not to say
            </label>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>

        <p style="text-align: center;">Sudah punya akun? <a href="{{ route('login') }}" class="login-button">Login di sini</a></p>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(inputId, el) {
      const input = document.getElementById(inputId);
      const eye = el.querySelector("svg");

      if (input.type === "password") {
        input.type = "text";
        eye.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M17.94 17.94A10.94 10.94 0 0112 19C5 19 1 12 1 12a21.21 21.21 0 015.17-5.88M22.54 12.88A10.94 10.94 0 0023 12s-4-7-11-7a11.05 11.05 0 00-3.38.55M1 1l22 22" />
        `;
      } else {
        input.type = "password";
        eye.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
          <circle cx="12" cy="12" r="3" stroke="currentColor" />
        `;
      }
    }
  </script>
</body>

</html>
