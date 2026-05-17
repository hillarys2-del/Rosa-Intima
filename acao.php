<?php

    require_once "Produto.php";
    require_once "Categoria.php";
    require_once "Carrinho.php";
    require_once "Pedido.php";
    require_once "Cliente.php";

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $produtoNome = $_POST['produto'];

        $quantidade = $_POST['quantidade'];

            if($produtoNome == "Vela Aromática") {

                $produto = new Produto(
                    "Vela Aromática",
                    39.90,
                    "Aroma relaxante e sofisticado"
                );

            } else if($produtoNome == "Lingerie Vermelha") {

                $produto = new Produto(
                    "Lingerie Vermelha",
                    79.90,
                    "Conjunto elegante e confortável"
                );

            } else {

                $produto = new Produto(
                    "Kit Sensual",
                    129.90,
                    "Itens selecionados para casais"
                );
            }

        $categoria = new Categoria(
            "Produtos Sensuais",
            "Linha Premium"
        );

        $carrinho = new Carrinho(
            $produto,
            $categoria,
            $quantidade
        );

        $pedido = new Pedido(
            rand(1000,9999),
            "Pagamento aprovado",
            $carrinho
        );

        $cliente = new Cliente(
            $nome,
            $email
        );

        $produto->exibirProduto();

        $categoria->exibirCategoria();

        $cliente->comprar($pedido);