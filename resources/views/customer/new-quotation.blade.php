<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Cotação - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 960px; padding-top: 1rem;">
        @if (session('status'))
            <div class="vuv-alert vuv-alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Iniciar Cotação</h1>
            <p>Preencha os dados e adicione as peças desejadas</p>
        </div>

        <form id="quotationForm" method="POST" class="vuv-animate-fadeInUp vuv-delay-1">
            @csrf
            <input type="hidden" id="quotationItems" name="quotationItems">

            <div class="vuv-section">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="quotationTitle" class="vuv-form-label vuv-form-label-dark">Título da cotação</label>
                        <input type="text" class="vuv-form-control vuv-form-control-light" id="quotationTitle" name="quotationTitle" placeholder="Ex: Peças para Fiat Uno 2018">
                    </div>
                    <div class="col-md-6">
                        <label for="deliveryAddress" class="vuv-form-label vuv-form-label-dark">Endereço para entrega</label>
                        <input type="text" class="vuv-form-control vuv-form-control-light" id="deliveryAddress" name="deliveryAddress" placeholder="Rua, número, bairro, cidade">
                    </div>
                </div>
            </div>

            <div class="vuv-section">
                <div class="vuv-section-header">
                    <h2><i class="fas fa-cog" style="color: var(--vuv-blue-light); margin-right: 0.5rem;"></i>Informe as peças desejadas</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="categorySelect" class="vuv-form-label vuv-form-label-dark">Categoria</label>
                        <select class="vuv-form-control vuv-form-control-light vuv-form-select" id="categorySelect">
                            <option selected disabled>Selecione uma categoria</option>
                            <option>Motor</option>
                            <option>Suspensão</option>
                            <option>Freios</option>
                            <option>Eletrônicos</option>
                            <option>Transmissão</option>
                            <option>Interior e Estética</option>
                            <option>Refrigeração do Motor</option>
                            <option>Outros</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="vuv-form-label vuv-form-label-dark">Peça</label>
                        <input type="text" class="vuv-form-control vuv-form-control-light" id="name" name="name" placeholder="Nome da peça">
                    </div>
                    <div class="col-md-6">
                        <label for="quantity" class="vuv-form-label vuv-form-label-dark">Quantidade</label>
                        <input type="number" class="vuv-form-control vuv-form-control-light" id="quantity" placeholder="1">
                    </div>
                    <div class="col-md-6">
                        <label for="brand" class="vuv-form-label vuv-form-label-dark">Marca</label>
                        <input type="text" class="vuv-form-control vuv-form-control-light" id="brand" placeholder="Marca da peça">
                    </div>
                    <div class="col-12">
                        <label for="description" class="vuv-form-label vuv-form-label-dark">Descrição</label>
                        <textarea class="vuv-form-control vuv-form-control-light" id="description" rows="2" placeholder="Detalhes adicionais sobre a peça"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="button" class="vuv-btn vuv-btn-primary" id="addPartBtn">
                            <i class="fas fa-plus"></i> Adicionar Peça
                        </button>
                    </div>
                </div>
            </div>

            <div class="vuv-table-wrapper vuv-animate-fadeInUp vuv-delay-2" style="margin-bottom: 1.5rem;">
                <table class="vuv-table">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Peça</th>
                            <th>Quantidade</th>
                            <th>Marca</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody id="quotationItemsBody">
                    </tbody>
                </table>
            </div>

            <div class="vuv-section">
                <label for="generalNotes" class="vuv-form-label vuv-form-label-dark">Observações Gerais</label>
                <textarea class="vuv-form-control vuv-form-control-light" id="generalNotes" name="generalNotes" rows="3" placeholder="Informações adicionais para os vendedores"></textarea>
            </div>

            <div style="text-align: center; padding: 1rem 0 2rem;">
                <button type="submit" class="vuv-btn vuv-btn-success vuv-btn-lg" id="createQuotationBtn">
                    <i class="fas fa-paper-plane"></i> Criar Cotação
                </button>
            </div>
        </form>

        <div class="modal fade vuv-modal" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Cotação Criada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center;">
                            <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--vuv-emerald); margin-bottom: 1rem;"></i>
                            <p>Cotação criada com sucesso!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('dashboard') }}" class="vuv-btn vuv-btn-primary">Voltar para Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/scripts/quotation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
