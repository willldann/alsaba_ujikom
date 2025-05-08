<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="title">Registration</div>

    <!-- Menampilkan pesan error -->
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
            <div class="password-wrapper">
              <input type="password" id="password" name="password" placeholder="Enter your password" required>
              <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
            </div>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <div class="password-wrapper">
              <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm your password" required>
              <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('confirm_password', this)"></i>
            </div>
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

        <!-- Tombol Login -->
        <div class="login-container">
          <a href="{{ route('login') }}" class="login-button">Login</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(fieldId, icon) {
      const field = document.getElementById(fieldId);
      if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>

</html>
