<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotações Disponíveis - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('seller.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Cotações Disponíveis</h1>
            <p>Selecione uma cotação para enviar sua proposta de orçamento</p>
        </div>

        @foreach($quotations as $quotation)
        <div class="vuv-card vuv-animate-fadeInUp vuv-delay-{{ min($loop->iteration, 3) }}" style="margin-bottom: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                <h5 style="font-weight: 700; color: var(--vuv-text-dark); margin: 0;">
                    <i class="fas fa-user" style="color: var(--vuv-blue-light); margin-right: 0.35rem;"></i>
                    {{ $quotation->costumer->name }}
                </h5>
                <span class="vuv-badge vuv-badge-success vuv-badge-dot">Aberta</span>
            </div>

            <div style="margin-bottom: 1rem;">
                <h6 style="font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--vuv-text-muted); margin-bottom: 0.5rem;">Itens Solicitados:</h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach($quotation->items as $item)
                        <li style="padding: 0.35rem 0; color: var(--vuv-text-dark-secondary); font-size: 0.9rem; border-bottom: 1px solid rgba(0,0,0,0.04);">
                            <i class="fas fa-cog" style="color: var(--vuv-blue-light); margin-right: 0.35rem; font-size: 0.8rem;"></i>
                            {{ $item->name }}
                        </li>
                    @endforeach
                </ul>
            </div>

            @if($quotation->notes)
            <p style="color: var(--vuv-text-dark-secondary); font-size: 0.9rem; margin-bottom: 1rem;">
                <strong>Observações:</strong> {{ $quotation->notes }}
            </p>
            @endif

            <div style="text-align: center;">
                <a href="{{ route('quotations.createBudget', $quotation->id) }}" class="vuv-btn vuv-btn-primary">
                    <i class="fas fa-file-invoice-dollar"></i> Fazer Proposta de Orçamento
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
