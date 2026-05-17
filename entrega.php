<?php

class Entrega {

    private $endereco;
    private $prazo;
    private $status;

    public function __construct(
        $endereco,
        $prazo,
        $status
    ) {

        $this->endereco = $endereco;
        $this->prazo = $prazo;
        $this->status = $status;
    }

    public function rastrearEntrega() {

        return $this->status;
    }

    public function exibirEntrega() {

        echo "<h3>Entrega</h3>";

        echo "Endereço: {$this->endereco}<br>";

        echo "Prazo: {$this->prazo}<br>";

        echo "Status: {$this->status}<br><br>";
    }
}