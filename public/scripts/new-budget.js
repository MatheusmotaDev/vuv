document.addEventListener("DOMContentLoaded", function() {
    const confirmButtons = document.querySelectorAll('.confirm-price');
    const totalPriceInput = document.getElementById('total-price');
    const totalPriceDisplay = document.getElementById('total-price-display');
    const resetButton = document.getElementById('resetBudget');
    const priceModal = new bootstrap.Modal(document.getElementById('priceModal'));

    confirmButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const priceInput = document.getElementById('price-' + itemId);

            if (priceInput.value !== '') {
                const price = parseFloat(priceInput.value);
                const quantity = parseFloat(priceInput.getAttribute('data-quantity'));

                if (!isNaN(price) && !isNaN(quantity)) {
                    let totalPrice = parseFloat(totalPriceInput.value);

                    if (isNaN(totalPrice)) {
                        totalPrice = 0;
                    }

                    const newTotalPrice = totalPrice + price * quantity;
                    totalPriceInput.value = newTotalPrice.toFixed(2);
                    totalPriceDisplay.value = 'R$ ' + newTotalPrice.toFixed(2);
                }
            }

            priceModal.show();
        });
    });

    resetButton.addEventListener('click', function() {
        totalPriceInput.value = '0.00';
        totalPriceDisplay.value = 'R$ 0.00';
        const priceInputs = document.querySelectorAll('.price');

        priceInputs.forEach(input => {
            input.value = '';
        });
    });
});
