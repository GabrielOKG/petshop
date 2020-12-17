<?php 
    if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
        session_start();
        session_unset();  
        session_destroy();
      }     
?>