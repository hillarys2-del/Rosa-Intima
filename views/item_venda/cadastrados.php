<?php
    //Incluir o arquivo para carregamento das classes
    require "../../autoload.php";

    //Instanciar um objeto da classe DAO
    $dao = new Item_vendaDAO();
?>

<div class="table-responsive small">
            <table class="table table-hover">
                <tr>
                    <th>Venda</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Ação</th>
                </tr>
                <?php foreach($dao->read($_GET['id']) as $item_venda) : ?>
                    <tr>
                        <td><?= $item_venda->getVenda()->getId() ?></td>
                        <td><?= $item_venda->getProduto()->getNome() ?></td>
                        <td><?= $item_venda->getQuantidade() ?></td>
                        <td><?= $item_venda->getPrecoU() ?></td>
                        <td>
                          <a title="Excluir" class="link-danger" href="destroy.php?idVenda=<?= $item_venda->getVenda()->getId() ?>&idProduto=<?= $item_venda->getProduto()->getId() ?>">
                            <i class="bi bi-trash-fill"></i>
                          </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
          </div>