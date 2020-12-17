<?php
namespace Model;
    class Horario{
    
    private $pdo;
          
    function __construct($pdo){
        $this->id = $pdo;
    }
    function marcar(){
      //:TODO
    }
    function desmarcar(){
      //:TODO
    }
    function getHorarios(){
      //:TODO
    }
}

?>