<?php

namespace APP\Model\DAO;

use APP\Model\Conexao;
use APP\Model\Livro;
use PDO;

class LivroDAO{
    
    public function insert (Livro $livro): bool
    {
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare('INSERT INTO livro VALUES (null,?,?,?);');
        $stmt->bindParam(1, $livro->autor);
        $stmt->bindParam(2, $livro->ano);
        $stmt->bindParam(3, $livro->nome);
        return $stmt->execute();
    }

    public function findAll(): array
    {
        $conexao = Conexao::getConexao();
        $stmt = $conexao->query('select * from livro');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id):bool{
        $conexao = Conexao::getConexao();
        $stmt = $conexao->prepare('delete from livro where codigo_livro = ?');
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}