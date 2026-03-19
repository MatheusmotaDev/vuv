<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VUV - Vida Útil do Veículo</title>
    <meta name="description" content="Plataforma de cotação de peças automotivas. Conectamos clientes a vendedores para encontrar as melhores peças para seu veículo.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/vuv-modern.css">
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body class="vuv-page">

{{-- =================== NAVBAR =================== --}}
<nav class="navbar navbar-expand-lg vuv-navbar" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1050;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/home/logo_vuv_azul.png" alt="VUV">
            <span>VUV</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#homeNav" style="border-color: rgba(255,255,255,0.2);">
            <i class="fas fa-bars" style="color: white;"></i>
        </button>
        <div class="collapse navbar-collapse" id="homeNav">
            <ul class="navbar-nav ms-auto align-items-center gap-1">
                <li class="nav-item"><a class="nav-link" href="#hero">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="#how-it-works">Como Funciona</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="#info">Informações</a></li>
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
<section class="vuv-hero" id="hero" style="padding-top: 8rem;">
    <div class="vuv-hero-content">
        <h1>Encontre as peças que seu <span>veículo</span> precisa</h1>
        <p>Plataforma inteligente de cotação de peças automotivas. Conectamos você aos melhores vendedores do mercado, com rapidez e transparência.</p>
        <a href="{{ route('options') }}" class="vuv-btn vuv-btn-primary vuv-btn-lg">
            <i class="fas fa-rocket"></i> Comece Agora
        </a>
    </div>
</section>

{{-- =================== COMO FUNCIONA =================== --}}
<section class="vuv-home-section" id="how-it-works" style="background: var(--vuv-gradient-bg);">
    <div class="container">
        <h2 class="vuv-section-title" style="color: var(--vuv-text-dark);">Como <span>Funciona</span></h2>
        <div class="vuv-steps-grid">
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-1">
                <div class="vuv-card-icon" style="margin: 0 auto 1rem;">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3>Cadastre-se</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">Crie sua conta como cliente ou vendedor em poucos segundos</p>
            </div>
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-2">
                <div class="vuv-card-icon amber" style="margin: 0 auto 1rem;">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <h3>Solicite Cotações</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">Informe as peças que precisa e nossa rede de vendedores responde</p>
            </div>
            <div class="vuv-step-card vuv-animate-fadeInUp vuv-delay-3">
                <div class="vuv-card-icon emerald" style="margin: 0 auto 1rem;">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Escolha a Melhor</h3>
                <p style="color: var(--vuv-text-dark-secondary); font-size: 0.875rem; margin-top: 0.5rem;">Compare propostas e escolha a melhor oferta para você</p>
            </div>
        </div>
    </div>
</section>

{{-- =================== SOBRE =================== --}}
<section class="vuv-home-section vuv-home-section-dark" id="about">
    <div class="container">
        <div class="vuv-about-row">
            <img src="img/home/carro_1.jpeg" alt="VUV Plataforma">
            <div class="vuv-about-content">
                <h3>Sobre a <span>VUV</span></h3>
                <p>A VUV – Vida Útil do Veículo é uma plataforma inovadora criada para facilitar o processo de cotação de peças automotivas. Conectamos clientes que precisam de peças a vendedores especializados, tornando o processo mais rápido, transparente e eficiente.</p>
                <p>Acreditamos que encontrar a peça certa não precisa ser complicado. Com a VUV, você cota, compara e negocia diretamente com vendedores de confiança.</p>
                <a href="{{ route('options') }}" class="vuv-btn vuv-btn-primary">
                    Cadastre-se Gratuitamente <i class="fas fa-arrow-right" style="margin-left: 0.35rem;"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- =================== INFORMAÇÕES =================== --}}
<section class="vuv-home-section" id="info" style="background: var(--vuv-gradient-bg);">
    <div class="container">
        <h2 class="vuv-section-title" style="color: var(--vuv-text-dark);">Informações do <span>Site</span></h2>
        <div class="vuv-info-grid">
            <div class="vuv-info-card">
                <img src="img/home/carro_4.jpeg" alt="VUV Conecta">
                <div class="vuv-info-card-body">
                    <h3><i class="fas fa-link" style="color: var(--vuv-blue-light); margin-right: 0.35rem;"></i>VUV - Conecta</h3>
                    <p>Conectando clientes e vendedores do ramo automotivo de forma prática, criando uma rede de confiança e oportunidades.</p>
                </div>
            </div>
            <div class="vuv-info-card">
                <img src="img/home/carro_3.jpeg" alt="VUV Sustenta">
                <div class="vuv-info-card-body">
                    <h3><i class="fas fa-leaf" style="color: var(--vuv-emerald); margin-right: 0.35rem;"></i>VUV - Sustenta</h3>
                    <p>Facilitando a reutilização de peças e contribuindo para um mercado automotivo mais sustentável e responsável.</p>
                </div>
            </div>
            <div class="vuv-info-card">
                <img src="img/home/carro_2.jpeg" alt="VUV Inova">
                <div class="vuv-info-card-body">
                    <h3><i class="fas fa-bolt" style="color: var(--vuv-amber); margin-right: 0.35rem;"></i>VUV - Inova</h3>
                    <p>Utilizando tecnologia para simplificar e modernizar o processo de compra de peças automotivas.</p>
                </div>
            </div>
        </div>
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
            <p><a href="#hero" style="color: var(--vuv-text-secondary);">Início</a></p>
            <p><a href="#how-it-works" style="color: var(--vuv-text-secondary);">Como Funciona</a></p>
            <p><a href="#about" style="color: var(--vuv-text-secondary);">Sobre</a></p>
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
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
</body>
</html>