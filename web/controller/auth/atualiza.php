<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/user.php';
include_once '../../../DB/database.ini.php';
require '../../../rotas.php'; 
use Rota\Go;
use Model\User;

$atualizacao = new User($pdo);  
    
    $v = 0;

    if(isset($_POST['email']) && !empty($_POST['email'])){     
        $email = $_POST['email'];
        if($atualizacao->atualizaEmail($_SESSION['id'],$email) == true){
            $v++;
        }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::conta('l') ."';</script>";
    }  
    }
    if(isset($_POST['senha']) && !empty($_POST['senha'])){     
        $senha = $_POST['senha'];
        if($atualizacao->atualizaSenha($_SESSION['id'],$senha) == true){
            $v++;
        }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::conta('l') ."';</script>";
    }  
    }
    if(isset($_POST['telefone']) && !empty($_POST['telefone'])){     
        $telefone = $_POST['telefone'];
        if($atualizacao->atualizaTelefone($_SESSION['id'],$telefone) == true){
            $v++;
        }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::conta('l') ."';</script>";
    }  
    }
    
    if($v != 0){
        echo "<script language='javascript' type='text/javascript'>
            ;window.location.href='logout.php';</script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
            ;window.location.href='" . Go::conta('l') . "';</script>";
    }