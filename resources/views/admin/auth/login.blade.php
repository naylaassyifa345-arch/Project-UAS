<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

<div class="auth-wrapper">

    {{-- Left Image --}}
    <div class="auth-illustration">
        <div class="overlay">
            <div class="brand">
                <img src="{{ asset('img/coffee-logo.png') }}" alt="Cafe Logo">
                <h3>Cafe Management</h3>
                <p>Simple • Cozy • Modern</p>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <div class="auth-form">
        <h2>Welcome Back ☕</h2>
        <p class="subtitle">Login untuk masuk ke sistem manajemen cafe</p>

        {{-- Error --}}
        @if ($errors->any())
            <div class="auth-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label>Username / Email</label>
                <input type="text" name="login" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">
                Login
            </button>
        </form>
    </div>

</div>

</body>
</html>
