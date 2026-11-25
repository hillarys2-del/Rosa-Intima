<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe item_venda (bean)
    $item_venda = new Item_venda();

    //Definir os valores dos atributos apartir do form
    $item_venda->setQuantidade($_POST['quantidade']);
    $item_venda->setPrecoU($_POST['precoU']);
     // Instanciar um objeto da Categoria

    $venda = new Venda();
    $venda->setId($_POST['id_venda']);

    $produto = new Produto();
    $produto->setId($_POST['id_produto']);

    // Definir a categoria no filme
    $item_venda->setVenda($venda);
    $item_venda->setProduto($produto);

    //Instanciar um objeto da clasee item_vendaDAO
    $dao = new Item_vendaDAO();

    //Invocar o método create
    $dao->create($item_venda);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php?id=' . $_POST['id_venda']);