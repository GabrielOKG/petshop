<?php
namespace Model;
    class MercadoriaModel{
    
    private $pdo;
          
    function __construct($pdo){
        $this->id = $pdo;
    }
}

?>