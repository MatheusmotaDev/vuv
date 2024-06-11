<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propostas de Orçamento</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('customer.navbar')

    <div class="container mt-4">
        <h2>Propostas de Orçamento para Cotação #{{ $quotation->id }}</h2>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <br>

        @if ($budgets->isEmpty())
        <h3 class="text-center">Por enquanto não há propostas, verifique em outro momento.</h3>
    @endif

        @foreach($budgets as $budget)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Orçamento de: {{ $budget->seller->name }}</h5>
                    <p class="card-text">Valor Total: R$ {{ number_format($budget->total_price, 2, ',', '.') }}</p>

                    <h6>Itens:</h6>
                    <ul>
                        @foreach($budget->items as $item)
                            <li>{{ $item->name }} - R$ {{ number_format($item->pivot->price, 2, ',', '.') }}</li>
                        @endforeach
                    </ul>

                    <div class="text-end mt-3">
                        @if($budget->status === 'refused')
                            <span class="text-danger">Você recusou o orçamento</span>
                        @elseif($budget->status === 'accepted')
                            <a href="{{ route('customer.budgets.accepted', [$quotation->id, $budget->id]) }}" class="btn btn-secondary">Acompanhar</a>
                        @elseif($quotation->budgets->where('status', 'accepted')->isNotEmpty())
                            <span class="text-warning">Você não pode aceitar mais de um orçamento por cotação</span>
                        @else
                            <form action="{{ route('customer.budgets.accept', [$quotation->id, $budget->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Aceitar</button>
                            </form>
                            <form action="{{ route('customer.budgets.refuse', [$quotation->id, $budget->id]) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Recusar</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    @if($budget->status === 'accepted')
                        <div class="card text-white bg-success" style="width: 8rem;">
                            <div class="card-body">
                                Você aceitou o orçamento
                            </div>
                        </div>
                    @elseif($budget->status === 'pending')
                        <div class="card text-white bg-warning" style="width: 8rem;">
                            <div class="card-body">
                                Pendente
                            </div>
                        </div>
                    @elseif($budget->status === 'refused')
                        <div class="card text-white bg-danger" style="width: 8rem;">
                            <div class="card-body">
                                Recusado
                            </div>
                        </div>
                    @else
                        Status: {{ $budget->status }}
                    @endif
                </div>
                
                
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>
