<?php
session_start();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Lista de Produtos</title>
</head>

<body style="height: 100vh; color: white;" class="valign-wrapper grey darken-4">
    <div class="container grey darken-4">
        <h2 style="text-align: center;">Lista de Produtos</h2>
        <table class="striped centered blue">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require_once('class/CrudProdutoClasse.php');

                $Produto = new ProdutoCrud();
                $produtos = $Produto->selecionar();

                foreach ($produtos as $produto) {
                    echo ("<tr>
                            <td>" . $produto['nome'] . "</td>
                            <td>" . $produto['descricao'] . "</td>
                            <td>R$ " . $produto['valor'] . "</td>
                            <td><a href=\"controllers/excluir.php?id=" . $produto['id']  . "\"style=\"margin: 3px 0 3px 0;\" class=\"btn red\">Excluir</a> <a href=\"editarProduto.php?id=" . $produto['id']  . "\"style=\"margin: 3px 0 3px 0;\" class=\"btn yellow\">Editar</a></td>
                            </tr>"
                    );
                }
                ?>
            </tbody>
        </table>
            <?php 
            if (isset($_SESSION['msg']))
            {
                echo "<br><div style=\"width: 100%; background: rgb(161, 157, 157); text-align: center; padding: 6px\" id=\"msg\">" . $_SESSION['msg'] . "</div>";
                unset($_SESSION['msg']);
            } 
            ?>
        <br>
        <a href="inserirProduto.php" class="btn teal accent-3">cadastrar novo produto</a>
        <?php require('creditos.html'); ?>
    </div>

    <!-- Script do materialize Css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>