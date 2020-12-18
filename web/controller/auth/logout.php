<?php
 if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
  session_start();
} 

require '../../../rotas.php'; 
use Rota\Go;

if(isset($_SESSION['id'])){
    session_unset();  
    session_destroy();
    header(Go::home('d'));
  }

  header(Go::home('d'));