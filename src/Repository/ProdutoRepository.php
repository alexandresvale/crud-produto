<?php


namespace Alexandre\Crud\Repository;

use Alexandre\Crud\Model\Produto;
use PDO;

class ProdutoRepository
{
    private PDO $conexao;

    /**
     * ProdutoRepository constructor.
     * @param PDO $conexao
     */
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    //Buscando dos os produtos.
    public function buscarTodos(): array
    {
        $sql = "SELECT * FROM produto;";
        $stmt = $this->conexao->query($sql);
        if ($stmt->rowCount() == 0) {
            throw new \DomainException("Nenhum dado cadastrado.");
        }
        return $this->trataRetorno($stmt);
    }

    //Buscando todos os produto pelo nome.
    public function buscarPorNome(string $nome): array
    {
        $sql = "SELECT * FROM produto WHERE nome LIKE :nome;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', '%' . $nome . '%', PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            throw new \DomainException("Produto não encontrado");
        }
        return $this->trataRetorno($stmt);
    }

    //Buscando todos os produto pelo id.
    public function buscarPorId(int $id): Produto
    {
        $sql = "SELECT * FROM produto WHERE id = :id;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            throw new \DomainException("Produto não encontrado");
        }
        return $this->trataRetorno($stmt)[0];
    }


    public function salvar(Produto $produto): bool
    {
        if ($produto->getId() != null) {
            return $this->alterar($produto);
        }
        return $this->inserir($produto);
    }

    public function remover(int $id): bool
    {
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            throw new \DomainException("Produto não removido.");
        }
        return true;
    }

    private function inserir(Produto $produto): bool
    {
        $sql = "INSERT INTO produto (nome, preco, descricao, imagem) VALUES (:nome, :preco, :descricao, :imagem);";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':imagem', $produto->getImagem());
        $resultado = $stmt->execute();
        return $resultado;
    }

    private function alterar(Produto $produto)
    {
        $sql = "UPDATE produto SET nome =:nome, preco =:preco, descricao =:descricao, imagem =:imagem
                WHERE id = :id;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':descricao', $produto->getDescricao());
        $stmt->bindValue(':imagem', $produto->getImagem());
        $stmt->bindValue(':id', $produto->getId());
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            throw new \DomainException("Erro ao atualizar os dados.");
        }
        return true;

    }

    private function trataRetorno(\PDOStatement $statement): array
    {
        $resultado = $statement->fetchAll();
        $listaProduto = [];
        foreach ($resultado as $item) {
            $listaProduto[] = new Produto(
                $item['id'], $item['nome'], $item['preco'], $item['descricao'], $item['imagem']
            );
        }
        return $listaProduto;
    }

}