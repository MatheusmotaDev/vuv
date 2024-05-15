<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/services/service-1/assets/css/service-1.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <br>
    
    
    <!-- Service 1 - Bootstrap Brain Component -->
<section class="py-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">Nossos Serviços</h2>
        <p class="text-secondary mb-5 text-center">na VUV, oferecemos uma gama de serviços para facilitar suas necessidades no ramo automotivo:</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container overflow-hidden">
    <div class="row gy-5">
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-1-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z" />
          </svg>
          <h5 class="m-2">Cotações de Peças</h5>
          <p class="m-0 text-secondary">Nossa plataforma permite que você solicite cotações de peças automotivas de forma rápida e eficiente. Com apenas alguns cliques, você pode receber propostas de diferentes fornecedores, ajudando-o a encontrar a melhor opção para suas necessidades.</p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-2-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
          </svg>
          <h5 class="m-2">Consultoria Automotiva</h5>
          <p class="m-0 text-secondary">Contamos com uma equipe especializada em consultoria automotiva para orientá-lo em suas decisões de compra de peças e serviços. Nossos especialistas podem oferecer recomendações personalizadas com base nas suas necessidades e orçamento.</p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-3-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z" />
          </svg>
          <h5 class="m-2">Suporte Técnico</h5>
          <p class="m-0 text-secondary">Oferecemos suporte técnico especializado para ajudá-lo com quaisquer problemas ou dúvidas relacionadas ao uso da nossa plataforma. Nossa equipe está sempre disponível para garantir que você tenha uma experiência tranquila e satisfatória.</p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-4-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM7.519 5.057c-.886 1.418-1.772 2.838-2.542 4.265v1.12H8.85V12h1.26v-1.559h1.007V9.334H10.11V4.002H8.176c-.218.352-.438.703-.657 1.055ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z" />
          </svg>
          <h5 class="m-2">Integração de Fornecedores</h5>
          <p class="m-0 text-secondary">Além disso, fornecemos serviços de integração de fornecedores para facilitar a comunicação e o gerenciamento de pedidos entre você e seus fornecedores. Isso garante uma experiência de compra mais eficiente e transparente.</p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-5-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.006 4.158c1.74 0 2.924-1.119 2.924-2.806 0-1.641-1.178-2.584-2.56-2.584-.897 0-1.442.421-1.612.68h-.064l.193-2.344h3.621V4.002H5.791L5.445 8.63h1.149c.193-.358.668-.809 1.435-.809.85 0 1.582.604 1.582 1.57 0 1.085-.779 1.682-1.57 1.682-.697 0-1.389-.31-1.53-1.031H5.276c.065 1.213 1.149 2.115 2.72 2.115Z" />
          </svg>
          <h5 class="m-2">Atualizações e Manutenção</h5>
          <p class="m-0 text-secondary">Estamos constantemente atualizando e aprimorando nossa plataforma para oferecer a você as melhores soluções possíveis. Além disso, fornecemos serviços de manutenção regulares para garantir que tudo funcione sem problemas.</p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="text-center px-xl-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-6-circle-fill text-primary mb-4" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.21 3.855c-1.868 0-3.116 1.395-3.116 4.407 0 1.183.228 2.039.597 2.642.569.926 1.477 1.254 2.409 1.254 1.629 0 2.847-1.013 2.847-2.783 0-1.676-1.254-2.555-2.508-2.555-1.125 0-1.752.61-1.98 1.155h-.082c-.012-1.946.727-3.036 1.805-3.036.802 0 1.213.457 1.312.815h1.29c-.06-.908-.962-1.899-2.573-1.899Zm-.099 4.008c-.92 0-1.564.65-1.564 1.576 0 1.032.703 1.635 1.558 1.635.868 0 1.553-.533 1.553-1.629 0-1.06-.744-1.582-1.547-1.582Z" />
          </svg>
          <h5 class="m-2">Gestão</h5>
          <p class="m-0 text-secondary">Oferecemos uma solução abrangente de gestão de inventário para garantir que você mantenha o controle total sobre suas peças automotivas. Nosso sistema permite gerenciar o estoque de forma eficiente, monitorar os níveis de estoque em tempo real.</p>
        </div>
      </div>
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