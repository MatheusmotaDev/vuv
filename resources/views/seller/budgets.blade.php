<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar Orçamentos - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('seller.navbar')

    <div class="container" style="max-width: 960px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Acompanhar Orçamentos</h1>
            <p>Veja o status das suas propostas enviadas</p>
        </div>

        @if(session('success'))
            <div class="vuv-alert vuv-alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="vuv-table-wrapper vuv-animate-fadeInUp vuv-delay-1">
            <table class="vuv-table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Valor Total</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($budgets as $budget)
                    <tr>
                        <td style="font-weight: 600;">{{ $budget->quotation->costumer->name }}</td>
                        <td>
                            @if($budget->quotation->status === 'closed')
                                <span class="vuv-badge vuv-badge-secondary vuv-badge-dot">Cotação Encerrada</span>
                            @elseif($budget->status === 'accepted')
                                <span class="vuv-badge vuv-badge-success vuv-badge-dot">Aceito</span>
                            @elseif($budget->status === 'pending')
                                <span class="vuv-badge vuv-badge-warning vuv-badge-dot">Aguardando</span>
                            @elseif($budget->status === 'refused')
                                <span class="vuv-badge vuv-badge-danger vuv-badge-dot">Recusado</span>
                            @endif
                        </td>
                        <td style="font-weight: 600; color: var(--vuv-emerald);">R$ {{ number_format($budget->total_price, 2, ',', '.') }}</td>
                        <td>
                            @if($budget->quotation->status !== 'closed' && $budget->status === 'accepted')
                                <a href="{{ route('budgets.track', $budget->id) }}" class="vuv-btn vuv-btn-primary vuv-btn-sm">
                                    <i class="fas fa-eye"></i> Acompanhar
                                </a>
                            @elseif($budget->status === 'pending')
                                <span style="color: var(--vuv-text-muted); font-size: 0.85rem;">Aguardando cliente</span>
                            @elseif($budget->status === 'refused')
                                <span style="color: var(--vuv-text-muted); font-size: 0.85rem;">Não aceito</span>
                            @else
                                <span style="color: var(--vuv-text-muted); font-size: 0.85rem;">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
