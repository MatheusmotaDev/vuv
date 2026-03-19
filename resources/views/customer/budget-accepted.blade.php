<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento Aceito - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 800px; padding-top: 1rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Orçamento Aceito</h1>
            <p>Detalhes do orçamento e contato do vendedor</p>
        </div>

        <div class="vuv-card vuv-card-highlight vuv-animate-fadeInUp vuv-delay-1">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
                <div class="vuv-card-icon emerald" style="margin: 0;">
                    <i class="fas fa-handshake"></i>
                </div>
                <div>
                    <h5 style="font-weight: 700; color: var(--vuv-text-dark); margin: 0;">{{ $budget->seller->name }}</h5>
                    <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin: 0;">Vendedor</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <span style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--vuv-text-muted);">CPF/CNPJ</span>
                    <p style="font-weight: 600; color: var(--vuv-text-dark); margin: 0.25rem 0 0;">{{ $budget->seller->legal_id }}</p>
                </div>
                <div>
                    <span style="font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--vuv-text-muted);">Telefone</span>
                    <p style="font-weight: 600; color: var(--vuv-text-dark); margin: 0.25rem 0 0;">{{ $budget->seller->phone_number }}</p>
                </div>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <h6 style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--vuv-text-dark); margin-bottom: 0.75rem;">Itens & Preços</h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach($budget->items as $item)
                        <li style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid rgba(0,0,0,0.05); font-size: 0.9rem;">
                            <span style="color: var(--vuv-text-dark-secondary);">{{ $item->name }}</span>
                            <strong style="color: var(--vuv-text-dark);">R$ {{ number_format($item->pivot->price, 2, ',', '.') }}</strong>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div style="background: rgba(16, 185, 129, 0.06); border-radius: 12px; padding: 1rem; text-align: center; margin-bottom: 1.5rem;">
                <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--vuv-emerald); font-weight: 600;">Valor Total</span>
                <p style="font-size: 1.75rem; font-weight: 800; color: var(--vuv-emerald); margin: 0.25rem 0 0;">
                    R$ {{ number_format($budget->total_price, 2, ',', '.') }}
                </p>
            </div>

            @php
                $phone_number = preg_replace('/[^0-9]/', '', $budget->seller->phone_number);
            @endphp

            <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
                <a href="https://wa.me/55{{ $phone_number }}" class="vuv-btn vuv-btn-whatsapp vuv-btn-lg" target="_blank">
                    <i class="fab fa-whatsapp"></i> Contato via WhatsApp
                </a>
                <form action="{{ route('customer.quotation.close', $budget->quotation->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="vuv-btn vuv-btn-danger vuv-btn-lg">
                        <i class="fas fa-times-circle"></i> Encerrar Cotação
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
