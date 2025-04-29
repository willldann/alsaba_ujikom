<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="/css/register.css">
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
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
          </div>
        </div>

        <div class="gender-details">
          <span class="gender-title">Gender</span>
          <div class="category">
            <input type="radio" name="gender" value="male" id="dot-1" {{ old('gender') == 'male' ? 'checked' : '' }} required>
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
              <span class="dot"></span> Prefer not to say
            </label>
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Register">
        </div>

        <!-- Tombol Kembali ke Login -->
        <!-- Tombol Login -->
        <div class="login-container">
          <a href="{{ route('login') }}" class="login-button">Login</a>
        </div>

      </form>
    </div>
  </div>
</body>

</html>
