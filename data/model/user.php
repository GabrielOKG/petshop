<?php

    class User{

      public $id;
      public $nome;
      public $sobrenome;
      public $nascimento;
      public $sexo;
      public $cpf;
      public $email;
      public $foto;    
        
    function __construct($id,$nome,$sobrenome,$nascimento,$sexo,$cpf,$email,$foto){
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nascimento = $nascimento;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->foto = $foto;
    }
}

?>