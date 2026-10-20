<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe funcionario (bean)
    $funcionario = new Funcionario();

    //Definir os valores dos atributos a partir dos dados do form
    $funcionario->setNome($_POST['nome']);
    $funcionario->setCpf($_POST['cpf']);
    $funcionario->setCargo($_POST['cargo']);
    $funcionario->setTelefone($_POST['telefone']);
    $funcionario->setId($_POST['id']);

    //Instanciar um objeto da classe funcionarioDAO
    $dao = new FuncionarioDAO();

    //Invocar o método update da classe funcionarioDAO
    $dao->update($funcionario);

    //Redirecionar para o index
    header('location: index.php');