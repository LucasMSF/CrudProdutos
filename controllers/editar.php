<?php

session_start();
require_once('../class/CrudProdutoClasse.php');

if(isset($_POST['nome']) and isset($_POST['descricao']) and isset($_POST['valor']))
{
    $Produto = new ProdutoCrud();
    $Produto->nome = $_POST['nome'];
    $Produto->descricao = $_POST['descricao'];
    $Produto->valor = $_POST['valor'];

    $idProduto = $_SESSION['idProduto'];
    unset($_SESSION['idProduto']);

    $msg = '';
    
    if($Produto->editar($idProduto))
    {
        $msg = 'Produto editado com sucesso!';
    }
    else
    {
        $msg = 'Produto não editado!';
    }

    $_SESSION['msg'] = $msg;

}

header('Location: ../listaProdutos.php');