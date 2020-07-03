<?php

require_once "autoload.php";

include __DIR__ . "/produto-receber.php";

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Formulário Produto</title>
</head>
<body>
<div class="container">
    <!-- MENU DO SITE -->
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
    </nav>
    <!-- FIM MENU DO SITE -->

    <!-- MENSAGEM DE ERRO -->
    <?php echo $status ?>
    <div class="row">
        <!-- FORMULARIA HTML-->
        <div class="col-8">
            <form method="post" action="./produto-editar.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo ($produto != null) ? $produto->getId() : 0 ?>">
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                           value="<?php echo ($produto != null) ? $produto->getNome() : "" ?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição do produto</label>
                    <input type="text" class="form-control" id="descricao" name="descricao"
                           value="<?php echo ($produto != null) ? $produto->getDescricao() : "" ?>">
                </div>
                <div class="form-group">
                    <label for="preco">Preco do produto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">R$</div>
                        </div>
                        <input type="text" class="form-control" id="preco" name="preco"
                               value="<?php echo ($produto != null) ? $produto->getPreco() : "" ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Selecionar Arquivo.</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagem">
                </div>


                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>

        <!-- FIM FORMULARIA HTML-->

        <!-- PREVIEW IMAGEM -->
        <div class="col-4">
            <img src="<?= ($produto != null) ? "uploads/{$produto->getImagem()}" : "" ?>" alt="Editar produto"
                 style="width: 250px; height: 250px; background-color: lightslategray">
        </div>
    </div>
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
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>

</script>

</body>
</html>



