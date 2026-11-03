<?php
    class Produto {
        // Atributos
        private $id;
        private $nome;
        private $descricao;
        private $preco;
        private $estoque;
        private $categoria; //Associação com a classe Categoria

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }


        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getEstoque() {
            return $this->estoque;
        }

        public function setEstoque($estoque) {
            $this->estoque = $estoque;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        // Get e Set do atributo de associação
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }
    }