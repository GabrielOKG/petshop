<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/endereco.php';
use Model\Endereco;
 function mostrarTodos($pdo){
     $ende = new Endereco($pdo);
     return $ende->getAll($_SESSION['id']);
 }