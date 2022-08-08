<?php

namespace APP\Model;

class Livro{
    // propriedades

    private int $codigo;
    private string $autor;
    private int $ano;
    private string $nome;
    private bool $isActive;

    public function __construct(
        string $autor,
        int $ano,
        string $nome,
        bool $isActive=true,
        int $codigo = 0
    )
    {
        $this->autor = $autor;
        $this->ano = $ano;
        $this->nome = $nome;
        $this->isActive = $isActive;
        $this->codigo = $codigo; 
        
    }

    public function __get($atributos)
    {
        return $this->$atributos;
    }


}