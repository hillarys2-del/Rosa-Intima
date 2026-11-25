<?php
    require "../../autoload.php";

    // Coletar o valor do id pela URL
    $idVenda = $_GET['idVenda'];
    $idProduto = $_GET['idProduto'];

    // Instanciar um objeto da classe ClienteDAO
    $dao = new Item_vendaDAO();

    // Invocar o método para excluir
    $dao->destroy($idVenda, $idProduto);

    // Redirecionar para o index
   header('Location: index.php?id=' . $_GET['idVenda']);