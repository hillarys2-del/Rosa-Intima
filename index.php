<?php

    require_once "Cliente.php";
    require_once "Produto.php";
    require_once "Pedido.php";
    require_once "Pagamento.php";
    require_once "Entrega.php";

        $cliente = new Cliente(
            "Amanda",
            "amanda@email.com",
            "41999999999",
            "123456"
        );

        $produto1 = new Produto(
            "Lingerie Vermelha",
            89.90,
            "Conjunto sensual premium",
            "Lingeries",
            20
        );

        $produto2 = new Produto(
            "Kit Sensual",
            129.90,
            "Itens especiais para casais",
            "Acessórios",
            10
        );

        $pagamento = new Pagamento(
            "Cartão de Crédito",
            "Aguardando"
        );

        $pagamento->confirmarPagamento();

        $entrega = new Entrega(
            "Rua das Rosas, 120",
            "3 dias úteis",
            "Preparando envio"
        );

        $pedido = new Pedido(
            date("d/m/Y"),
            "Pedido confirmado",
            $cliente,
            $pagamento,
            $entrega
        );

        $pedido->adicionarProduto($produto1);

        $pedido->adicionarProduto($produto2);

        $cliente->finalizarCompra($pedido);
