<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../../rotas.php'; 
use Rota\Go;
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
}
require '../../models/carrinho.php';
include_once '../../../DB/database.ini.php';

use Model\Carrinho;
if(isset($_POST['id_produto']) && !empty($_POST['id_produto'])){

    $item = new Carrinho($pdo);
    $id_cliente = $_SESSION['id'];
    $id_produto = $_POST['id_produto'];
    if($item->adicionar($id_cliente,$id_produto) == true){
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto adicionado ao carrinho');window.location.href='". Go::home('l') ."';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::carrinho('l') ."';</script>";
    }
}else{
    echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::home('l') ."';</script>"; 
}


