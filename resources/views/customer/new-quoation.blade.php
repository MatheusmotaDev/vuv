<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar cotação</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
 
  <style>
    .vuv {
        width: 60px;
        height: 60px;
      }
      
    .form-section {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .form-title {
      margin-top: 50px;
      margin-bottom: 20px;
    }
    .input-container {
      margin-bottom: 15px;
    }
    .input-container label {
      font-weight: bold;
    }
    .input-container input,
    .input-container select,
    .input-container textarea {
      max-width: 100%;
    }
    .section-header {
      margin-top: 40px;
      margin-bottom: 20px;
      font-size: 1.5rem;
      font-weight: bold;
      color: #495057;
    }
    .btn-primary, .btn-success {
      width: 100%;
      max-width: 200px;
    }
    .btn-primary {
      margin-top: 10px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>




</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="img/dashboard/logo_vuv_azul.png" class="vuv" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">ÁREA DO CLIENTE</a>
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

  <div class="container">
    <h1 class="form-title text-center">Iniciar Cotação</h1>
    
    <form id="quotationForm">
      <div class="form-section">
        <div class="row">
          <div class="col-md-6 input-container">
            <label for="quotationTitle" class="form-label">Título da cotação:</label>
            <input type="text" class="form-control" id="quotationTitle" placeholder="Digite o título da cotação">
          </div>
          <div class="col-md-6 input-container">
            <label for="deliveryAddress" class="form-label">Endereço para entrega:</label>
            <input type="text" class="form-control" id="deliveryAddress" placeholder="Digite o endereço de entrega">
          </div>
        </div>
      </div>

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
          <label for="partName" class="form-label">Peça:</label>
          <input type="text" class="form-control" id="partName" placeholder="Digite o nome da peça">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 input-container">
          <label for="quantity" class="form-label">Quantidade:</label>
          <input type="number" class="form-control" id="quantity" placeholder="Digite a quantidade">
        </div>
        <div class="col-md-6 input-container d-flex align-items-end">
          <button type="button" class="btn btn-primary" id="addPartBtn">Adicionar Peça</button>
        </div>
      </div>

      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">Categoria</th>
            <th scope="col">Peça</th>
            <th scope="col">Quantidade</th>
          </tr>
        </thead>
        <tbody id="quotationItemsBody">
          <!-- Itens da cotação serão inseridos aqui -->
        </tbody>
      </table>

      <div class="input-container">
        <label for="generalNotes" class="form-label">Observações Gerais:</label>
        <textarea class="form-control" id="generalNotes" rows="3" placeholder="Digite suas observações"></textarea>
      </div>

      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-success" id="createQuotationBtn">Criar Cotação</button>
      </div>
    </form>
  </div>

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
          <a href="#" class="btn btn-primary">Voltar para Dashboard</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById("addPartBtn").addEventListener("click", function() {
      const categorySelect = document.getElementById("categorySelect");
      const partNameInput = document.getElementById("partName");
      const quantityInput = document.getElementById("quantity");

      const category = categorySelect.value;
      const partName = partNameInput.value;
      const quantity = quantityInput.value;

      if (category === "Selecione uma categoria" || partName === "" || quantity === "") {
        alert("Por favor, preencha todos os campos antes de adicionar uma peça.");
        return;
      }

      const quotationItemsBody = document.getElementById("quotationItemsBody");

      const newRow = document.createElement("tr");
      newRow.innerHTML = `<td>${category}</td><td>${partName}</td><td>${quantity}</td>`;
      quotationItemsBody.appendChild(newRow);

      // Reset form fields
      categorySelect.value = "Selecione uma categoria";
      partNameInput.value = "";
      quantityInput.value = "";
    });

    document.getElementById("createQuotationBtn").addEventListener("click", function() {
      // Simulate form submission
      const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
      modal.show();
    });
  </script>
</body>
</html>
