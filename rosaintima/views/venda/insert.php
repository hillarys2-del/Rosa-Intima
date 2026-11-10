<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe venda (bean)
    $venda = new Venda();

    //Definir os valores dos atributos apartir do form
    $venda->setData_venda($_POST['data_venda']);
    $venda->setValor_total($_POST['valor_total']);
     // Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_categoria']);

    // Definir a categoria no filme
    $venda->setFuncionario($funcionario);
    $venda->setCliente($cliente);

    //Instanciar um objeto da clasee VendaDAO
    $dao = new VendaDAO();

    //Invocar o método create
    $dao->create($venda);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');