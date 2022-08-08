<?php

namespace APP\Model;

class Validacao{
    public static function validacaoNome(string $nome): bool
    {
        return mb_strlen($nome) > 4;
    }

    public static function validacaoNumero(string $numero): bool
    {
        return $numero > 0;
    }

    public static function validacaoSenha(string $senha): bool
    {
        return mb_strlen($senha) > 8;
    }
}