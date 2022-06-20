<?php 
session_start();
require_once('class/CrudProdutoClasse.php');
$_SESSION['idProduto'] = $_GET['id'];
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS do materialize Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Editar produto</title>
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body style="height: 100vh; color: white;" class="valign-wrapper grey darken-4">
    <div class="container grey darken-4">
        <h2 style="text-align: center;">Editar Produto</h2>
        <div class="formContainer">
            <form class="form" action="controllers/editar.php" method="post">
            <div class="input-field">
                    <input id="id" type="text" class="validate" name="idProduto" value=<?php echo $_GET['id']?> disabled>
                    <label for="id">ID do produto</label>
                </div>
                <?php
                    $Produto = new ProdutoCrud();
                    $produto = $Produto->selecionar($_GET['id']);
                    if(!$produto) header('Location: listaProdutos.php')
                ?>
                <div class="input-field">
                    <input id="nome" type="text" class="validate" name="nome" value="<?php echo $produto['nome']?>">
                    <label for="nome">Nome do produto</label>
                </div>
                <div class="input-field">
                    <input id="descricao" type="text" class="validate" name="descricao" value="<?php echo $produto['descricao']?>">
                    <label for="descricao">Descrição</label>
                </div>
                <div class="input-field">
                    <input id="valor" type="number" step='0.01' class="validate" name="valor" value=<?php echo $produto['valor']?>>
                    <label for="valor">Valor</label>
                </div>
                <button class="btn blue">Editar</button>
                <br>
                <a href="listaProdutos.php" class="btn red darken-3">Cancelar edição</a>
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