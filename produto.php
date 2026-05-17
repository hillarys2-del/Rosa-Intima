<?php

class Produto {

    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $estoque;

    public function __construct(
        $nome,
        $preco,
        $descricao,
        $categoria,
        $estoque
    ) {

        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->estoque = $estoque;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function exibirDetalhes() {

        echo "<h3>{$this->nome}</h3>";

        echo "Categoria: {$this->categoria}<br>";

        echo "Preço: R$ {$this->preco}<br>";

        echo "Descrição: {$this->descricao}<br>";

        echo "Estoque: {$this->estoque}<br><br>";
    }
}