<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('customer.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">{{ app('App\Http\Controllers\UserController')->saudacaoUsuario() }}</h1>
            </div>
        </div>

        <br>

        <div class="row justify-content-center"> 
            <div class="col-md-5 mb-4">
                <div class="card" style="max-width: 300px; margin: 0 auto;">
                    <div class="card-header bg-secondary text-white text-center">
                        INICIAR COTAÇÃO
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="text-align: center;">Se você deseja iniciar uma cotação, por favor clique abaixo</p>
                        <div class="text-center">
                            <a href="{{ route('customer.new-quotation') }}" class="btn btn-primary">CRIAR</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card" style="max-width: 300px; margin: 0 auto;">
                    <div class="card-header bg-secondary text-white text-center">
                        ACOMPANHAR COTAÇÕES
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="text-align: center;">Clique abaixo para acompanhar os status das suas cotações</p>
                        <div class="text-center">
                            <a href="{{ route('customer.quotations') }}" class="btn btn-primary">VER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>