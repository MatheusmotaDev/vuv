<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cotações - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('admin.navbar')

    <div class="container" style="max-width: 1100px; padding-top: 1rem; padding-bottom: 2rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Listar Cotações</h1>
            <p>Gerencie todas as cotações da plataforma</p>
        </div>

        <div class="vuv-table-wrapper vuv-animate-fadeInUp vuv-delay-1">
            <table class="vuv-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Observações</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotations as $quotation)
                    <tr>
                        <td style="font-weight: 700;">#{{ $quotation->id }}</td>
                        <td style="font-weight: 600;">{{ $quotation->name }}</td>
                        <td>{{ $quotation->shipping_address }}</td>
                        <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $quotation->notes }}</td>
                        <td>
                            @if($quotation->status === 'open')
                                <span class="vuv-badge vuv-badge-success vuv-badge-dot">Aberta</span>
                            @elseif($quotation->status === 'in_progress')
                                <span class="vuv-badge vuv-badge-info vuv-badge-dot">Em Andamento</span>
                            @else
                                <span class="vuv-badge vuv-badge-secondary vuv-badge-dot">Encerrada</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="vuv-btn vuv-btn-danger vuv-btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $quotation->id }}">
                                <i class="fas fa-trash"></i> Excluir
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade vuv-modal" id="confirmDelete{{ $quotation->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmação de Exclusão</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza que deseja excluir a cotação <strong>"{{ $quotation->name }}"</strong>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="vuv-btn vuv-btn-outline-dark vuv-btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('admin.quotations.destroy', $quotation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="vuv-btn vuv-btn-danger vuv-btn-sm">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="text-align: center; margin-top: 1.5rem;">
            <a href="{{ route('admin.dashboard') }}" class="vuv-btn vuv-btn-outline-dark">
                <i class="fas fa-arrow-left"></i> Voltar para o Painel
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
