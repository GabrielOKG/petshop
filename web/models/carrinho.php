<?php
namespace Model;
    class Carrinho{
    
    private $pdo;
          
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function adicionar($id_cliente,$id_produto,$qtd){
    //verificando se o cliente possui um carrinho ativo
        $sql = "SELECT id FROM carrinho WHERE id_cliente=:id_cliente AND status=1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_cliente',$id_cliente);
        $stmt->execute(); 
        $dado = $stmt->fetch();
        $cr = $dado['id'];
        if($stmt->rowCount() == 0){
          $pdo->beginTransaction(); // inicia uma transação
    //Criando um carrinho ativo para o cliente
          $sql = "INSERT INTO carrinho(id_cliente,status) VALUES(:id_cliente,1) RETURNING id ";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_cliente',$id_cliente);
          $carrinho->execute();
          $dado = $carrinho->fetch();
          $cr = $dado['id'];
          //adicionando item ao carrinho
          $sql = "INSERT INTO item(id_carrinho,id_produto,qtd) VALUES(id_carrinho,:id_produto,:qtd)";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_carrinho',$cr);
          $carrinho->BindValue(':id_produto',$id_produto);
          $carrinho->BindValue(':qtd',$qtd);
          if(!$carrinho->execute()){
            $pdo->rollBack();
            die('erro ao adicionar item'); //desfaz a inserção na tabela carrinho
          }
          $pdo->commit();
          return true;
        }else{
         //adicionando item ao carrinho
          $sql = "INSERT INTO item(id_carrinho,id_produto,qtd) VALUES(:id_carrinho,:id_produto,:qtd)";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_carrinho',$cr);
          $carrinho->BindValue(':id_produto',$id_produto);
          $carrinho->BindValue(':qtd',$qtd);
          if(!$carrinho->execute()){
            return false; 
          }
          return true;
        }
    }
    function mudarQtd($id_produto,$qtd){
      $sql = "UPDATE item SET qtd=:qtd WHERE id=:id_produto";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':qtd',$qtd);
      $stmt->BindValue(':id_produto',$id_produto);
      if(!$stmt->execute()){
        return false; 
      }
      return true;
    }
    function removerItem($id_produto){
      $sql = "DELETE FROM item WHERE id=:id_produto ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_produto',$id_produto);
      if(!$stmt->execute()){
        return false; 
      }
      return true;
    }
    function getAll($id_cliente){
    try{$sql = "SELECT I.id,I.qtd,P.titulo,P.preco FROM (
        (produto as P JOIN item as I ON I.id_produto = P.id) 
        JOIN carrinho as C ON I.id_carrinho = C.id ) WHERE C.id_cliente = :id_cliente";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_cliente',$id_cliente);
      $stmt->execute(); 
      $count = $stmt->rowCount();
      $arr = array('count' => $count);
      while($dado = $stmt->fetch(\PDO::FETCH_ASSOC)){
          $a = array(
            'id' => $dado['id'],
            'titulo' => $dado['titulo'],
            'preco' => $dado['preco'],
            'qtd' => $dado['qtd'],
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