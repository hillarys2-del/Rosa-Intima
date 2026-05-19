<?php

class Produto {

    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $estoque;

    public function __construct($nome, $preco, $descricao, $categoria, $estoque) {

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

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function atualizarPreco($novoPreco) {
        $this->preco = $novoPreco;
    }

    public function atualizarEstoque($quantidade) {
        $this->estoque -= $quantidade;
    }

    public function verificarDisponibilidade() {
        if($this->estoque > 0) {
            return "Disponível";
        }

        return "Indisponível";
    }

    public function aplicarDesconto($porcentagem) {
        $desconto = ($this->preco * $porcentagem) / 100;
        $this->preco -= $desconto;
    }

    public function exibirDetalhes() {

        echo "<div>";

        echo "<h3>{$this->nome}</h3>";

        echo "Categoria: {$this->categoria}<br>";

        echo "Preço: R$ {$this->preco}<br>";

        echo "Descrição: {$this->descricao}<br>";

        echo "Estoque: {$this->estoque}<br>";

        echo "Status: " . $this->verificarDisponibilidade() . "<br><br>";

        echo "</div>";
    }
}

?>
