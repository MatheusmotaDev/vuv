<?php

//Code by Rafael-Neri
function verifyCpf($cpf)
{
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}

//Code by srRodolfo
function verifyCnpj(string $document): bool
{
    // Extrai os números
    $cnpj = preg_replace('/[^0-9]/is', '', $document);

    // Valida tamanho
    if (strlen($cnpj) != 14) {
        return false;
    }

    // Verifica sequência de digitos repetidos. Ex: 11.111.111/111-11
    if (preg_match('/(\d)\1{13}/', $cnpj)) {
        return false;
    }

    // Valida dígitos verificadores
    for ($t = 12; $t < 14; $t++) {
        for ($d = 0, $m = ($t - 7), $i = 0; $i < $t; $i++) {
            $d += $cnpj[$i] * $m;
            $m = ($m == 2 ? 9 : --$m);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cnpj[$i] != $d) {
            return false;
        }
    }

    return true;
}
