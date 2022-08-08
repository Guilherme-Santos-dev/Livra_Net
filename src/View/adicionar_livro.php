<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livra net - Cadastro de livros</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-blue-400">
        <ul class="flex">
            <li class="mx-3">
                <a href="../../index.html">Tela inicial</a>
            </li>
        </ul>
    </header>
    <fieldset class="p-4 m-5 border border-blue-400">
    <main class="mt-4 ml-4">
        <form action="../Controller/Livro.php?operation=insert" method="POST">
            <section class="columns-3">
                <article>
                    <label for="name">Digite o nome do livro: </label>
                    <input type="text" id="nome" name="nome" class="border border-blue-400">
                </article>
                <article>
                    <label for="name">Autor do livro: </label>
                    <input type="text" id="autor" name="autor" class="border border-blue-400">
                </article>
                <article>
                    <label for="quantity">Ano de lançamento: </label>
                    <input type="number" id="ano" name="ano" class="border border-blue-400" min=1 max=2023>
                </article>
            </section>
            <article class="flex justify-center mt-4">
                <button type="submit" class="rounded p-4 bg-blue-700 text-white">Cadastrar</button>
            </article>
            </fieldset>
        </form>
    </main>
</body>
</html>