<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha - VUV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/vuv-modern.css">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-dark">

<div class="vuv-auth-wrapper">
    <div class="vuv-auth-card">
        <div class="vuv-auth-logo">
            <img src="/img/login/vuv.png" alt="VUV">
            <span>VUV</span>
        </div>

        <h2 class="vuv-auth-title">Redefinir Senha</h2>
        <p class="vuv-auth-subtitle">Escolha sua nova senha de acesso</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="vuv-form-group">
                <label for="email" class="vuv-form-label">{{ __('Email') }}</label>
                <input id="email" class="vuv-form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                @error('email')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="vuv-form-group">
                <label for="password" class="vuv-form-label">{{ __('Nova Senha') }}</label>
                <input id="password" class="vuv-form-control" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                @error('password')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="vuv-form-group">
                <label for="password_confirmation" class="vuv-form-label">{{ __('Confirmar Senha') }}</label>
                <input id="password_confirmation" class="vuv-form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                @error('password_confirmation')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="vuv-btn vuv-btn-primary vuv-btn-lg" style="width: 100%;">
                <i class="fas fa-key"></i>
                Redefinir Senha
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
