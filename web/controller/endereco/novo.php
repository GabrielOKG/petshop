<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/endereco.php';
include_once '../../../DB/database.ini.php';
require '../../../rotas.php'; 
use Rota\Go;
use Model\Endereco;
if(isset($_POST['rua']) && !empty($_POST['rua']) && isset($_POST['numero']) && !empty($_POST['numero'])
&& isset($_POST['bairro']) && !empty($_POST['bairro']) && isset($_POST['cep']) && !empty($_POST['cep'])
&& isset($_POST['cidade']) && !empty($_POST['estado'])
){
    if(isset($_POST['complemento']) && !empty($_POST['complemento'])){
        $complemento = $_POST['complemento'];
    }else{
        $complemento = null;
    }

    $endereco = new Endereco($pdo);
    $id_cliente = $_SESSION['id'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


    if($endereco->novo($id_cliente,$rua,$numero,$bairro,$complemento,$cep,$cidade,$estado) == true){
            header(Go::endereco('d'));
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu um erro , tente mais tarde');window.location.href='". Go::endereco('l') ."';</script>";

        echo 'deu ruim';
    }
}else{
   header(Go::home('d')); 
}


