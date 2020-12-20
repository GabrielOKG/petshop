<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/produto.php';
use Model\Produto;
  function mostrar($pdo,$busca){
    $produto = new Produto($pdo);
      return $produto->busca($busca);
    }
  