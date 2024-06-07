<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposta de Orçamento</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('seller.navbar')

    <div class="container mt-4">
        <h2>Proposta de Orçamento para cotação de {{ $quotation->costumer->name }}</h2>

        <p><strong>Endereço:</strong> {{ $quotation->shipping_address }}</p>
        <p><strong>Observações Gerais da Cotação:</strong> {{ $quotation->notes }}</p>

        <hr>

        <h3>Valores por Peças:</h3>

        <form id="budgetForm" method="POST">
            @csrf
            @method('POST')
            
            @foreach($quotation->items as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Peça: {{ $item->name }}</h5>
                        <p>Categoria: {{ $item->category }}</p>
                        <p>Descrição do Item: {{ $item->description }}</p>
                        <p>Quantidade: {{ $item->quantity }}</p>
                        <div class="mb-3">
                            <label for="price-{{ $item->id }}">Preço:</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" step="0.01" class="form-control price" id="price-{{ $item->id }}" name="prices[{{ $item->id }}]" data-quantity="{{ $item->quantity }}" placeholder="Preço" required>
                                <button class="btn btn-outline-secondary confirm-price" type="button" data-item-id="{{ $item->id }}" data-item-price="{{ $item->price }}" id="button-addon2">Confirmar Preço</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <div class="mb-3">
                <label for="total-price-display" class="form-label">Valor Total do Orçamento:</label>
                <input type="hidden" id="total-price" name="total-price" value="0.00">
                <input type="text" class="form-control" id="total-price-display" value="R$ 0.00" disabled>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar Orçamento</button>
            <button type="button" class="btn btn-secondary" id="resetBudget">Zerar Orçamento</button>
        </form>
        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="priceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceModalLabel">Preço Confirmado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O valor foi salvo.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="/scripts/new-budget.js"></script>
</body>
</html>
