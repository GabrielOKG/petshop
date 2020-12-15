<?php

    class Servico{

      public $id;
      public $titulo;
      public $foto;
      public $descricao;
      public $preco;
    
          
    function __construct($id,$titulo,$foto,$descricao,$preco){
        $this->id = $id;
        $this->titulo= $titulo;
        $this->foto = $foto;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }


}

?>