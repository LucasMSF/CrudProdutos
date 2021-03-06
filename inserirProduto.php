<?php session_start(); ?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Cadastrar produto</title>
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body style="height: 100vh; color: white;" class="valign-wrapper grey darken-4">
    <div class="container grey darken-4">
        <h2 style="text-align: center;">Cadastrar Novo Produto</h2>
        <div class="formContainer">
            <form class="form" action="controllers/inserir.php" method="post">
                <div class="input-field">
                    <input id="nome" type="text" class="validate" name="nome">
                    <label for="nome">Nome do produto</label>
                </div>
                <div class="input-field">
                    <input id="descricao" type="text" class="validate" name="descricao">
                    <label for="descricao">Descrição</label>
                </div>
                <div class="input-field">
                    <input id="valor" type="number" step='0.01' class="validate" name="valor">
                    <label for="valor">Valor</label>
                </div>
                <button class="btn blue">Cadastrar</button>
                <br>
                <a href="listaProdutos.php" class="btn teal accent-3">Lista de produtos</a>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo "<br><div style=\"width: 100%; background: rgb(161, 157, 157); text-align: center; padding: 6px\" id=\"msg\">" . $_SESSION['msg'] . "</div>";
                    unset($_SESSION['msg']);
                }
                ?>
            </form>
        </div>
        <?php require('creditos.html'); ?>
        <!-- <br>
        <button class="btn teal accent-3">cadastrar novo produto</button> -->
    </div>

    <!-- Script do materialize Css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>