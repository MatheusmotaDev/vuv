<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <style>
      .section-header {
          margin-bottom: 1.5rem;
      }

      .form-section {
          padding: 1.5rem;
          background-color: #f8f9fa;
          border-radius: 0.5rem;
          margin-bottom: 2rem;
      }

      .modal-confirm {
          text-align: center;
      }
  </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('seller.dashboard') }}">
            <img src="/img/dashboard/logo_vuv_azul.png" class="vuv" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ __('ÁREA DO VENDEDOR') }}</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="me-3 text-white">{{ Auth::user()->name }}</div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-dark">{{ __('Sair') }}</button>
                </form>
            </div>
        </div>
    </div>
</nav>

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
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
              <!-- Error messages for name -->
          </div>

          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
              <!-- Error messages for email -->
          </div>

          <button type="submit" class="btn btn-primary">Salvar</button>
          <!-- Success message for profile update -->
      </form>
  </div>

  <!-- Update Password Section -->
  <div class="form-section">
      <header class="section-header">
          <h2 class="text-lg font-medium text-gray-900">Atualizar a senha</h2>
          <p class="mt-1 text-sm text-gray-600">Você pode mudar a senha do perfil caso não se sinta confortável com a atual</p>
      </header>

      <form method="post" action="{{ route('password.update') }}">
          @csrf
          @method('put')

          <div class="mb-3">
              <label for="current_password" class="form-label">Senha atual</label>
              <input type="password" name="current_password" id="current_password" class="form-control">
              <!-- Error messages for current_password -->
          </div>

          <div class="mb-3">
              <label for="new_password" class="form-label">Nova senha</label>
              <input type="password" name="new_password" id="new_password" class="form-control">
              <!-- Error messages for new_password -->
          </div>

          <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirme sua nova senha</label>
              <input type="password" name="confirm_password" id="confirm_password" class="form-control">
              <!-- Error messages for confirm_password -->
          </div>

          <button type="submit" class="btn btn-primary">Salvar</button>
          <!-- Success message for password update -->
      </form>
  </div>

  <!-- Delete Account Section -->
  <div class="form-section">
      <header class="section-header">
          <h2 class="text-lg font-medium text-gray-900">Deletar conta</h2>
          <p class="mt-1 text-sm text-gray-600">Uma vez deletada, todas as informações serão apagadas, por favor, pense antes de excluir sua conta da plataforma</p>
      </header>

      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion-modal">{{ __('Deletar a conta') }}</button>
  </div>
</div>

<!-- Modal for Account Deletion -->
<div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirmDeletionLabel" aria-hidden="true">
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
                      <input type="password" name="password" id="password" class="form-control">
                      <!-- Error messages for password -->
                  </div>

                  <button type="submit" class="btn btn-danger">Deletar</button>
              </form>
          </div>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
