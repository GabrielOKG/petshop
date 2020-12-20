<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/user.php';
include_once '../../../DB/database.ini.php';
require '../../../rotas.php'; 
use Rota\Go;
use Model\User;
if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['sobrenome']) && !empty($_POST['sobrenome'])
&& isset($_POST['nascimento']) && !empty($_POST['nascimento']) && isset($_POST['sexo']) && !empty($_POST['sexo'])
&& isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['telefone']) && !empty($_POST['telefone']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])
){
    $user = new User($pdo);
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    if($user->cadastrarUser($nome,$sobrenome,$nascimento,$sexo,$cpf,$telefone,$email,$senha) == true){
        if($user->loginUser($email,$senha) == true){
            if(isset($_SESSION['id'])){
                header(Go::home('d'));
            }else{
                header(Go::UserController('login/d'));
            }
        }else{
            header(Go::UserController('login/d'));
        }
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Já existe uma conta com essas informações , tente fazer login');window.location.href='". Go::UserController('cadastro/l') ."';</script>";
    }
}else{
//    header(Go::UserController('cadastro/d')); 7
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
}


