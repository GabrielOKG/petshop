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
    function exibir($id_produto){
      try{
        $sql = "SELECT * FROM produto WHERE id=:id_produto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_produto',$id_produto);
        $stmt->execute(); 
        if($stmt->rowCount() == 0){
          return false;
        }
        $arr = $stmt->fetch();
        $descricao = str_replace(';',"<br>",$arr['descricao']);
        $a = array(
          'id' => $arr['id'],
          'titulo' => $arr['titulo'],
          'descricao' => $descricao,
          'preco' => $arr['preco'],
          'foto' => $arr['foto'],
          'detalhes' => $arr['detalhes'],
          'marca' => $arr['marca'],
          'indicacao' => $arr['indicacao'],
          'categoria' => $arr['categoria'],
          'idade' => $arr['idade'],
          'sabor' => $arr['sabor'],
          'tipo' => $arr['tipo'],
        );
        return $a;
        }catch(PDOException $e){
          print $e->getMessage();
        }
    }

}

?>