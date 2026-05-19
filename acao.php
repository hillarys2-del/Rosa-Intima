<?php

    require_once "Produto.php";
    require_once "Pedido.php";
    require_once "Cliente.php";
    require_once "Pagamento.php";
    require_once "Entrega.php";
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $produtoNome = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    if($produtoNome == "Vela Aromática") {
        $produto = new Produto(
            "Vela Aromática",
            39.90,
            "Aroma relaxante e sofisticado",
            "Acessórios",
            15
        );
    
    } else if($produtoNome == "Lingerie Vermelha") {
    
        $produto = new Produto(
            "Lingerie Vermelha",
            79.90,
            "Conjunto elegante e confortável",
            "Lingeries",
            10
        );
    
    } else {
    
        $produto = new Produto(
            "Kit Sensual",
            129.90,
            "Itens selecionados para casais",
            "Kits",
            5
        );
    }
    
    $cliente = new Cliente(
        $nome,
        $email,
        "41999999999",
        "123456"
    );
    
    $pagamento = new Pagamento(
        "Pix",
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
    
    for($i = 0; $i < $quantidade; $i++) {
        $pedido->adicionarProduto($produto);
    }
    
    $cliente->finalizarCompra($pedido);

?>
