<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Cliente - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1 class="vuv-greeting">{{ app('App\Http\Controllers\UserController')->saudacaoUsuario() }}</h1>
            <p>O que deseja fazer hoje?</p>
        </div>

        <div class="vuv-dashboard-grid vuv-animate-fadeInUp vuv-delay-2">
            <a href="{{ route('customer.new-quotation') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h3 class="vuv-card-title">Iniciar Cotação</h3>
                <p class="vuv-card-text">Crie uma nova cotação para encontrar as peças que você precisa</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-primary vuv-btn-sm">Criar <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>

            <a href="{{ route('customer.quotations') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon amber">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h3 class="vuv-card-title">Acompanhar Cotações</h3>
                <p class="vuv-card-text">Veja o status e as propostas recebidas para suas cotações</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-warning vuv-btn-sm">Ver <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>