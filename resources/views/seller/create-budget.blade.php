<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposta de Orçamento - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('seller.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem; padding-bottom: 2rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Proposta de Orçamento</h1>
            <p>Cotação de {{ $quotation->costumer->name }}</p>
        </div>

        @if (session('success'))
            <div class="vuv-alert vuv-alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <div class="vuv-section vuv-animate-fadeInUp vuv-delay-1">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <span style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--vuv-text-muted);">Endereço de Entrega</span>
                    <p style="font-weight: 600; color: var(--vuv-text-dark); margin: 0.25rem 0 0;">{{ $quotation->shipping_address }}</p>
                </div>
                <div>
                    <span style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--vuv-text-muted);">Observações</span>
                    <p style="font-weight: 500; color: var(--vuv-text-dark-secondary); margin: 0.25rem 0 0;">{{ $quotation->notes }}</p>
                </div>
            </div>
        </div>

        <form id="budgetForm" method="POST" action="{{ route('quotations.storeBudget', ['quotation' => $quotation]) }}">
            @csrf
            @method('POST')

            <h3 style="font-weight: 700; font-size: 1.1rem; color: var(--vuv-text-dark); margin: 1.5rem 0 1rem;">
                <i class="fas fa-tags" style="color: var(--vuv-amber); margin-right: 0.5rem;"></i>
                Valores por Peça
            </h3>

            @foreach($quotation->items as $item)
            <div class="vuv-card vuv-animate-fadeInUp vuv-delay-{{ min($loop->iteration, 3) }}" style="margin-bottom: 1rem;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 0.75rem;">
                    <h5 style="font-weight: 700; color: var(--vuv-text-dark); margin: 0;">{{ $item->name }}</h5>
                    <span class="vuv-badge vuv-badge-info">{{ $item->category }}</span>
                </div>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-bottom: 0.25rem;">{{ $item->description }}</p>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-bottom: 0.75rem;">
                    <strong>Quantidade:</strong> {{ $item->quantity }}
                </p>
                <div style="display: flex; gap: 0.5rem; align-items: flex-end; flex-wrap: wrap;">
                    <div style="flex: 1; min-width: 200px;">
                        <label for="price-{{ $item->id }}" class="vuv-form-label vuv-form-label-dark">Preço Unitário</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: var(--vuv-navy); color: white; border: 1px solid rgba(0,0,0,0.1);">R$</span>
                            <input type="number" step="0.01" class="form-control price" id="price-{{ $item->id }}" name="prices[{{ $item->id }}]" data-quantity="{{ $item->quantity }}" placeholder="0.00" required style="border: 1px solid rgba(0,0,0,0.1);">
                        </div>
                    </div>
                    <button class="vuv-btn vuv-btn-primary vuv-btn-sm confirm-price" type="button" data-item-id="{{ $item->id }}" data-item-price="{{ $item->price }}">
                        <i class="fas fa-check"></i> Confirmar
                    </button>
                </div>
            </div>
            @endforeach

            <div class="vuv-section" style="background: rgba(16, 185, 129, 0.06); border-color: rgba(16, 185, 129, 0.15);">
                <label class="vuv-form-label vuv-form-label-dark" style="font-size: 0.9rem;">Valor Total do Orçamento</label>
                <input type="hidden" id="total-price" name="total-price" value="0.00">
                <input type="text" class="vuv-form-control vuv-form-control-light" id="total-price-display" value="R$ 0.00" disabled style="font-size: 1.25rem; font-weight: 700; color: var(--vuv-emerald); background: white;">
            </div>

            <div style="display: flex; gap: 0.75rem; justify-content: center; padding: 1rem 0;">
                <button type="submit" class="vuv-btn vuv-btn-success vuv-btn-lg">
                    <i class="fas fa-paper-plane"></i> Enviar Orçamento
                </button>
                <button type="button" class="vuv-btn vuv-btn-outline-dark vuv-btn-lg" id="resetBudget">
                    <i class="fas fa-redo"></i> Zerar
                </button>
            </div>
        </form>

        <div class="modal fade vuv-modal" id="priceModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Preço Confirmado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <i class="fas fa-check-circle" style="font-size: 2.5rem; color: var(--vuv-emerald); margin-bottom: 0.75rem;"></i>
                        <p>O valor foi salvo com sucesso.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="vuv-btn vuv-btn-primary vuv-btn-sm" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/scripts/new-budget.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
