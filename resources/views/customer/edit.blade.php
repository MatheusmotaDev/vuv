<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - VUV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/vuv-modern.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page vuv-page-light">
    @include('customer.navbar')

    <div class="container" style="max-width: 700px; padding-top: 1rem; padding-bottom: 2rem;">
        <div class="vuv-page-header vuv-animate-fadeInUp">
            <h1>Editar Perfil</h1>
        </div>

        <div class="vuv-section vuv-animate-fadeInUp vuv-delay-1">
            <div class="vuv-section-header">
                <h2><i class="fas fa-user-edit" style="color: var(--vuv-blue-light); margin-right: 0.5rem;"></i>Informações da Conta</h2>
                <p>Atualize o nome e email da sua conta</p>
            </div>
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div class="vuv-form-group">
                    <label for="name" class="vuv-form-label vuv-form-label-dark">Nome</label>
                    <input type="text" name="name" id="name" class="vuv-form-control vuv-form-control-light" value="{{ old('name', auth()->user()->name) }}" autocomplete="name">
                    @error('name') <span class="vuv-form-error">{{ $message }}</span> @enderror
                </div>
                <div class="vuv-form-group">
                    <label for="email" class="vuv-form-label vuv-form-label-dark">Email</label>
                    <input type="email" name="email" id="email" class="vuv-form-control vuv-form-control-light" value="{{ old('email', auth()->user()->email) }}" autocomplete="email">
                    @error('email') <span class="vuv-form-error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="vuv-btn vuv-btn-primary"><i class="fas fa-save"></i> Salvar</button>
                @if (session('success'))
                    <div class="vuv-alert vuv-alert-success" style="margin-top: 1rem;"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
                @endif
            </form>
        </div>

        <div class="vuv-section vuv-animate-fadeInUp vuv-delay-2">
            <div class="vuv-section-header">
                <h2><i class="fas fa-key" style="color: var(--vuv-amber); margin-right: 0.5rem;"></i>Atualizar Senha</h2>
                <p>Altere sua senha caso sinta necessidade</p>
            </div>
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="vuv-form-group">
                    <label for="current_password" class="vuv-form-label vuv-form-label-dark">Senha Atual</label>
                    <input type="password" name="current_password" id="current_password" class="vuv-form-control vuv-form-control-light" autocomplete="current-password">
                    @error('current_password') <span class="vuv-form-error">{{ $message }}</span> @enderror
                </div>
                <div class="vuv-form-group">
                    <label for="new_password" class="vuv-form-label vuv-form-label-dark">Nova Senha</label>
                    <input type="password" name="new_password" id="new_password" class="vuv-form-control vuv-form-control-light" autocomplete="new-password">
                    @error('new_password') <span class="vuv-form-error">{{ $message }}</span> @enderror
                </div>
                <div class="vuv-form-group">
                    <label for="confirm_password" class="vuv-form-label vuv-form-label-dark">Confirmar Nova Senha</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="vuv-form-control vuv-form-control-light" autocomplete="new-password">
                    @error('confirm_password') <span class="vuv-form-error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="vuv-btn vuv-btn-primary"><i class="fas fa-save"></i> Salvar</button>
            </form>
        </div>

        <div class="vuv-section vuv-animate-fadeInUp vuv-delay-3">
            <div class="vuv-section-header">
                <h2><i class="fas fa-exclamation-triangle" style="color: var(--vuv-red); margin-right: 0.5rem;"></i>Deletar Conta</h2>
                <p>Uma vez deletada, todas as informações serão apagadas permanentemente</p>
            </div>
            <button class="vuv-btn vuv-btn-danger" disabled style="opacity: 0.5; cursor: not-allowed;">
                <i class="fas fa-trash"></i> Deletar Conta
            </button>
            <div class="vuv-alert vuv-alert-warning" style="margin-top: 1rem;">
                <i class="fas fa-info-circle"></i>
                Para sua segurança, a função de deletar a conta não está disponível no momento. Contate o administrador.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
