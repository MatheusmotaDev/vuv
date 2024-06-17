<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Vendedor</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/edit.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('seller.navbar')

    <div class="container my-5">
        <!-- Profile Information Section -->
        <div class="form-section">
            <header class="section-header">
                <h2 class="text-lg font-medium text-gray-900">Informações da conta</h2>
                <p class="mt-1 text-sm text-gray-600">Você pode atualizar o nome e email da conta</p>
            </header>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', auth()->user()->name) }}" autocomplete="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', auth()->user()->email) }}" autocomplete="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="form-section">
            <header class="section-header">
                <h2 class="text-lg font-medium text-gray-900">Atualizar a senha</h2>
                <p class="mt-1 text-sm text-gray-600">Você pode mudar a senha do perfil caso não se sinta confortável
                    com a atual</p>
            </header>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">Senha atual</label>
                    <input type="password" name="current_password" id="current_password" class="form-control"
                        autocomplete="current-password">
                    @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Nova senha</label>
                    <input type="password" name="new_password" id="new_password" class="form-control"
                        autocomplete="new-password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirme sua nova senha</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                        autocomplete="new-password">
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                @if (session('success'))
                    <div class="alert alert-success mt-2">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="form-section">
            <header class="section-header">
                <h2 class="text-lg font-medium text-gray-900">Deletar conta</h2>
                <p class="mt-1 text-sm text-gray-600">Uma vez deletada, todas as informações serão apagadas, por favor,
                    pense antes de excluir sua conta da plataforma</p>
            </header>

            <button class="btn btn-danger disabled" aria-disabled="true">
                Deletar a conta
            </button>

            <!-- Card de alerta -->
            <div class="alert alert-danger mt-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Para sua segurança, no momento a função de deletar a
                conta não está disponível. Favor contatar ao administrador do site para mais detalhes.
            </div>
        </div>
    </div>

    <!-- Modal for Account Deletion -->
    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirmDeletionLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeletionLabel">Confirmar a exclusão da conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-confirm">
                    <p>Tem certeza que deseja deletar sua conta? essa ação é irreversível</p>
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password" class="form-label">Informe sua senha atual</label>
                            <input type="password" name="password" id="password" class="form-control"
                                autocomplete="current-password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>

</html>