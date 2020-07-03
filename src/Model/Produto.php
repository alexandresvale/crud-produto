<?php


namespace Alexandre\Crud\Model;


class Produto
{
    private ?int $id;
    private string $nome;
    private float $preco;
    private string $descricao;
    private string $imagem;

    /**
     * Produto constructor.
     * @param int $id
     * @param string $nome
     * @param float $preco
     * @param string $descricao
     * @param string $imagem
     */
    public function __construct(?int $id, string $nome, float $preco, string $descricao, string $imagem)
    {

        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     */
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * @param string $imagem
     */
    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }


}