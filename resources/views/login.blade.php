<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="login-container">

    <div class="login-box">

        <h2>Login Admin</h2>
        <p>Silahkan masuk ke halaman admin pesantren</p>

        {{-- ERROR LOGIN --}}
        @if(session('error'))
            <div style="color:red; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email"
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

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>
