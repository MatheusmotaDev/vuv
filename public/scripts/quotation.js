document.getElementById("addPartBtn").addEventListener("click", function() {
    const categorySelect = document.getElementById("categorySelect");
    const partNameInput = document.getElementById("partName");
    const quantityInput = document.getElementById("quantity");
    const brandInput = document.getElementById("brand");
    const descriptionInput = document.getElementById("description");

    const category = categorySelect.value;
    const partName = partNameInput.value;
    const quantity = quantityInput.value;
    const brand = brandInput.value;
    const description = descriptionInput.value;

    if (category === "Selecione uma categoria" || partName === "" || quantity === "" || brand === "" || description === "") {
      alert("Por favor, preencha todos os campos antes de adicionar uma peça.");
      return;
    }

    const quotationItemsBody = document.getElementById("quotationItemsBody");

    const newRow = document.createElement("tr");
    newRow.innerHTML = `<td>${category}</td><td>${partName}</td><td>${quantity}</td><td>${brand}</td><td>${description}</td>`;
    quotationItemsBody.appendChild(newRow);

    // Add item to hidden input
    const items = document.getElementById("quotationItems").value ? JSON.parse(document.getElementById("quotationItems").value) : [];
    items.push({ category, partName, quantity, brand, description });
    document.getElementById("quotationItems").value = JSON.stringify(items);

    // Reset form fields
    categorySelect.value = "Selecione uma categoria";
    partNameInput.value = "";
    quantityInput.value = "";
    brandInput.value = "";
    descriptionInput.value = "";
  });