<?php
namespace Model;
    class Produto{
    
    private $pdo;
          
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function busca($termo){
      $termo = trim($termo);
      $termo = strtolower($termo);
      try{
        $sql = "SELECT id,titulo,preco,foto FROM produto WHERE titulo LIKE :termo OR categoria LIKE :termo OR indicacao LIKE :termo ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':termo','%'.$termo.'%');
        $stmt->execute(); 
        $count = $stmt->rowCount();
        $arr = array('count' => $count);
        while($dado = $stmt->fetch(\PDO::FETCH_ASSOC)){
          $a = array(
            'id' => $dado['id'],
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