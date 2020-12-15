<?php

    class Mercadoria{

      public $id;
      public $titulo;
      public $descricao;
      public $preco;
      public $desconto;  
      public $foto; 
      public $quantidade;
     
          
    function __construct($id,$titulo,$descricao,$preco,$desconto,$foto,$quantidade){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->desconto = $desconto;
        $this->foto = $quantidade;
        $this->quantidade = $quantidade;
    
    }
}

?>