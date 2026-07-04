<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Admin</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <h2>Buat Akun Admin</h2>
        <p>Lengkapi data di bawah untuk mendaftar sebagai admin pesantren</p>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div style="color:red; margin-bottom:15px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ERROR / SUKSES DARI SESSION --}}
        @if(session('error'))
            <div style="color:red; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div style="color:#1F4D3D; margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password"
                       name="password"
                       placeholder="Masukkan password"
                       required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password"
                       name="password_confirmation"
                       placeholder="Ulangi password"
                       required>
            </div>

            <button type="submit" class="login-btn">
                Daftar
            </button>
        </form>

        <p style="margin-top:22px; margin-bottom:0; font-size:13.5px;">
            Sudah punya akun?
            <a href="{{ route('login') }}" style="color:#1F4D3D; font-weight:600; text-decoration:none;">
                Login di sini
            </a>
        </p>
    </div>
</div>
</body>
</html>