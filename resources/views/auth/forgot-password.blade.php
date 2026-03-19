<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a Senha - VUV</title>
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

        <div style="text-align: center; margin-bottom: 1.5rem;">
            <div style="width: 64px; height: 64px; border-radius: 16px; background: var(--vuv-gradient-accent); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                <i class="fas fa-lock" style="font-size: 1.5rem; color: var(--vuv-navy);"></i>
            </div>
            <h2 class="vuv-auth-title">Esqueceu sua senha?</h2>
            <p class="vuv-auth-subtitle" style="margin-bottom: 0;">Informe seu e-mail e enviaremos um link para redefinir sua senha</p>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            @if (session('status'))
                <div class="vuv-alert vuv-alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('status') }}
                </div>
            @endif

            <div class="vuv-form-group">
                <label for="email" class="vuv-form-label">{{ __('Email') }}</label>
                <input id="email" class="vuv-form-control" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="seu@email.com" />
                @error('email')
                    <div class="vuv-form-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="vuv-btn vuv-btn-primary vuv-btn-lg" style="width: 100%;">
                <i class="fas fa-paper-plane"></i>
                Enviar Solicitação
            </button>

            <div style="text-align: center; margin-top: 1.25rem;">
                <a href="{{ route('login') }}" style="color: var(--vuv-text-secondary); font-size: 0.875rem;">
                    <i class="fas fa-arrow-left" style="margin-right: 0.35rem;"></i>
                    Voltar para o login
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
