<?php

class Pagamento {

    private $tipoPagamento;
    private $status;

    public function __construct($tipoPagamento, $status) {

        $this->tipoPagamento = $tipoPagamento;
        $this->status = $status;
    }

    public function confirmarPagamento() {

        $this->status = "Pagamento aprovado";
    }

    public function getStatus() {

        return $this->status;
    }

    public function getTipo() {

        return $this->tipoPagamento;
    }
}
