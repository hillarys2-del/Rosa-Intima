<?php
    class Item_venda {
        // Atributos
        private $venda;
        private $produto;
        private $quantidade;
        private $preco_unitario; //Associação com a classe Categoria

        // Métodos de encapsulamento (getters e setters)
        public function getVenda() {
            return $this->venda;
        }

        public function setVenda($venda) {
            $this->venda = $venda;
        }

        public function getProduto() {
            return $this->produto;
        }

        public function setProduto($produto) {
            $this->produto = $produto;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function setQuantidade($quantidade) {
            $this->quantidade = $quantidade;
        }

        // Get e Set do atributo de associação
        public function getPrecoU() {
            return $this->precoU;
        }

        public function setPrecoU($precoU) {
            $this->precoU = $precoU;
        }
    }