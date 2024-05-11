<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem vindo a VUV!</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/options.css">
</head>
<body>
  <div class="container center">
    <img src="/img/options/vuv.png" alt="Logo" class="img-fluid mb-4" style="max-width: 200px;">
    <h2 class="mb-4">SEJA BEM VINDO!</h2>
    <h4 class="mb-4">SELECIONE SUA OPÇÃO DE CADASTRO:</h4>
    <div class="row">
      <div class="col">
      <a href="{{ route('register') }}" class="btn btn-custom btn-lg btn-block">Cliente</a>


      </div>
      <div class="col">
        <a href="{{ route('seller.register') }}" class="btn btn-custom btn-lg btn-block">Vendedor</a>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>