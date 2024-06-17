<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cotações</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('admin.navbar')

    <div class="container mt-5">
        <h1 class="text-center">Listar Cotações</h1>

        <!-- Tabela para listar as cotações -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço de Envio</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotations as $quotation)
                <tr>
                    <td>{{ $quotation->id }}</td>
                    <td>{{ $quotation->name }}</td>
                    <td>{{ $quotation->shipping_address }}</td>
                    <td>{{ $quotation->notes }}</td>
                    <td>{{ $quotation->status }}</td>
                    <td>
                        <!-- Botão para excluir a cotação -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $quotation->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>

                <!-- Modal de confirmação de exclusão -->
                <div class="modal fade" id="confirmDelete{{ $quotation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja excluir a cotação "{{ $quotation->name }}"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <!-- Formulário para confirmar a exclusão -->
                                <form action="{{ route('admin.quotations.destroy', $quotation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Voltar para a Dashboard do Admin</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
