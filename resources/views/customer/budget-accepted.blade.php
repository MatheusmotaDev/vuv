<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento Aceito</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('customer.navbar')

    <div class="container mt-4">
        <h2>Orçamento Aceito</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Vendedor: {{ $budget->seller->name }}</h5>
                <p class="card-text">CPF/CNPJ: {{ $budget->seller->legal_id }}</p> <!-- Correção aqui -->
                <p class="card-text">Telefone: {{ $budget->seller->phone_number }}</p> <!-- Correção aqui -->

                <h6>Itens da Cotação:</h6>
                <ul>
                    @foreach($budget->quotation->items as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>

                <h6>Preços dos Itens do Orçamento:</h6>
                <ul>
                    @foreach($budget->items as $item)
                        <li>{{ $item->name }} - R$ {{ number_format($item->pivot->price, 2, ',', '.') }}</li>
                    @endforeach
                </ul>

                <p class="card-text">Valor Total do Orçamento: R$ {{ number_format($budget->total_price, 2, ',', '.') }}</p>

                <div class="text-center mt-3">
                    <a href="https://wa.me/{{ $budget->seller->phone_number }}" class="btn btn-success" target="_blank">Contato via WhatsApp</a>
                    <form action="{{ route('customer.quotation.close', $budget->quotation->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Encerrar Orçamento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
