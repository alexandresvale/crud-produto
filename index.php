<?php

use Alexandre\Crud\Repository\Conexao;
use Alexandre\Crud\Repository\ProdutoRepository;

require_once __DIR__ . '\autoload.php';
$nomeGet = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);
$status = "";
$pdo = Conexao::ObterConexao();
$produtoRepository = new ProdutoRepository($pdo);

if ($nomeGet) {
    try {
        $listaDeProdutos = $produtoRepository->buscarPorNome($nomeGet);
    } catch (DomainException $domainException) {
        $status = "<div class='alert alert-warning' role='alert'>{$domainException->getMessage()}</div>";
    }
} else {
    try {
        $listaDeProdutos = $produtoRepository->buscarTodos();
    } catch (DomainException $domainException) {
        $status = "<div class='alert alert-warning' role='alert'>{$domainException->getMessage()}</div>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Produto</title>
</head>
<body>
<div class="container">
    <!-- Content here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <a class="navbar-brand" href="index.php">
                <img src="img/logoalexandre.svg" width="30" height="30" class="d-inline-block align-top"
                     alt="Logo Alexandre" loading="lazy">
                Alexandre Vale
            </a>
            <ul class="navbar-nav mr-auto mt2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produto-editar.php">Cadastro de produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
            </ul>
        </div>
        <form class="form-inline" method="get" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar produto" name="nome">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>

    </nav>
    <?php if (!empty($listaDeProdutos)): ?>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listaDeProdutos as $produto): ?>

            <tr class='clickable-row' data-href='produto-editar.php?id=<?= $produto->getId() ?>'>
                <td><?= $produto->getId() ?> </td>
                <td><?= $produto->getNome() ?></td>
                <td><?= $produto->getDescricao() ?></td>
                <td><?= $produto->getPreco() ?></td>
                <td><?= $produto->getImagem() ?></td>
                <td>
                    <a href="produto-editar.php?id=<?= $produto->getId() ?>">
                        <img src="img/edit.svg" alt="Editar produto">
                    </a>
                    <a href="produto-excluir.php?id=<?= $produto->getId() ?>">
                        <img src="img/delete.svg" alt="Editar produto">
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

            <!-- INICIO DECK DE CARD -->
            <div class="row row-cols-1 row-cols-md-4">
                <?php foreach ($listaDeProdutos as $produto): ?>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="<?= "uploads/{$produto->getImagem()}" ?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= $produto->getNome() ?></h5>
                                <p class="card-text"><?= $produto->getDescricao() ?></p>
                                <p class="card-text">R$ <?= $produto->getPreco() ?></p>
                                <a href="produto-editar.php?id=<?= $produto->getId() ?>" class="btn btn-primary">Detalhe</a>
                                <a href="produto-excluir.php?id=<?= $produto->getId() ?>" class="btn btn-danger">Excluir</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- FIM DECK CARD -->

        </table>
    <?php else: echo $status ?>
    <?php endif; ?>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">

</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        })
    })

</script>
</body>
</html>