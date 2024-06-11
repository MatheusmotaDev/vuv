<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhar Orçamentos</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('seller.navbar')

    <div class="container mt-4">
        <h2 class="text-center mb-4">Acompanhar Orçamentos</h2>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive"> <!-- Adicionando classe para tornar a tabela responsiva -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome do Cliente</th>
                        <th>Status do Orçamento</th>
                        <th>Valor Total</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($budgets as $budget)
                        <tr>
                            <td>{{ $budget->quotation->costumer->name }}</td>
                            <td>
                                @if($budget->quotation->status !== 'closed')
                                    @if($budget->status === 'accepted')
                                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Aceito</div>
                                        </div>
                                    @elseif($budget->status === 'pending')
                                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Aguardando resposta do cliente</div>
                                        </div>
                                    @elseif($budget->status === 'refused')
                                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Seu orçamento não foi aceito</div>
                                        </div>
                                    @endif
                                @else
                                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                        <div class="card-header">Cotação Encerrada</div>
                                    </div>
                                @endif
                            </td>
                            <td>R$ {{ number_format($budget->total_price, 2, ',', '.') }}</td>
                            <td>
                                @if($budget->quotation->status !== 'closed')
                                    @if($budget->status === 'accepted')
                                        <a href="{{ route('budgets.track', $budget->id) }}" class="btn btn-primary">Acompanhar</a>
                                    @elseif($budget->status === 'pending')
                                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Aguardando resposta do cliente</div>
                                        </div>
                                    @elseif($budget->status === 'refused')
                                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                            <div class="card-header">Seu orçamento não foi aceito</div>
                                        </div>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>
