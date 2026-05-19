<?php

require_once "Cliente.php";
require_once "Produto.php";
require_once "Pedido.php";
require_once "Pagamento.php";
require_once "Entrega.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];

    echo "<h2>Pedido realizado com sucesso!</h2>";
    echo "<p>Cliente: $nome</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Produto: $produto</p>";
    echo "<p>Quantidade: $quantidade</p>";
}

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

    <h1>🌹 Rosa Íntima</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Email:</label>
        <input type="email" name="email" required>

        <br><br>

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

        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1" value="1" required>

        <br><br>

        <button type="submit">
            Finalizar Pedido
        </button>

    </form>

</div>

</body>
</html>
