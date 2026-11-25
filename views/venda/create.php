<?php
    require "../../autoload.php";
?>

<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Cadastro de vendas">
    <meta name="theme-color" content="#712cf9">

    <title>Cadastrar Venda</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">

    <script src="../../js/color-modes.js"></script>
</head>

<body>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow"
            data-bs-theme="dark">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
           href="#">
            Nome da Empresa
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button
                    class="nav-link px-3 text-white"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch"
                    aria-controls="navbarSearch"
                    aria-expanded="false"
                    aria-label="Abrir pesquisa">
                    Pesquisar
                </button>
            </li>

            <li class="nav-item text-nowrap">
                <button
                    class="nav-link px-3 text-white"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-label="Abrir menu">
                    Menu
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input
                class="form-control w-100 rounded-0 border-0"
                type="search"
                placeholder="Pesquisar"
                aria-label="Pesquisar">
        </div>

    </header>

    <div class="container-fluid">
        <div class="row">

            <!-- Menu lateral -->
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <div
                    class="offcanvas-md offcanvas-end bg-body-tertiary"
                    tabindex="-1"
                    id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">
                            Nome da Empresa
                        </h5>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu"
                            aria-label="Fechar">
                        </button>
                    </div>

                    <?php include "../menu/navbar.php"; ?>

                </div>
            </div>

            <!-- Conteúdo principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between
                            flex-wrap flex-md-nowrap align-items-center
                            pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2">Cadastrar Venda</h1>

                </div>

                <div class="table-responsive small">
                    <form action="insert.php" method="post">
                        <div class="form-group">
                            <label for="data_venda">Data da venda</label>
                            <input type="date" name="data_venda" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="valor_total">Valor total da venda</label>
                            <input type="number" name="valor_total" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="forma_pagamento">Forma de pagamento</label>
                            <select name="forma_pagamento"
                                    id="forma_pagamento"
                                    class="form-control"
                                    required>
                                <option value="">Selecione</option>
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Pix">Pix</option>
                                <option value="Cartão">Cartão</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_funcionario">Nome do Funcionário</label>
                            <select name="id_funcionario"
                                    id="id_funcionario"
                                    class="form-control"
                                    required>
                                <option value="">Selecione o funcionário</option>

                                <?php
                                    $funcionarioDAO = new FuncionarioDAO();
                                    $funcionarios = $funcionarioDAO->read();

                                    foreach ($funcionarios as $funcionario) {
                                ?>
                                    <option value="<?= $funcionario->getId(); ?>">
                                        <?= $funcionario->getNome(); ?>
                                    </option>
                                <?php } ?>
                            </select>    
                        </div>

                        <div class="form-group">
                            <label for="id_cliente">Nome do Cliente</label>
                            <select name="id_cliente"
                                    id="id_cliente"
                                    class="form-control"
                                    required>

                                    <option value="">Selecione o cliente</option>

                                <?php
                                    $clienteDAO = new ClienteDAO();
                                    $clientes = $clienteDAO->read();

                                    foreach ($clientes as $cliente) {
                                ?>
                                    <option value="<?= $cliente->getId(); ?>">
                                        <?= $cliente->getNome(); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="reset" value="Limpar" class="btn">
                            <input type="submit" value="Salvar" class="btn btn-success">
                        </div>

                    </form>
                </div>

            </main>

        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/dashboard.js"></script>

</body>
</html>
