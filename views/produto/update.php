<?php
    // Incluir o arquivo de autoload
    require "../../autoload.php";

    // Instanciar um objeto da classe produto (bean)
    $produto = new Produto();

    // Definir os valores dos atributos a partir do form
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setEstoque($_POST['estoque']);
    $produto->setId($_POST['id']);

    // Instanciar um objeto da Categoria
    $categoria = new Categoria();
    $categoria->setId($_POST['id_categoria']);

    // Definir a categoria no filme
    $produto->setCategoria($categoria);

    // Instanciar um objeto da classe produtoDAO
    $dao = new ProdutoDAO();

    // Invocar o método create
    $dao->update($produto);

    // Redirecionar para o index (COMENTAR CASO NÃO FUNCIONE)
    header('Location: index.php');