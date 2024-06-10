<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar cotação</title>
  <link href="/css/quotation.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  
  @include('customer.navbar')

  <br>

  <div class="container">
    @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


  <div class="container">
    <h1 class="form-title text-center">Iniciar Cotação</h1>
    
    <form id="quotationForm" method="POST">
      @csrf

      <input type="hidden" id="quotationItems" name="quotationItems">

      <!-- Seção de informações da cotação -->
      <div class="form-section">
        <div class="row">
          <div class="col-md-6 input-container">
            <label for="quotationTitle" class="form-label">Título da cotação:</label>
            <input type="text" class="form-control" id="quotationTitle" name="quotationTitle" placeholder="Digite o título da cotação">
          </div>
          <div class="col-md-6 input-container">
            <label for="deliveryAddress" class="form-label">Endereço para entrega:</label>
            <input type="text" class="form-control" id="deliveryAddress" name="deliveryAddress" placeholder="Digite o endereço de entrega">
          </div>
        </div>
      </div>
    
      <!-- Seção de adição de peças -->
      <h2 class="section-header">Informe as peças desejadas</h2>
      <div class="row">
        <div class="col-md-6 input-container">
          <label for="categorySelect" class="form-label">Categoria:</label>
          <select class="form-select" id="categorySelect">
            <option selected disabled>Selecione uma categoria</option>
            <option>Motor</option>
            <option>Suspensão</option>
            <option>Freios</option>
            <option>Eletrônicos</option>
            <option>Transmissão</option>
            <option>Interior e Estética</option>
            <option>Refrigeração do Motor</option>
            <option>Outros</option>
          </select>
        </div>
        <div class="col-md-6 input-container">
          <label for="name" class="form-label">Peça:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da peça">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 input-container">
          <label for="quantity" class="form-label">Quantidade:</label>
          <input type="number" class="form-control" id="quantity" placeholder="Digite a quantidade">
        </div>
        <div class="col-md-6 input-container">
          <label for="brand" class="form-label">Marca:</label>
          <input type="text" class="form-control" id="brand" placeholder="Digite a marca da peça">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 input-container">
          <label for="description" class="form-label">Descrição:</label>
          <textarea class="form-control" id="description" rows="2" placeholder="Digite uma descrição"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 input-container d-flex align-items-end">
          <button type="button" class="btn btn-primary" id="addPartBtn">Adicionar Peça</button>
        </div>
      </div>
    
      <!-- Tabela de peças adicionadas -->
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">Categoria</th>
            <th scope="col">Peça</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Marca</th>
            <th scope="col">Descrição</th>
          </tr>
        </thead>
        <tbody id="quotationItemsBody">
          <!-- Itens da cotação serão inseridos aqui -->
        </tbody>
      </table>
    
      <!-- Observações gerais -->
      <div class="input-container">
        <label for="generalNotes" class="form-label">Observações Gerais:</label>
        <textarea class="form-control" id="generalNotes" name="generalNotes" rows="3" placeholder="Digite suas observações"></textarea>
      </div>
    
      <!-- Botão de envio -->
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success" id="createQuotationBtn">Criar Cotação</button>
      </div>
    </form>
    
  <!-- Modal de confirmação -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Cotação Criada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Cotação criada com sucesso!
        </div>
        <div class="modal-footer">
          <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar para Dashboard</a>
        </div>
      </div>
    </div>
  </div>

<script src="/scripts/quotation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>
