<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
    body {
    font-family: 'Roboto';font-size: 16px;
}

.aboutus-section {
    padding: 90px 0;
}
.aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 39px;
    padding: 0 0 11px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #fdb801 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
}
.aboutus-text {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
    margin: 0 0 35px;
}

a:hover, a:active {
    color: #ffb901;
    text-decoration: none;
    outline: 0;
}
.aboutus-more {
    border: 1px solid #fdb801;
    border-radius: 25px;
    color: #fdb801;
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0;
    padding: 7px 20px;
    text-transform: uppercase;
}
.feature .feature-box .iconset {
    background: #fff none repeat scroll 0 0;
    float: left;
    position: relative;
    width: 18%;
}
.feature .feature-box .iconset::after {
    background: #fdb801 none repeat scroll 0 0;
    content: "";
    height: 150%;
    left: 43%;
    position: absolute;
    top: 100%;
    width: 1px;
}

.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}


.feature .feature-box .feature-content {
    float: left;
    padding-left: 28px;
    width: 78%;
}
.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}
.feature .feature-box .feature-content p {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
}
.icon {
    color : #f4b841;
    padding:0px;
    font-size:40px;
    border: 1px solid #fdb801;
    border-radius: 100px;
    color: #fdb801;
    font-size: 28px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: 70px;
}

</style>

   
    <link rel="stylesheet" href="css/home.css">
    <title>VUV- Vida útil Do Veículo</title>
    <link rel="shortcut icon" href="img/home/logo_vuv_azul.png" type="image/x-icon">
</head>
<body>

<header class="topo-site">
                <img class="vuv" src="img/home/logo_vuv_azul.png" alt="">
                <a class="logo" href="index.html"> VUV</a>

                <nav class="menu-site">
                    <a href="index.html">Inicio</a>
                    <a href="{{ route('services') }}">Serviços</a>
                    <a href="{{ route('about') }}">Sobre Nós</a>
                </nav>

                <div class="icons">
                    
                    <div id="menu"  class="fas fa-bars"></div>
                </div>

                @if (Route::has('login'))
                <nav class="menu-site">
                    @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
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

    <div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">Sobre Nós</h2>
                        <p class="aboutus-text">Na VUV, estamos comprometidos em revolucionar a maneira como as pessoas lidam com suas necessidades automotivas. Nossa plataforma oferece uma abordagem inovadora para facilitar a compra e venda de peças de automóveis, proporcionando uma experiência eficiente e confiável para nossos usuários.</p>
                        <p class="aboutus-text">Aqui na VUV, trabalhamos com paixão para oferecer soluções que atendam às necessidades de nossos clientes e parceiros. Nossa equipe está empenhada em fornecer serviços confiáveis e um suporte excepcional para garantir a satisfação de todos os envolvidos.</p>
                        <a class="aboutus-more" href="#">Se interessou?</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="http://themeinnovation.com/demo2/html/build-up/img/home1/about1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Trabalhe com Paixão</h4>
                                    <p>Na VUV, acreditamos em fazer nosso trabalho com paixão. Estamos dedicados a oferecer o melhor serviço possível aos nossos clientes, garantindo que cada interação seja excepcional.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Serviços Confiáveis</h4>
                                    <p>Nossos serviços são projetados com confiabilidade em mente. Trabalhamos arduamente para garantir que cada transação seja suave e segura, proporcionando tranquilidade aos nossos usuários.</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="glyphicon glyphicon-cog icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Suporte de Qualidade</h4>
                                    <p>Na VUV, valorizamos o suporte de qualidade. Nossa equipe está sempre disponível para ajudar e resolver quaisquer dúvidas ou preocupações que nossos usuários possam ter.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    


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