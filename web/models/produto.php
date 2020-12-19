<?php
namespace Model;
    class Produto{
    
    private $pdo;
          
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function busca(){
      //:TODO
    }
    function count(){
      // Buscando o numero total de produtos 
      $sql = "SELECT id FROM produto";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
    }

    function getAll($lim,$offset){
      try{
      $sql = "SELECT titulo,preco,foto FROM produto LIMIT :lim OFFSET :offset";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':lim',(int) $lim);
      $stmt->BindValue(':offset',(int) $offset);
      $stmt->execute(); 
      $arr = array();
      while($dado = $stmt->fetch(\PDO::FETCH_ASSOC)){
        $a = array(
          'titulo' => $dado['titulo'],
          'preco' => $dado['preco'],
          'foto' => $dado['foto'],
        );
        array_push($arr,$a);
      }
      return $arr;
      }catch(PDOException $e){
        print $e->getMessage();
      }

    }
}

?>