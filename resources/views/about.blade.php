<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - VUV</title>
    <meta name="description" content="Conheça a VUV - Vida Útil do Veículo. Plataforma de cotação de peças automotivas.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vuv-modern.css">
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page">

{{-- =================== NAVBAR =================== --}}
<nav class="navbar navbar-expand-lg vuv-navbar" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1050;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="img/home/logo_vuv_azul.png" alt="VUV">
            <span>VUV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#aboutNav" style="border-color: rgba(255,255,255,0.2);">
            <i class="fas fa-bars" style="color: white;"></i>
        </button>
        <div class="collapse navbar-collapse" id="aboutNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Início</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Sobre</a></li>
                <li class="nav-item" style="margin-left: 0.5rem;">
                    <a href="{{ route('login') }}" class="vuv-btn vuv-btn-primary vuv-btn-sm">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- =================== HERO =================== --}}
<section class="vuv-hero" style="min-height: 50vh; padding-top: 8rem;">
    <div class="vuv-hero-content">
        <h1>Sobre a <span>VUV</span></h1>
        <p>Conheça a plataforma que está transformando o mercado de peças automotivas</p>
    </div>
</section>

{{-- =================== MISSÃO / VISÃO / VALORES =================== --}}
<section class="vuv-home-section" style="background: var(--vuv-gradient-bg);">
    <div class="container">
        <div class="vuv-steps-grid" style="max-width: 1100px;">
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-1">
                <div class="vuv-card-icon" style="margin: 0 auto 1rem;">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Nossa Missão</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">
                    Facilitar e modernizar o processo de cotação de peças automotivas, conectando clientes e vendedores de forma eficiente.
                </p>
            </div>
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-2">
                <div class="vuv-card-icon amber" style="margin: 0 auto 1rem;">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Nossa Visão</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">
                    Ser a principal plataforma de referência em cotação de peças automotivas do Brasil.
                </p>
            </div>
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-3">
                <div class="vuv-card-icon emerald" style="margin: 0 auto 1rem;">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Nossos Valores</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">
                    Transparência, inovação, sustentabilidade e compromisso com a qualidade do serviço.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- =================== SOBRE A EMPRESA =================== --}}
<section class="vuv-home-section vuv-home-section-dark">
    <div class="container">
        <div class="vuv-about-row">
            <img src="img/home/carro_1.jpeg" alt="VUV">
            <div class="vuv-about-content">
                <h3>Quem somos <span>nós</span></h3>
                <p>A VUV – Vida Útil do Veículo nasceu da necessidade de simplificar o processo de busca e cotação de peças automotivas. Somos uma plataforma digital que conecta clientes que precisam de peças a vendedores especializados, criando um ecossistema eficiente e transparente.</p>
                <p>Nossa equipe é formada por profissionais apaixonados por tecnologia e pelo setor automotivo, sempre buscando formas inovadoras de resolver os desafios do mercado.</p>
            </div>
        </div>
    </div>
</section>

{{-- =================== FUNCIONALIDADES =================== --}}
<section class="vuv-home-section" style="background: var(--vuv-gradient-bg);">
    <div class="container">
        <h2 class="vuv-section-title" style="color: var(--vuv-text-dark);">O que <span>oferecemos</span></h2>
        <div class="vuv-info-grid">
            <div class="vuv-card vuv-animate-fadeInUp vuv-delay-1" style="text-align: center; padding: 2rem;">
                <div class="vuv-card-icon" style="margin: 0 auto 1rem;">
                    <i class="fas fa-search-dollar"></i>
                </div>
                <h3 class="vuv-card-title">Cotações Inteligentes</h3>
                <p class="vuv-card-text">Sistema de cotação rápido e intuitivo que conecta sua demanda aos melhores vendedores</p>
            </div>
            <div class="vuv-card vuv-animate-fadeInUp vuv-delay-2" style="text-align: center; padding: 2rem;">
                <div class="vuv-card-icon amber" style="margin: 0 auto 1rem;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="vuv-card-title">Segurança</h3>
                <p class="vuv-card-text">Plataforma segura com dados protegidos e transações transparentes</p>
            </div>
            <div class="vuv-card vuv-animate-fadeInUp vuv-delay-3" style="text-align: center; padding: 2rem;">
                <div class="vuv-card-icon emerald" style="margin: 0 auto 1rem;">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="vuv-card-title">Contato Direto</h3>
                <p class="vuv-card-text">Comunique-se diretamente com vendedores via WhatsApp após aceitar uma proposta</p>
            </div>
        </div>
    </div>
</section>

{{-- =================== CTA =================== --}}
<section class="vuv-hero" style="min-height: 40vh;">
    <div class="vuv-hero-content">
        <h1 style="font-size: 2.5rem;">Pronto para <span>começar</span>?</h1>
        <p>Cadastre-se gratuitamente e comece a utilizar a plataforma agora mesmo</p>
        <a href="{{ route('options') }}" class="vuv-btn vuv-btn-primary vuv-btn-lg">
            <i class="fas fa-rocket"></i> Cadastre-se Gratuitamente
        </a>
    </div>
</section>

{{-- =================== FOOTER =================== --}}
<footer class="vuv-footer">
    <div class="vuv-footer-grid">
        <div>
            <h3>
                <img src="img/home/logo_vuv_azul.png" alt="VUV" style="width: 28px; height: 28px; margin-right: 0.5rem; border-radius: 6px;">
                VUV
            </h3>
            <p>Plataforma de cotação de peças automotivas.</p>
            <div class="vuv-footer-social">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
        </div>
        <div>
            <h3>Links</h3>
            <p><a href="{{ url('/') }}" style="color: var(--vuv-text-secondary);">Início</a></p>
            <p><a href="#" style="color: var(--vuv-text-secondary);">Sobre</a></p>
            <p><a href="{{ route('login') }}" style="color: var(--vuv-text-secondary);">Entrar</a></p>
        </div>
        <div>
            <h3>Contato</h3>
            <p><i class="fas fa-envelope" style="margin-right: 0.35rem;"></i> contato@vuv.com.br</p>
            <p><i class="fas fa-phone" style="margin-right: 0.35rem;"></i> (11) 99999-9999</p>
        </div>
    </div>
    <div class="vuv-footer-bottom">
        <p>&copy; {{ date('Y') }} VUV - Vida Útil do Veículo. Todos os direitos reservados.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>