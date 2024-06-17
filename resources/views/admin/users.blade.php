<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin.navbar')

<div class="container mt-5">
    <h1>Listar Usuários</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRole() }}</td>
                    <td>
                        <!-- Desabilitar o botão de excluir -->
                        <button class="btn btn-danger disabled" disabled>Excluir</button>
                        <!-- Incluir um aviso -->
                        <div class="mt-2">
                            A função de deletar usuários estará disponível nas próximas versões do sistema.
                        </div>
                    </td>
                </tr>
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
