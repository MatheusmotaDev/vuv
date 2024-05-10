<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LegalIdRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regexCpf = '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/';

        $regexCnpj = '/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/';

        //Verifica se o input do usuário corresponde ao formato do cnpj ou cpf
        if(!preg_match($regexCpf, $value) && !preg_match($regexCnpj, $value)) {
            $fail('CPF ou CNPJ inválido');
        }
        //Verifica a validade do cpf e cnpj, de acordo com suas respectivas regras
        if(!verifyCpf($value) && !verifyCnpj($value)) {
            $fail('CPF ou CNPJ inválido');
        }
    }
}
