<!DOCTYPE html>
<html>

<head>
    <title>Nosso Acervo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width;initial-scale=1.0">
    <meta name="keywords" content="content="ACERVO">
    <link rel="stylesheet" href="css/acervo.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <?php session_start(); ?>
     <header>
       <a href="../../index.html"><button type="button"> <img src="./img/logo atualizado.png"></button> </a>
            <ul>
                <li><a href="../View/login.html">Login</a></li>
                <li><a href="../View/registro.html">Registre-se</a></li>
                <li><a href="../View/perfil.html">Perfil</a></li>
            </ul>
    </header>
    <div class="content">
        <div class="textBox">
            <h2>Bem-Vindo ao nosso acervo digital</h2>
        </div>
        <table class="w-screen mt-5">
            <thead class="bg-blue-800 text-white">
                <th>Nome do livro</th>
                <th>Autor do livro</th>
                <th>Ano de lançamento</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['livro_data'] as $livro) :
                ?>
                    <tr>
                        <td class="text-center">
                            <?= $livro['nome_do_livro'] ?>
                        </td>
                        <td class="text-center">
                            <?= $livro['autor'] ?>
                        </td>
                        <td class="text-center">
                            <?= $livro['ano_de_lancamento'] ?>
                        </td>
                        <td class="text-center">
                            <a href="../Controller/Livro.php?operation=remove&code=<?= $livro['codigo_livro'] ?>" class="text-red-500 font-bold">Remover</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>