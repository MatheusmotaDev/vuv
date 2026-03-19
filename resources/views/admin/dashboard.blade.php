<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('admin.navbar')

    <div class="container" style="max-width: 1000px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1 class="vuv-greeting">Painel Administrativo</h1>
            <p>Gerencie cotações, usuários e ferramentas da plataforma</p>
        </div>

        <div class="vuv-dashboard-grid vuv-animate-fadeInUp vuv-delay-2" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
            <a href="{{ route('admin.quotations.index') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h3 class="vuv-card-title">Listar Cotações</h3>
                <p class="vuv-card-text">Visualize e gerencie todas as cotações da plataforma</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-primary vuv-btn-sm">Abrir <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>

            <a href="{{ route('admin.users.index') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon amber">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="vuv-card-title">Listar Usuários</h3>
                <p class="vuv-card-text">Veja todos os usuários registrados na plataforma</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-warning vuv-btn-sm">Verificar <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>

            <a href="{{ url('/telescope') }}" class="vuv-card vuv-card-action" style="text-decoration: none;">
                <div class="vuv-card-icon emerald">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="vuv-card-title">Telescope</h3>
                <p class="vuv-card-text">Ferramentas de desenvolvimento e monitoramento</p>
                <div style="margin-top: 1rem;">
                    <span class="vuv-btn vuv-btn-success vuv-btn-sm">Acessar <i class="fas fa-arrow-right" style="margin-left: 0.25rem;"></i></span>
                </div>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
