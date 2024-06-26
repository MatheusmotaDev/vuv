<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotações Disponíveis</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('seller.navbar')

    <div class="container mt-4">
        <h2 class="text-center">Cotações Disponíveis</h2>
        @foreach($quotations as $quotation)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Nome do Cliente: {{ $quotation->costumer->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Itens da Cotação:</h6>
                    <ul class="list-group list-group-flush">
                        @foreach($quotation->items as $item)
                            <li class="list-group-item">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                    <p class="card-text mt-3">{{ $quotation->notes }}</p>
                    <div class="text-center">
                        <a href="{{ route('quotations.createBudget', $quotation->id) }}" class="btn btn-primary">Fazer Proposta de Orçamento</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-gh7hCB2wY9h/LS1wa7Gb72A5iUEuNbU10a8MFu42O1oe9iEfeKXe7MW/axXJC7bX" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-Ys2SmgVBf8fW3fXK0z+WaCzynJ2rtrB+1sbY/ZvRUeR2zNQLeSpibibhav75vNgf" crossorigin="anonymous"></script>
</body>
</html>
