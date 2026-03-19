<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo à VUV!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/vuv-modern.css">
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-dark">

<div class="vuv-auth-wrapper">
    <div class="vuv-auth-card" style="max-width: 560px;">
        <div class="vuv-auth-logo">
            <img src="/img/options/vuv.png" alt="VUV">
            <span>VUV</span>
        </div>

        <h2 class="vuv-auth-title">Seja bem-vindo!</h2>
        <p class="vuv-auth-subtitle">Selecione como deseja se cadastrar na plataforma</p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 2rem;">
            <a href="{{ route('register') }}" class="vuv-card vuv-card-dark vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon" style="margin-bottom: 1rem;">
                    <i class="fas fa-user"></i>
                </div>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: white; margin-bottom: 0.35rem;">Cliente</h3>
                <p style="font-size: 0.8rem; color: var(--vuv-text-secondary); margin: 0;">Faça cotações e encontre as melhores peças</p>
            </a>

            <a href="{{ route('seller.register') }}" class="vuv-card vuv-card-dark vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon amber" style="margin-bottom: 1rem;">
                    <i class="fas fa-store"></i>
                </div>
                <h3 style="font-size: 1.1rem; font-weight: 700; color: white; margin-bottom: 0.35rem;">Vendedor</h3>
                <p style="font-size: 0.8rem; color: var(--vuv-text-secondary); margin: 0;">Ofereça orçamentos e amplie suas vendas</p>
            </a>
        </div>

        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
            <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.1);"></div>
            <span style="color: var(--vuv-text-muted); font-size: 0.85rem;">ou</span>
            <div style="flex: 1; height: 1px; background: rgba(255,255,255,0.1);"></div>
        </div>

        <a href="{{ route('login') }}" class="vuv-btn vuv-btn-outline vuv-btn-lg" style="width: 100; display: flex;">
            <i class="fas fa-sign-in-alt"></i>
            Fazer Login
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
