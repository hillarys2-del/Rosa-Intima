<?php

    require_once "Produto.php";
    require_once "Pedido.php";
    require_once "Cliente.php";
    require_once "Pagamento.php";
    require_once "Entrega.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosa Íntima</title>

</head>
<body>

<div class="container">

<?php

    if($_SERVER["REQUEST_METHOD"] != "POST") {

?>

    <h1>🌹 Rosa Íntima</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Produto:</label>

        <select name="produto">

            <option value="Vela Aromática">
                Vela Aromática - R$ 39,90
            </option>

            <option value="Lingerie Vermelha">
                Lingerie Vermelha - R$ 79,90
            </option>

            <option value="Kit Sensual">
                Kit Sensual - R$ 129,90
            </option>

        </select>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1" value="1" required>

        <button type="submit">
            Finalizar Pedido
        </button>

    </form>

<?php

    } else {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $produtoNome = $_POST['produto'];
        $quantidade = $_POST['quantidade'];

        if($produtoNome == "Vela Aromática") {

            $produto = new Produto(
                "Vela Aromática",
                39.90,
                "Aroma relaxante e sofisticado",
                "Acessórios",
                15
            );

        } else if($produtoNome == "Lingerie Vermelha") {

            $produto = new Produto(
                "Lingerie Vermelha",
                79.90,
                "Conjunto elegante e confortável",
                "Lingeries",
                10
            );

        } else {

            $produto = new Produto(
                "Kit Sensual",
                129.90,
                "Itens selecionados para casais",
                "Kits",
                5
            );
        }

        $cliente = new Cliente(
            $nome,
            $email,
            "41999999999",
            "123456"
        );

        $pagamento = new Pagamento(
            "Pix",
            "Aguardando"
        );

        $pagamento->confirmarPagamento();

        $entrega = new Entrega(
            "Rua das Rosas, 120",
            "3 dias úteis",
            "Preparando envio"
        );

        $pedido = new Pedido(
            date("d/m/Y"),
            "Pedido confirmado",
            $cliente,
            $pagamento,
            $entrega
        );

        for($i = 0; $i < $quantidade; $i++) {

            $pedido->adicionarProduto($produto);

        }

        echo "<h1>Pedido Realizado com Sucesso</h1>";

        $pedido->gerarPedido();
    }

?>

</div>

</body>
</html>
