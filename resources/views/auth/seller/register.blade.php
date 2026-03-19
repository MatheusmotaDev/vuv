<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendedor - VUV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/vuv-modern.css">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-dark">

<div class="vuv-auth-wrapper">
    <div class="vuv-auth-card vuv-auth-card-wide">
        <div class="vuv-auth-logo">
            <img src="/img/login/vuv.png" alt="VUV">
            <span>VUV</span>
        </div>

        <h2 class="vuv-auth-title">Cadastro de Vendedor</h2>
        <p class="vuv-auth-subtitle">Crie sua conta para começar a oferecer orçamentos</p>

        <form method="POST" action="{{ route('seller.store') }}">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="vuv-form-group">
                    <label for="name" class="vuv-form-label">{{ __('Nome') }}</label>
                    <input id="name" class="vuv-form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Seu nome completo" />
                    @error('name')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="vuv-form-group">
                    <label for="email" class="vuv-form-label">{{ __('Email') }}</label>
                    <input id="email" class="vuv-form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
                    @error('email')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="vuv-form-group">
                    <label for="legal_id" class="vuv-form-label">{{ __('CPF ou CNPJ') }}</label>
                    <input id="legal_id" class="vuv-form-control" type="text" name="legal_id" :value="old('legal_id')" required placeholder="000.000.000-00" />
                    @error('legal_id')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="vuv-form-group">
                    <label for="phone_number" class="vuv-form-label">{{ __('Telefone') }}</label>
                    <input id="phone_number" class="vuv-form-control" type="text" name="phone_number" :value="old('phone_number')" required placeholder="(00) 90000-0000" />
                    @error('phone_number')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="vuv-form-group">
                    <label for="password" class="vuv-form-label">{{ __('Senha (8+ dígitos)') }}</label>
                    <input id="password" class="vuv-form-control" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                    @error('password')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="vuv-form-group">
                    <label for="password_confirmation" class="vuv-form-label">{{ __('Confirmar senha') }}</label>
                    <input id="password_confirmation" class="vuv-form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                    @error('password_confirmation')
                        <div class="vuv-form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 0.5rem; flex-wrap: wrap; gap: 0.75rem;">
                <a href="{{ route('login') }}" style="color: var(--vuv-blue-bright); font-size: 0.875rem; font-weight: 500;">
                    Já é registrado?
                </a>
                <button type="submit" class="vuv-btn vuv-btn-primary">
                    <i class="fas fa-store"></i>
                    {{ __('Registrar') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="/scripts/seller-register.js"></script>
</body>
</html>
