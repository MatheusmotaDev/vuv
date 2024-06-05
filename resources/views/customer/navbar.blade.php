<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="font-weight: bold;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/img/dashboard/logo_vuv_azul.png" class="vuv" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">ÁREA DO CLIENTE</a>
                </li>
            </ul>
            <div class="me-3 text-white">
                <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none d-flex align-items-center"
                    style="position: relative; display: inline-block; padding: 0.25rem 0.5rem; border: 2px solid transparent; border-radius: 4px;"
                    onmouseover="this.style.borderColor='#ffffff';" onmouseout="this.style.borderColor='transparent';"
                    tabindex="0">
                    <i class="fas fa-user me-2"></i>
                    <span>Meu Perfil</span>
                </a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-dark">{{ __('Sair') }}</button>
            </form>
        </div>
    </div>
</nav>
