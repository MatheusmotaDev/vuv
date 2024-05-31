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