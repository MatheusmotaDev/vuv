<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo</title>
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('customer.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 id="saudacao" class="text-center"></h1>
            </div>
        </div>

        <br>
        <br>

        <div class="row justify-content-between">
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
                            <a href="#" class="btn btn-primary">VER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script>
        // Calcula a saudação com base na hora atual
        function calcularSaudacao() {
            var horaAtual = new Date().getHours();
            var saudacao = "";

            if (horaAtual >= 6 && horaAtual < 12) {
                saudacao = "Bom dia";
            } else if (horaAtual >= 12 && horaAtual < 18) {
                saudacao = "Boa tarde";
            } else {
                saudacao = "Boa noite";
            }

            return saudacao;
        }

        // Exibe a saudação na página
        function exibirSaudacao() {
            var saudacao = calcularSaudacao();
            var nomeUsuario = "{{ ucfirst(strtolower(Auth::user()->name)) }}";
            var saudacaoCompleta = saudacao + ", " + nomeUsuario + "";

            document.getElementById("saudacao").innerText = saudacaoCompleta;
        }

        // Chama a função para exibir a saudação quando a página carregar
        window.onload = exibirSaudacao;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-gh7hCB2wY9h/LS1wa7Gb72A5iUEuNbU10a8MFu42O1oe9iEfeKXe7MW/axXJC7bX"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-Ys2SmgVBf8fW3fXK0z+WaCzynJ2rtrB+1sbY/ZvRUeR2zNQLeSpibibhav75vNgf"
        crossorigin="anonymous"></script>
</body>

</html>
