<?php

use Alexandre\Crud\Repository\Conexao;
use Alexandre\Crud\Repository\ProdutoRepository;

require_once 'autoload.php';

$id = filter_input(INPUT_GET, "id",FILTER_SANITIZE_STRING);
$statusRetorno = "";

if($id) {
    $pdo = Conexao::ObterConexao();
    $produtoRepository = new ProdutoRepository($pdo);
    try {
        $produto = $produtoRepository->buscarPorId($id);
        Alexandre\Crud\Repository\ImagemDir::remover($produto->getImagem());
        if ($produtoRepository->remover($id)){
           echo "<div class='alert alert-success' role='alert'>Produto excluído com sucesso!</div>";
        }
    } catch (DomainException $domainException) {
        $statusRetorno = "<div class='alert alert-danger' role='alert'>{$domainException->getMessage()}</div>";$domainException->getMessage();
    } finally {
        header("Location: index.php?$statusRetorno");
    }
} else {
    header('Location: index.php');

}