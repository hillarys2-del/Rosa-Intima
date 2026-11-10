<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe venda (bean)
    $venda = new Venda();

    // Definir os valores dos atributos a partir do form
    $venda->setData_venda($_POST['data_venda']);
    $venda->setValor_total($_POST['valor_total']);
    $venda->setId($_POST['id']);

    // Instanciar um objeto da classe VendaDAO
    $dao = new VendaDAO();

    // Invocar o método create
    $dao->update($venda);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');