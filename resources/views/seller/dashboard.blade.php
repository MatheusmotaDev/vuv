<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Vendedor - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('seller.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1 class="vuv-greeting">{{ app('App\Http\Controllers\UserController')->saudacaoUsuario() }}</h1>
            <p>Gerencie suas propostas e cotações disponíveis</p>
        </div>

        <div class="vuv-dashboard-grid vuv-animate-fadeInUp vuv-delay-2">
            <a href="{{ route('seller.newBudget') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon emerald">
                    <i class="fas fa-search-dollar"></i>
                </div>
                <h3 class="vuv-card-title">Cotações Disponíveis</h3>
                <p class="vuv-card-text">Encontre cotações em aberto e faça sua proposta de orçamento</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-success vuv-btn-sm">Ver Cotações <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>

            <a href="{{ route('seller.budgets') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon amber">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3 class="vuv-card-title">Acompanhar Orçamentos</h3>
                <p class="vuv-card-text">Veja o andamento das propostas de orçamento que você enviou</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-warning vuv-btn-sm">Acompanhar <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
