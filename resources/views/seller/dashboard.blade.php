<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  @include('seller.navbar')

  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">{{ app('App\Http\Controllers\UserController')->saudacaoUsuario() }}</h1>
        </div>
    </div>

    <br>

    <div class="row justify-content-center"> 
        <div class="col-md-4 mb-4">
            <div class="card" style="max-width: 300px; margin: 0 auto;">
                <div class="card-header bg-secondary text-white text-center">
                    VER COTAÇÕES DISPONÍVEIS
                </div>
                <div class="card-body">
                    <p class="card-text" style="text-align: center;">Se você deseja procurar uma cotação em aberto para fazer uma proposta de orçamento, por favor clique abaixo</p>
                    <div class="text-center">
                        <a href="{{ route('seller.newBudget') }}" class="btn btn-primary">CRIAR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card" style="max-width: 300px; margin: 0 auto;">
                <div class="card-header bg-secondary text-white text-center">
                    ACOMPANHAR ORÇAMENTOS
                </div>
                <div class="card-body">
                    <p class="card-text" style="text-align: center;">Clique abaixo para ver as propostas de orçamento feitas por você e os andamentos dela</p>
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
