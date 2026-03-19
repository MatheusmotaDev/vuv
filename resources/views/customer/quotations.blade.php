<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar Cotações - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Acompanhar Cotações</h1>
            <p>Veja o status e as propostas de cada cotação</p>
        </div>

        @foreach($quotations as $quotation)
        <div class="vuv-quotation-card vuv-animate-fadeInUp vuv-delay-{{ min($loop->iteration, 3) }}">
            <div class="vuv-quotation-header">
                <i class="fas fa-file-alt" style="margin-right: 0.5rem;"></i>
                Cotação #{{ $quotation->id }} — {{ $quotation->name }}
            </div>
            <div class="vuv-quotation-body">
                <h6 style="font-weight: 700; color: var(--vuv-text-dark); margin-bottom: 0.5rem;">Detalhes da Cotação</h6>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.9rem; line-height: 1.7;">
                    <strong>Observações:</strong><br>{{ $quotation->notes }}
                </p>
            </div>
            <div class="vuv-quotation-footer">
                @if($quotation->status === 'open')
                    <span class="vuv-badge vuv-badge-success vuv-badge-dot">Cotação Aberta</span>
                @elseif($quotation->status === 'in_progress')
                    <span class="vuv-badge vuv-badge-info vuv-badge-dot">Em Andamento</span>
                @else
                    <span class="vuv-badge vuv-badge-secondary vuv-badge-dot">Cotação Encerrada</span>
                @endif

                @if($quotation->status === 'closed')
                    <a href="{{ route('customer.quotations.items', $quotation->id) }}" class="vuv-btn vuv-btn-primary vuv-btn-sm">
                        <i class="fas fa-list"></i> Ver Itens
                    </a>
                @else
                    <a href="{{ route('customer.quotations.budgets', $quotation->id) }}" class="vuv-btn vuv-btn-primary vuv-btn-sm">
                        <i class="fas fa-file-invoice-dollar"></i> Ver Propostas
                    </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
