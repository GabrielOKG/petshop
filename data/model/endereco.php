<?php

    class Endereco{

      public $id_enderenco;
      public $id_user;
      public $rua;
      public $bairro;
      public $numero;  
      public $complemento; 
      public $cidade;
      public $estado;
          
    function __construct($id_enderenco,$id_user,$rua,$bairro,$numero,$complemento,$cidade,$estado){
        $this->id_endereco = $id_enderenco;
        $this->id_user = $id_user;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
}

?>