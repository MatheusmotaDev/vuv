<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="font-weight: bold;">
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
                    <a class="nav-link" href="{{ route('seller.dashboard') }}">{{ __('ÁREA DO VENDEDOR') }}</a>
                </li>
            </ul>

            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger">{{ auth()->user()->unreadNotifications()->count() }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                    @if(auth()->user()->unreadNotifications()->count() > 0)
                        <li class="dropdown-header">Alerta de novas cotações criadas recentemente</li>
                        <li><hr class="dropdown-divider"></li>
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            @if($notification->type === 'App\Notifications\NewQuotation')
                                <li>
                                    <span class="dropdown-item-text">
                                        <strong>UMA NOVA COTAÇÃO FOI CRIADA, FAÇA SUA PROPOSTA</strong><br>
                                        <a href="{{ route('seller.newBudget') }}">{{ $notification->data['quotation_name'] }}</a>
                                    </span>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                        @endforeach
                    @else
                        <li class="text-center">Nenhuma cotação nova</li>
                    @endif
                    <li class="text-center">
                        <form method="POST"  action="{{ route('seller.notifications.clear') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Limpar Notificações</button>
                        </form>
                    </li>
                </ul>
            </div>

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
