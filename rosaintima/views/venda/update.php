<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe venda (bean)
    $venda = new Venda();

    // Definir os valores dos atributos a partir do form
    $venda->setData_venda($_POST['data_venda']);
    $venda->setValor_total($_POST['valor_total']);
    $venda->setForma_pagamento($_POST['forma_pagamento']);

    $cliente = new Cliente();
    $cliente->setId($_POST['id_cliente']);

    $funcionario = new Funcionario();
    $funcionario->setId($_POST['id_funcionario']);

    // Definir a categoria no filme
    $venda->setFuncionario($funcionario);
    $venda->setCliente($cliente);

    $venda->setId($_POST['id']);

    // Instanciar um objeto da classe VendaDAO
    $dao = new VendaDAO();

    // Invocar o método create
    $dao->update($venda);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    //header('Location: index.php');