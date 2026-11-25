<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe funcionario (bean)
    $funcionario = new Funcionario();

    //Definir os valores dos atributos apartir do form
    $funcionario->setNome($_POST['nome']);
    $funcionario->setCpf($_POST['cpf']);
    $funcionario->setCargo($_POST['cargo']);
    $funcionario->setTelefone($_POST['telefone']);

    //Instanciar um objeto da clasee funcionarioDAO
    $dao = new FuncionarioDAO();

    //Invocar o método create
    $dao->create($funcionario);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');