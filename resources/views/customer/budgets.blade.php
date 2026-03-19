<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propostas de Orçamento - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Propostas de Orçamento</h1>
            <p>Cotação #{{ $quotation->id }} — Analise e escolha a melhor proposta</p>
        </div>

        @if (session('success'))
            <div class="vuv-alert vuv-alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($budgets->isEmpty())
            <div class="vuv-card" style="text-align: center; padding: 3rem;">
                <i class="fas fa-inbox" style="font-size: 3rem; color: var(--vuv-text-muted); margin-bottom: 1rem;"></i>
                <h3 style="font-weight: 600; color: var(--vuv-text-dark-secondary);">Nenhuma proposta recebida</h3>
                <p style="color: var(--vuv-text-muted);">Verifique novamente mais tarde</p>
            </div>
        @endif

        @foreach($budgets as $budget)
        <div class="vuv-card vuv-animate-fadeInUp vuv-delay-{{ min($loop->iteration, 3) }}" style="margin-bottom: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem;">
                <div>
                    <h5 style="font-weight: 700; color: var(--vuv-text-dark); margin-bottom: 0.25rem;">
                        <i class="fas fa-store" style="color: var(--vuv-blue-light); margin-right: 0.35rem;"></i>
                        {{ $budget->seller->name }}
                    </h5>
                    <p style="color: var(--vuv-text-dark-secondary); font-size: 0.95rem; font-weight: 600;">
                        Valor Total: <span style="color: var(--vuv-emerald);">R$ {{ number_format($budget->total_price, 2, ',', '.') }}</span>
                    </p>
                </div>
                @if($budget->status === 'accepted')
                    <span class="vuv-badge vuv-badge-success vuv-badge-dot">Aceito</span>
                @elseif($budget->status === 'pending')
                    <span class="vuv-badge vuv-badge-warning vuv-badge-dot">Pendente</span>
                @elseif($budget->status === 'refused')
                    <span class="vuv-badge vuv-badge-danger vuv-badge-dot">Recusado</span>
                @endif
            </div>

            <div style="margin-bottom: 1rem;">
                <h6 style="font-weight: 600; font-size: 0.85rem; color: var(--vuv-text-dark-secondary); text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 0.5rem;">Itens:</h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach($budget->items as $item)
                        <li style="padding: 0.35rem 0; color: var(--vuv-text-dark-secondary); font-size: 0.9rem; border-bottom: 1px solid rgba(0,0,0,0.04);">
                            {{ $item->name }} — <strong style="color: var(--vuv-text-dark);">R$ {{ number_format($item->pivot->price, 2, ',', '.') }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div style="display: flex; gap: 0.5rem; justify-content: flex-end; flex-wrap: wrap;">
                @if($budget->status === 'refused')
                    <span style="color: var(--vuv-red); font-size: 0.875rem; font-weight: 500;">Você recusou este orçamento</span>
                @elseif($budget->status === 'accepted')
                    <a href="{{ route('customer.budgets.accepted', [$quotation->id, $budget->id]) }}" class="vuv-btn vuv-btn-primary vuv-btn-sm">
                        <i class="fas fa-eye"></i> Acompanhar
                    </a>
                @elseif($quotation->budgets->where('status', 'accepted')->isNotEmpty())
                    <span style="color: var(--vuv-amber); font-size: 0.875rem; font-weight: 500;">Limite de 1 orçamento aceito por cotação</span>
                @else
                    <form action="{{ route('customer.budgets.accept', [$quotation->id, $budget->id]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="vuv-btn vuv-btn-success vuv-btn-sm">
                            <i class="fas fa-check"></i> Aceitar
                        </button>
                    </form>
                    <form action="{{ route('customer.budgets.refuse', [$quotation->id, $budget->id]) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="vuv-btn vuv-btn-danger vuv-btn-sm">
                            <i class="fas fa-times"></i> Recusar
                        </button>
                    </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
