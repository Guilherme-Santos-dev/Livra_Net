<?php

namespace APP\Controller;

use APP\Model\DAO\LivroDAO;
use APP\Model\Livro;
use APP\Model\Validacao;
use APP\Utils\Redirecionamento;

require_once '../../vendor/autoload.php';

if (empty($_GET['operation'])){
    Redirecionamento::redirecionamento(mensagem: 'Nenhuma operação foi informada.', type: 'erro');
}

switch ($_GET['operation']) {
    case 'insert':
        insertLivro();
        break;
    case 'list':
        listLivro();
        break;
    case 'remove':
        remove();
        break;
    default:
        Redirecionamento::redirecionamento(mensagem: 'Operação inválida!!!', type: 'erro');
}

function insertLivro(){
    if (empty($_POST)){
        Redirecionamento::redirecionamento(mensagem: 'Requisiçaõ inválida', type: 'erro');
    }
}

$livroNome = $_POST["nome"];
$livroAutor = $_POST["autor"];
$livroAno = (int) $_POST["ano"];

$error = array();

if (!Validacao::validacaoNome($livroNome)){
    array_push($error, "O nome do livro deve conter mais de 4 caracteres");
}

if (!Validacao::validacaoNome($livroAutor)){
    array_push($error, "O nome do autor deve ser maior que 4 caracteres");
}

if (!Validacao::validacaoNumero($livroAno)){
    array_push($error, "O ano do livro deve ser maior que zero");
}

if ($error) {
    Redirecionamento::redirecionamento(mensagem: $error, type:'atencao');
} else {
    $livro = new Livro(
        nome: $livroNome,
        autor: $livroAutor,
        ano: $livroAno
    );

    $dao = new LivroDAO();
    $result = $dao->insert($livro);

    if ($result)
    Redirecionamento::redirecionamento(mensagem: "Livro cadastrado com sucesso");

    else
        Redirecionamento::redirecionamento(mensagem: ["Lamento não foi possivel cadastar o livro"], type: 'atencao');

}

function listLivro(){
    $dao = new LivroDAO();
    session_start();
    $data = $dao->findAll();

    if($data) {
        $_SESSION['livro_data'] = $data;
        header('location:../View/acervo.php');
    } else {
        Redirecionamento::redirecionamento(mensagem:['Lamento, não existem livros cadastrados'], type: 'atencao');
    }
}

function remove(){
    if (empty($_GET['code'])){
        Redirecionamento::redirecionamento(mensagem: 'Nenhum código de livro foi encontrado', type: 'erro');
    }
    if (!Validacao::validacaoNumero($_GET['code'])){
        Redirecionamento::redirecionamento(mensagem: 'O código do livro é invalido', type: 'erro');
    }

    $dao = new LivroDAO();
    $result = $dao->delete($_GET['code']);

    if ($result){
        Redirecionamento::redirecionamento(mensagem: 'Livro removido com sucesso');
    } else {
        Redirecionamento::redirecionamento(mensagem: 'Não foi possivel remover o livro');
    }
}

