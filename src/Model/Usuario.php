<?php

namespace APP\Model;

class Usuario{
    
    //propriedades
    private int $codigo;
    private string $nome;
    private string $email;
    private string $senha;
    private bool $isActive;

    public function __construct(
        string $nome,
        string $email,
        string $senha,
        bool $isActive = true,
        int $codigo = 0

    )
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->isActive = $isActive;
        $this->codigo = $codigo; 
    }

    public function __get($atributos)
    {
        return $this->$atributos;
    }
}


