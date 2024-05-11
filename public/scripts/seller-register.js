$('#phone_number').mask('(00) 00000-0000');


$(document).ready(function() {
    $('#legal_id').on('input', function() {
        var value = $(this).val().replace(/\D/g, '');
        var maskedValue = '';
        if (value.length <= 11) {
            // CPF
            maskedValue = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4');
        } else {
            // CNPJ
            maskedValue = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*/, '$1.$2.$3/$4-$5');
        }
        $(this).val(maskedValue);
    });
});