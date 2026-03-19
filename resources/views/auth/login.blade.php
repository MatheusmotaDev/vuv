<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VUV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/vuv-modern.css">
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-dark">

<div class="vuv-auth-wrapper">
    <div class="vuv-auth-card">
        <div class="vuv-auth-logo">
            <img src="img/login/vuv.png" alt="VUV">
            <span>VUV</span>
        </div>

        <h2 class="vuv-auth-title">Bem-vindo de volta</h2>
        <p class="vuv-auth-subtitle">Entre com suas credenciais para acessar a plataforma</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if (session('status'))
                <div class="vuv-alert vuv-alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <div class="vuv-form-group">
                <label for="email" class="vuv-form-label">{{ __('Email') }}</label>
                <input id="email" class="vuv-form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seu@email.com" />
                @error('email')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="vuv-form-group">
                <label for="password" class="vuv-form-label">{{ __('Senha') }}</label>
                <input id="password" class="vuv-form-control" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                @error('password')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="vuv-form-group">
                <label class="vuv-form-checkbox">
                    <input type="checkbox" id="remember_me" name="remember">
                    {{ __('Lembrar-me') }}
                </label>
            </div>

            <button type="submit" class="vuv-btn vuv-btn-primary vuv-btn-lg" style="width: 100%;">
                <i class="fas fa-sign-in-alt"></i>
                {{ __('Entrar') }}
            </button>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.25rem; flex-wrap: wrap; gap: 0.5rem;">
                <a href="{{ route('options') }}" style="color: var(--vuv-blue-bright); font-size: 0.875rem; font-weight: 500;">
                    Não é cadastrado?
                </a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--vuv-text-secondary); font-size: 0.875rem;">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
