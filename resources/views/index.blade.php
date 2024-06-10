<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/home.css">
    <title>VUV- Vida útil Do Veículo</title>
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body>

<header class="topo-site">
                <img class="vuv" src="img/home/logo_vuv_azul.png" alt="">
                <a class="logo" href="index.html"> VUV</a>

                <nav class="menu-site">
                    <a href="#">Inicio</a>
                    <a href="{{ route('services') }}">Serviços</a>
                    <a href="{{ route('about') }}">Sobre Nós</a>
                </nav>

                <div class="icons">
                    
                    <div id="menu"  class="fas fa-bars"></div>
                </div>

                @if (Route::has('login'))
    <nav class="menu-site">
        @auth
            @if (auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @elseif (auth()->user()->isSeller())
                <a href="{{ route('seller.dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('customer.dashboard') }}">Dashboard</a>
            @endif
        @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('options') }}">Cadastro</a>
            @endif
        @endauth
    </nav>
    @endif

             
                </header>


    <br>
    <br>
    <br>
    <br>



    <section class="vuv-destaque">

        <div class="swiper home-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background:url(img/home/banner1.png) no-repeat;">
                    <div class="content">
                     <h3>A <span>melhor</span> cotações de peças <br> da região</h3>
                    <a href="{{ route('options') }}" class="btn">cadastre-se</a>
                    </div>
                    </div>
              
              

                
                <div class="swiper-slide slide" style="background:url(img/home/banner2.png) no-repeat;">
                    <div class="content">
                    <h3>A <span>melhor</span> cotações de peças <br> da região</h3>
                    <a href="{{ route('options') }}" class="btn">cadastre-se</a>
                    </div>
                    </div>
              
                    
                    
                    <div class="swiper-slide slide" style="background:url(img/home/banner3.png) no-repeat;">
                        <div class="content">
                        <h3>A <span>melhor</span> cotações de peças <br> da região</h3>
                        <a href="{{ route('options') }}" class="btn">cadastre-se</a>
                        </div>
                        </div>
                  
                
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>


        </div>
    </section>

    <div class="como-funciona">
        <h1 class="titulo">Como <span>Funciona</span></h1>
        <div class="box-container">

            
        <div class="box">
            <img src="img/home/registro-home.png" alt="">
            <h3>Cadastre-se</h3>
        </div>

        <div class="box">
            <img src="img/home/troca-home.png" alt="">
            <h3>Seja vendedor ou cliente</h3>
        </div>

        <div class="box">
            <img src="img/home/mãos-home.png" alt="">
            <h3>Faça cotações</h3>
        </div>

        <div class="box">
            <img src="img/home/entrega-home.png" alt="">
            <h3>Receba sua peça</h3>
        </div>


        </div>
    </div>



    <section class="empresa">
        <div class="row">

            <div class="empresa-img">
                <img src="img/home/foto-home.png" alt="">
            </div>
            <div class="content">
                <h3> Vida <span>útil</span> do Veículo</h3>
                <p>
                    Apresentamos a VUV: Sua Nova Plataforma de Conexão Automotiva!
                </p>

                <p>
                Encontrar aquela peça difícil agora é mais fácil do que nunca com a VUV. Seja você um vendedor buscando impulsionar suas vendas ou um cliente procurando por uma peça específica, estamos aqui para ajudar.
                <br>
                Como vendedor, você pode se cadastrar na VUV e ampliar suas oportunidades de negócio, alcançando uma audiência mais ampla de clientes em potencial. Se você é um cliente em busca da peça perdida, registre-se na nossa plataforma para ter acesso a uma rede confiável de fornecedores, prontos para atender às suas necessidades automotivas. Junte-se à VUV hoje e simplifique sua busca por peças automotivas!
                </p>
                <a class="btn" href="">Saiba mais</a>
            </div>

        </div>
    </section>


    <section class="atualizacoes">
        <h1 class="titulo">Informações do <span>site</span></h1>
        <div class="box-container">

            <div class="box">
                <img src="img/home/pensando.png" alt="">
                <div class="icons">
                    <a href="">
                    <i class=""></i> Vida útil do Veículo
                    </a>
                   <br>
                    <a href="">
                        <i class=""></i> VUV
                        </a>
                </div>
                <h3> Por que a VUV?</h3>
                <p>Descubra uma nova maneira de encontrar peças automotivas. Simplifique sua busca e conecte-se a uma ampla rede de vendedores confiáveis. Experimente a conveniência da VUV hoje mesmo.</p>
                <a href="{{ route('services') }}" class="btn">Saiba mais</a>
            </div>

            <div class="box">
                <img src="img/home/confiavel.avif" alt="">
                <div class="icons">
                    <a href="">
                    <i class=""></i> Vida útil do Veículo
                    </a>
                    <br>
                    <a href="">
                        <i class=""></i> VUV
                        </a>
                </div>
                <h3>A VUV É Confiável?</h3>
                <p>Absolutamente! Na VUV, garantimos a confiabilidade em cada etapa. Com vendedores verificados e um sistema de segurança sólido, você pode confiar em nós para suas necessidades automotivas. Confie na VUV para uma experiência de compra tranquila e segura.</p>
                <a href="{{ route('services') }}" class="btn">Saiba mais</a>
            </div>

            <div class="box">
                <img src="img/home/ajuda.jpg" alt="">
                <div class="icons">
                    <a href="">
                    <i class=""></i> Vida útil do Veículo
                    </a>
                    <br>
                    <a href="">
                        <i class=""></i> VUV
                        </a>
                </div>
                <h3> VUV serve para uma emergência? </h3>
                <p>
                Sim! Na VUV, estamos aqui para ajudar, mesmo nas situações mais urgentes. Com acesso a uma ampla variedade de peças e vendedores confiáveis, você pode contar conosco para encontrar a solução certa, rapidamente. Confie na VUV para estar lá quando você mais precisa.</p>
                <a href="{{ route('services') }}" class="btn">Saiba mais</a>
            </div>

        </div>
    </section>


    <section class="footer">
        <div class="box-container">

            <div class="box">
                <h3>VUV - Vida útil do Veículo</h3>
                <p>Siga nossas redes sociais</p>
                <div class="rede-sociais">
                    <a href="" class="fab fa-instagram"></a>
                    <a href="" class="fab fa-twitter"></a>
                </div>
            </div>

            <div class="box">
                <h3>Contatos:</h3>
                <p>(81) 9.4002-8922</p>
                <p>vuv.eteginasio.pe@gmail.com</p>
                
            </div>


            <div class="box">
                <h3>Sede física</h3>
                <p>Cruz cabugá, Ginasio Pernambucano</p>
                <p>Recife, PE</p>
                
            </div>



        </div>

        <div class="direitos">
              Todos os direitos Reservados
        </div>



    </section>
   
   
    

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="scripts/home.js"></script>
</body>
</html>