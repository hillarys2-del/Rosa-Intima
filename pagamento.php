<?php

class Pagamento {

    private $tipoPagamento;
    private $status;

    public function __construct($tipoPagamento, $status) {

        $this->tipoPagamento = $tipoPagamento;
        $this->status = $status;
    }
    
    public function getTipoPagamento() {

        return $this->tipoPagamento;
    }

    public function getStatus() {

        return $this->status;
    }

    public function setTipoPagamento($tipoPagamento) {

        $this->tipoPagamento = $tipoPagamento;
    }

    public function setStatus($status) {

        $this->status = $status;
    }
    
    public function confirmarPagamento() {

        $this->status = "Pagamento aprovado";
    }
}
