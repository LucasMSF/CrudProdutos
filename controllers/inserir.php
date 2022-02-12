<?php

session_start();
require_once('../class/CrudProdutoClasse.php');

if(isset($_POST['nome']) and isset($_POST['descricao']) and isset($_POST['valor']))
{
    $Produto = new ProdutoCrud();
    $Produto->nome = $_POST['nome'];
    $Produto->descricao = $_POST['descricao'];
    $Produto->valor = $_POST['valor'];

    $msg = '';

    if($Produto->inserir())
    {
        $msg = 'Produto cadastrado com sucesso!';
        
    }
    else
    {
        $msg = 'Produto não cadastrado!';
    }

    $_SESSION['msg'] = $msg;
}

header('Location: ../inserirProduto.php');