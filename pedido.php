<?php

    require_once "Produto.php";
    require_once "Pagamento.php";
    require_once "Entrega.php";
    require_once "Cliente.php";
    
    class Pedido {
    
        private $data;
        private $status;
        private $valorTotal;
    
        private $cliente;
        private $pagamento;
        private $entrega;
    
        private $produtos = [];
    
        public function __construct($data, $status, $cliente, $pagamento, $entrega) {
    
            $this->data = $data;
            $this->status = $status;
            $this->cliente = $cliente;
            $this->pagamento = $pagamento;
            $this->entrega = $entrega;
        }
    
        public function getData() {
            return $this->data;
        }
    
        public function getStatus() {
            return $this->status;
        }
    
        public function getValorTotal() {
            return $this->valorTotal;
        }
    
        public function getCliente() {
            return $this->cliente;
        }
    
        public function getPagamento() {
            return $this->pagamento;
        }
    
        public function getEntrega() {
            return $this->entrega;
        }
    
        public function getProdutos() {
            return $this->produtos;
        }
    
        public function setData($data) {
            $this->data = $data;
        }
    
        public function setStatus($status) {
            $this->status = $status;
        }
    
        public function setValorTotal($valorTotal) {
            $this->valorTotal = $valorTotal;
        }
    
        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }
    
        public function setPagamento($pagamento) {
            $this->pagamento = $pagamento;
        }
    
        public function setEntrega($entrega) {
            $this->entrega = $entrega;
        }
    
        public function adicionarProduto($produto) {
            $this->produtos[] = $produto;
        }
    
        public function calcularValor() {
            $total = 0;
            foreach($this->produtos as $produto) {
                $total += $produto->getPreco();
            }
    
            $this->valorTotal = $total;
            return $total;
        }
    
        public function gerarPedido() {
    
            echo "<h1>🌹 Rosa Íntima</h1>";
    
            echo "<h2>Pedido</h2>";
    
            echo "Cliente: " .
            $this->cliente->getNome() . "<br>";
    
            echo "Data: {$this->data}<br>";
    
            echo "Status: {$this->status}<br>";
    
            echo "Pagamento: " .
            $this->pagamento->getTipoPagamento() . "<br><br>";
    
            echo "<h3>Produtos</h3>";
    
            foreach($this->produtos as $produto) {
                $produto->exibirDetalhes();
            }
    
            echo "<h3>Total: R$ " . $this->calcularValor() . "</h3><br>";
            $this->entrega->exibirEntrega();
        }
    }
