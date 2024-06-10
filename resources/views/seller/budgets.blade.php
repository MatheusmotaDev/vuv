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
        <h2>Acompanhar Orçamentos</h2>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

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
                        <td>{{ $budget->status }}</td>
                        <td>R$ {{ number_format($budget->total_price, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('budgets.track', $budget->id) }}" class="btn btn-primary">Acompanhar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-gh7hCB2wY9h/LS1wa7Gb72A5iUEuNbU10a8MFu42O1oe9iEfeKXe7MW/axXJC7bX" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-Ys2SmgVBf8fW3fXK0z+WaCzynJ2rtrB+1sbY/ZvRUeR2zNQLeSpibibhav75vNgf" crossorigin="anonymous"></script>
</body>

</html>
