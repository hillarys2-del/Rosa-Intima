<?php

class Cliente {

    private $nome;
    private $email;
    private $telefone;
    private $senha;

    public function __construct($nome, $email, $telefone, $senha) {

        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
        
   }
    
   public function getNome() {
    return $this->nome;
   }

   public function getEmail() {
    return $this->email;
   }

   public function getTelefone() {
    return $this->telefone;
   }

   public function getSenha() {
    return $this->senha;
   }

   public function setNome($nome) {
    $this->nome = $nome;
   }

   public function setEmail($email) {
    $this->email = $email;
   }

   public function setTelefone($telefone) {
    $this->telefone = $telefone;
   }

   public function setSenha($senha) {
    $this->senha = $senha;
   }

    public function login() {

        echo "<h2>Cliente logado com sucesso!</h2>";
    }

    public function visualizarProdutos() {

        echo "Visualizando catálogo...";
    }

    public function finalizarCompra($pedido) {

        echo "<h2>Compra finalizada!</h2>";

        $pedido->gerarPedido();
    }
}
