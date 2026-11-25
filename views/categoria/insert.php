<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe categoria (bean)
    $categoria = new Categoria();

    //Definir os valores dos atributos apartir do form
    $categoria->setDescricao($_POST['nome']);

    // Recupera o ID do produto selecionado
    $produto = new Produto();
    $produto->setId($_POST['id_produto']);

    // Associa o produto à categoria
    $categoria->setProduto($produto);

    //Instanciar um objeto da clasee categoriaDAO
    $dao = new CategoriaDAO();

    //Invocar o método create
    $dao->create($categoria);

    //Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');