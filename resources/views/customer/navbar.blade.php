<nav class="navbar navbar-expand-lg vuv-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/img/dashboard/logo_vuv_azul.png" alt="VUV">
            <span>VUV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <span class="vuv-navbar-area-label">Área do Cliente</span>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('profile.edit') }}" class="vuv-nav-profile">
                    <i class="fas fa-user"></i>
                    <span>Meu Perfil</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="vuv-btn vuv-btn-outline vuv-btn-sm">{{ __('Sair') }}</button>
                </form>
            </div>
        </div>
    </div>
</nav>
