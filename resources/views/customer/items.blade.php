<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itens da Cotação - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 900px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Peças da Cotação #{{ $quotation->id }}</h1>
        </div>

        <div class="vuv-table-wrapper vuv-animate-fadeInUp vuv-delay-1">
            <table class="vuv-table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotation->items as $item)
                    <tr>
                        <td style="font-weight: 600;">{{ $item->name }}</td>
                        <td><span class="vuv-badge vuv-badge-info">{{ $item->category }}</span></td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>