<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
}
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
}
require '../../models/carrinho.php';
include_once '../../../DB/database.ini.php';
require '../../../rotas.php'; 
use Rota\Go;
use Model\Carrinho;

if(isset($_POST['id_item']) && !empty($_POST['id_item'])){
    $item = new Carrinho($pdo);
    if(isset($_POST['editar']) && isset($_POST['qtd']) && !empty($_POST['qtd'])){
        if($item->mudarQtd($_POST['id_item'],$_POST['qtd'])){
            echo "<script language='javascript' type='text/javascript'>
            alert('Quantidade atualizada');window.location.href='". Go::carrinho('l') ."';</script>";
        }else{
            echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro, tente novamento mais tarde');window.location.href='". Go::carrinho('l') ."';</script>";
        }
    echo "<script language='javascript' type='text/javascript'>
    alert('Digite a nova qtd');window.location.href='". Go::carrinho('l') ."';</script>";
    }
    if(isset($_POST['remover'])){
        if($item->removerItem($_POST['id_item'])){
            echo "<script language='javascript' type='text/javascript'>
            alert('Item removido');window.location.href='". Go::carrinho('l') ."';</script>";
        }else{
            echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro, tente novamento mais tarde');window.location.href='". Go::carrinho('l') ."';</script>";
        }
    }
}else{
    echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro, tente novamento mais tarde');window.location.href='". Go::carrinho('l') ."';</script>";
}
