<?php
    require "../../autoload.php";

    //Instanciar um objeto da classe categoria (bean)
    $categoria = new Categoria();

    //Definir os valores dos atributos a partir dos dados do form
    $categoria->setDescricao($_POST['descricao']);
    $categoria->setId($_POST['id']);

    //Instanciar um objeto da classe categoriaDAO
    $dao = new categoriaDAO();

    //Invocar o método update da classe categoriaDAO
    $dao->update($categoria);

    //Redirecionar para o index
    header('location: index.php');