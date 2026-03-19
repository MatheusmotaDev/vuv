<nav class="navbar navbar-expand-lg vuv-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('seller.dashboard') }}">
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
                    <span class="vuv-navbar-area-label">Área do Vendedor</span>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                {{-- Notifications --}}
                <div class="dropdown vuv-dropdown" style="position: relative;">
                    <a class="vuv-nav-profile" href="#" role="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
                        <i class="fas fa-bell"></i>
                        @if(auth()->user()->unreadNotifications()->count() > 0)
                            <span class="vuv-notification-badge">{{ auth()->user()->unreadNotifications()->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                        @if(auth()->user()->unreadNotifications()->count() > 0)
                            <li class="dropdown-header">Novas cotações disponíveis</li>
                            <li><hr class="dropdown-divider"></li>
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                @if($notification->type === 'App\Notifications\NewQuotation')
                                    <li>
                                        <span class="dropdown-item-text">
                                            <strong>Nova cotação criada</strong><br>
                                            <a href="{{ route('seller.newBudget') }}" style="color: var(--vuv-blue-light);">{{ $notification->data['quotation_name'] }}</a>
                                        </span>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        @else
                            <li class="text-center" style="padding: 0.75rem;">
                                <span style="color: var(--vuv-text-muted); font-size: 0.875rem;">Nenhuma cotação nova</span>
                            </li>
                        @endif
                        <li class="text-center" style="padding: 0.5rem;">
                            <form method="POST" action="{{ route('seller.notifications.clear') }}">
                                @csrf
                                <button type="submit" class="vuv-btn vuv-btn-danger vuv-btn-sm" style="width: 100%;">Limpar Notificações</button>
                            </form>
                        </li>
                    </ul>
                </div>

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
