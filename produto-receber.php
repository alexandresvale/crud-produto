<?php

use Alexandre\Crud\Model\Produto;
use Alexandre\Crud\Repository\Conexao;
use Alexandre\Crud\Repository\ImagemDir;
use Alexandre\Crud\Repository\ProdutoRepository;

require_once "autoload.php";


$produto = null;
$imagemEncontrada = null;
$status = "";
$arrayPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$arrayGet = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$pdo = Conexao::ObterConexao();
$produtoRepository = new ProdutoRepository($pdo);

if ($arrayGet) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $id = intval($id);
    $produto = $produtoRepository->buscarPorId($id);
}
if ($arrayPost) {
    if (in_array("", $arrayPost)) {
        $status = "<div class='alert alert-warning' role='alert'>Preencha o formulário para cadastrar o produto!</div>";
    } else {
        if (intval($arrayPost['id']) > 0) {
            //Verifica sem tem imagem anterio do objeto e remove.
            $id = intval($arrayPost['id']);
            $produto = $produtoRepository->buscarPorId($id);
            ImagemDir::remover($produto->getImagem());
        } else {
            $id = null;
        }
        $nome = $arrayPost['nome'];
        $preco = floatval(str_replace(',', '.', $arrayPost['preco']));
        $descricao = $arrayPost['descricao'];

        if ($_FILES && !empty($_FILES['imagem']['name'])) {
            $imagem = ImagemDir::salvar($_FILES['imagem']);
            if ($produtoRepository->salvar(new Produto($id, $nome, $preco, $descricao, $imagem))) {
                $status = "<div class='alert alert-success' role='alert'>Produto cadastrado com sucesso!</div>";
            }
        } else {
            $status = "<div class='alert alert-warning' role='alert'>Selecione um arquivo!</div>";
        }
    }
}


