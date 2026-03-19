<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('admin.navbar')

    <div class="container" style="max-width: 1000px; padding-top: 1rem; padding-bottom: 2rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Listar Usuários</h1>
            <p>Todos os usuários registrados na plataforma</p>
        </div>

        @if(session('success'))
            <div class="vuv-alert vuv-alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="vuv-table-wrapper vuv-animate-fadeInUp vuv-delay-1">
            <table class="vuv-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td style="font-weight: 600;">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->getRole() === 'admin')
                                <span class="vuv-badge vuv-badge-danger vuv-badge-dot">Admin</span>
                            @elseif($user->getRole() === 'seller')
                                <span class="vuv-badge vuv-badge-info vuv-badge-dot">Vendedor</span>
                            @else
                                <span class="vuv-badge vuv-badge-success vuv-badge-dot">Cliente</span>
                            @endif
                        </td>
                        <td>
                            <button class="vuv-btn vuv-btn-danger vuv-btn-sm" disabled style="opacity: 0.4; cursor: not-allowed;">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                            <span style="display: block; font-size: 0.75rem; color: var(--vuv-text-muted); margin-top: 0.25rem;">Disponível em breve</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('admin.dashboard') }}" class="vuv-btn vuv-btn-outline-dark">
                <i class="fas fa-arrow-left"></i> Voltar para o Painel
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
