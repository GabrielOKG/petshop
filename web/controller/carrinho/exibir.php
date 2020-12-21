<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
}
require '../../models/carrinho.php';
use Model\Carrinho;
     function mostrarTodos($pdo){
     $itens = new Carrinho($pdo);
     return $itens->getAll($_SESSION['id']);
 }

 function mostrarPedidos($pdo){
    $pedido = new Carrinho($pdo);
    return $pedido->getPedidos($_SESSION['id']);
}