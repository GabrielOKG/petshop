<?php

    class Horario{

      public $id;
      public $id_user;
      public $id_servico;
      public $data;
      public $hora;  
          
    function __construct($id,$id_user,$id_servico,$data,$hora){
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_servico = $ide_servico;
        $this->data = $data;
        $this->hora = $hora; 
    }
}

?>