document.getElementById('addPartBtn').addEventListener('click', function () {
  // Coleta os dados do item
  const category = document.getElementById('categorySelect').value;
  const name = document.getElementById('partName').value;
  const quantity = document.getElementById('quantity').value;
  const brand = document.getElementById('brand').value;
  const description = document.getElementById('description').value;

  // Valida os dados
  if (category && partName && quantity && brand && description) {
      // Adiciona o item à tabela
      const tableBody = document.getElementById('quotationItemsBody');
      const row = tableBody.insertRow();
      row.insertCell(0).innerText = category;
      row.insertCell(1).innerText = partName;
      row.insertCell(2).innerText = quantity;
      row.insertCell(3).innerText = brand;
      row.insertCell(4).innerText = description;

      // Atualiza o campo hidden com os dados dos itens
      const items = JSON.parse(document.getElementById('quotationItems').value || '[]');
      items.push({ category, name, quantity, brand, description });
      document.getElementById('quotationItems').value = JSON.stringify(items);

      // Limpa os campos do item
      document.getElementById('categorySelect').selectedIndex = 0;
      document.getElementById('partName').value = '';
      document.getElementById('quantity').value = '';
      document.getElementById('brand').value = '';
      document.getElementById('description').value = '';
  } else {
      alert('Por favor, preencha todos os campos do item.');
  }
});

document.getElementById('quotationForm').addEventListener('submit', function (e) {
  // Valida se há itens adicionados
  const items = document.getElementById('quotationItems').value;
  if (!items || JSON.parse(items).length === 0) {
      e.preventDefault();
      alert('Por favor, adicione pelo menos um item.');
  }
});
