<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/produto.php';
use Model\Produto;
  function mostrar($pdo,$busca){
    $lim = 1;
    $offset = 0;
    $produto = new Produto($pdo);
    if(empty($busca)){
     return $produto->getAll(3,0);
    }else{
      return $produto->busca($busca,3,0);
    }
 }