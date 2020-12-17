<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
}  
require '../../models/user.php';
include_once '../../../DB/database.ini.php';
require '../../../rotas.php'; 
use Rota\Go;
use Model\User;

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']))
{
    $user = new User($pdo);
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if($user->loginUser($email,$senha) == true){
        if(isset($_SESSION['id'])){
            header(Go::home('d'));
        }else{
            header(Go::login('d'));
        }
    }else{
        header(Go::login('d'));
    }
}else{
    echo 'não entrou';
}

// header('location: ../../view/login/');
?>
 <!-- if(isset($_SESSION['id'])){
            header('location: ../../view/home/');
        }else{
            header('location: ../../view/login/');
        } -->