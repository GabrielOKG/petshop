<?php
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../models/produto.php';
use Model\Produto;
  function mostrar($pdo,$busca,$lim,$offset){
    $produto = new Produto($pdo);
    if(empty($busca)){
     return $produto->getAll($lim,$offset);
    }else{
      return $produto->busca($busca,$lim,$offset);
    }
  }

    function countPage($pdo){
      $produto = new Produto($pdo);
       return $produto->count();
 }