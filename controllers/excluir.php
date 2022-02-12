<?php

session_start();
require_once('../class/CrudProdutoClasse.php');

if(isset($_GET['id']))
{
    $Produto = new ProdutoCrud();
    
    $Produto->excluir($_GET['id']);
    
    $msg = "Produto excluído!";
    $_SESSION['msg'] = $msg;

}

header('Location: ../listaProdutos.php');