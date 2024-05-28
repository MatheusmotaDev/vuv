<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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


<div class="container mt-5">
  <div class="row justify-content-center"> 
    <div class="col-md-4 mb-4">
      <div class="card" style="max-width: 300px; margin: 0 auto;">
        <div class="card-header bg-secondary text-white text-center">
          PERFIL
        </div>
        <div class="card-body">
          <p class="card-text" style="text-align: center;">O QUE DESEJA FAZER?</p>
          <div class="text-center">
            <a href="#" class="btn btn-primary">ALTERAR DADOS</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center"> 
    <div class="col-md-4 mb-4">
      <div class="card" style="max-width: 300px; margin: 0 auto;">
        <div class="card-header bg-secondary text-white text-center">
          VER COTAÇÕES DISPONÍVEIS
        </div>
        <div class="card-body">
          <p class="card-text" style="text-align: center;">Se você deseja procurar uma cotação em aberto para fazer propostas, por favor clique abaixo</p>
          <div class="text-center">
            <a href="#" class="btn btn-primary">CRIAR</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card" style="max-width: 300px; margin: 0 auto;">
        <div class="card-header bg-secondary text-white text-center">
          ACOMPANHAR PROPOSTAS
        </div>
        <div class="card-body">
          <p class="card-text" style="text-align: center;">Clique abaixo para ver as propostas feitas por você e os andamentos dela</p>
          <div class="text-center">
            <a href="#" class="btn btn-primary">VER</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-gh7hCB2wY9h/LS1wa7Gb72A5iUEuNbU10a8MFu42O1oe9iEfeKXe7MW/axXJC7bX"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-Ys2SmgVBf8fW3fXK0z+WaCzynJ2rtrB+1sbY/ZvRUeR2zNQLeSpibibhav75vNgf"
    crossorigin="anonymous"></script>
</body>

</html>
