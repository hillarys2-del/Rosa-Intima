<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe categoria (bean)
    $categoria = new Categoria();

    //Definir os valores dos atributos apartir do form
    $categoria->setDescricao($_POST['nome']);

    //Instanciar um objeto da clasee categoriaDAO
    $dao = new CategoriaDAO();

    //Invocar o método create
    $dao->create($categoria);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');