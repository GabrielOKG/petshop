<?php
require '../../models/user.php';
include_once '../../../DB/database.ini.php';
use Model\User;
if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['sobrenome']) && !empty($_POST['sobrenome'])
&& isset($_POST['nascimento']) && !empty($_POST['nascimento']) && isset($_POST['sexo']) && !empty($_POST['sexo'])
&& isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])
){
    $user = new User($pdo);
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    if($user->cadastrarUser($nome,$sobrenome,$nascimento,$sexo,$cpf,$email,$senha) == true){
        header('location: ../../view/cadastro/');
    }else{
        header('location: ../../view/cadastro/');
    }
}

header('location: ../../view/cadastro/');
