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
        <h2>Proposta de Orçamento para cotação de {{ $quotation->customer_name }}</h2>
        <p><strong>Endereço:</strong> {{ $quotation->shipping_address }}</p>
        <p><strong>Observações Gerais da Cotação:</strong> {{ $quotation->notes }}</p>

        <hr>

        <h3>Valores por Peças:</h3>

        @php
            $totalPrice = 0;
        @endphp

        @foreach($quotation->items as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Peça: {{ $item->name }}</h5>
                    <p>Categoria: {{ $item->category }}</p>
                    <p>Descrição do Item: {{ $item->description }}</p>
                    <p>Quantidade: {{ $item->quantity }}</p>
                    <div class="mb-3">
                        <label for="price-{{ $item->id }}" class="form-label">Preço:</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="number" step="0.01" class="form-control price" id="price-{{ $item->id }}" name="prices[{{ $item->id }}]" placeholder="Preço" required>
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Confirmar Preço</button>
                        </div>
                    </div>
                    @php
                        $totalPrice += $item->quantity * 0; // Inicializa o preço total deste item como 0
                    @endphp
                </div>
            </div>
        @endforeach

        <div class="mb-3">
            <label for="total-price" class="form-label">Valor Total do Orçamento:</label>
            <input type="text" class="form-control" id="total-price" value="R$ {{ number_format($totalPrice, 2) }}" disabled>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Orçamento</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-gh7hCB2wY9h/LS1wa7Gb72A5iUEuNbU10a8MFu42O1oe9iEfeKXe7MW/axXJC7bX" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-Ys2SmgVBf8fW3fXK0z+WaCzynJ2rtrB+1sbY/ZvRUeR2zNQLeSpibibhav75vNgf" crossorigin="anonymous"></script>
</body>
</html>
