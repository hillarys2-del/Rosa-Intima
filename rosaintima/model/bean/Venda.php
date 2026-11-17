<?php
    class Venda {
        // Atributos
        private $id;
        private $data_venda;
        private $valor_total; //Associação com a classe Funcionário e Cliente
        private $forma_pagamento;
        private $funcionario;
        private $cliente;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getData_venda() {
            return $this->data_venda;
        }

        public function setData_venda($data_venda) {
            $this->data_venda = $data_venda;
        }

        public function getValor_total() {
            return $this->valor_total;
        }

        public function setValor_total($valor_total) {
            $this->valor_total = $valor_total;
        }

        public function getForma_pagamento() {
            return $this->forma_pagamento;
        }

        public function setForma_pagamento($forma_pagamento) {
            $this->forma_pagamento = $forma_pagamento;
        }

        // Get e Set do atributo de associação
        public function getFuncionario() {
            return $this->funcionario;
        }

        public function setFuncionario($funcionario) {
            $this->funcionario = $funcionario;
        }

        public function getCliente() {
            return $this->cliente;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }
        
    }