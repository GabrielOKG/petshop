<?php
namespace Model;
    class Carrinho{
    
    private $pdo;
          
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function adicionar($id_cliente,$id_produto){
    //verificando se o cliente possui um carrinho ativo
        $sql = "SELECT id FROM carrinho WHERE id_cliente=:id_cliente AND status=1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_cliente',$id_cliente);
        $stmt->execute(); 
        $dado = $stmt->fetch();
        if($stmt->rowCount() == 0){
          $this->pdo->beginTransaction(); // inicia uma transação
          //Criando um carrinho ativo para o cliente
          $sql = "INSERT INTO carrinho(id_cliente,status) VALUES(:id_cliente,1) RETURNING id ";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_cliente',$id_cliente);
          $carrinho->execute();
          $dado = $carrinho->fetch();
         
          //adicionando item ao carrinho
          $sql = "INSERT INTO item(id_carrinho,id_produto,qtd) VALUES(:id_carrinho,:id_produto,1)";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_carrinho', $dado['id']);
          $carrinho->BindValue(':id_produto',$id_produto);
          if(!$carrinho->execute()){
            $this->pdo->rollBack(); //desfaz a inserção na tabela carrinho
            die('erro ao adicionar item'); 
          }
          $this->pdo->commit();
          return true;
        }else{
          $cr = $dado['id'];
         //adicionando item ao carrinho
          $sql = "INSERT INTO item(id_carrinho,id_produto,qtd) VALUES(:id_carrinho,:id_produto,1)";
          $carrinho = $this->pdo->prepare($sql);
          $carrinho->BindValue(':id_carrinho',$cr);
          $carrinho->BindValue(':id_produto',$id_produto);
        
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
    try{
      $sql = "SELECT I.id,I.qtd,I.id_carrinho,P.titulo,P.preco,P.foto FROM (
        (produto as P JOIN item as I ON I.id_produto = P.id) 
        JOIN carrinho as C ON I.id_carrinho = C.id ) WHERE C.id_cliente = :id_cliente AND C.status = 1";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_cliente',$id_cliente);
      $stmt->execute(); 
      $count = $stmt->rowCount();
      $arr = array('count' => $count);
      while($dado = $stmt->fetch(\PDO::FETCH_ASSOC)){
          $a = array(
            'id' => $dado['id'],
            'id_carrinho' => $dado['id_carrinho'],
            'titulo' => $dado['titulo'],
            'preco' => $dado['preco'],
            'qtd' => $dado['qtd'],
            'foto' => $dado['foto'],
           
          );
          array_push($arr,$a);
        }
        return $arr;
      }catch(PDOException $e){
        print $e->getMessage();
      }
    }

    function fecharPedido($id_carrinho,$total){
      $sql ="UPDATE carrinho SET status=2,total=:total,quando= current_timestamp WHERE id=:id_carrinho";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_carrinho',$id_carrinho);
      $stmt->BindValue(':total',$total);
      if(!$stmt->execute()){
        return false; 
      }
      return true;
    }

    function cancelarPedido($id_carrinho){
      $sql = "UPDATE carrinho SET status=0 WHERE id=:id_carrinho";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_carrinho',$id_carrinho);
      if(!$stmt->execute()){
        return false; 
      }
      return true;
    }

    function getPedidos($id_cliente){
        $sql = "SELECT * FROM carrinho WHERE id_cliente=:id_cliente AND NOT status=1 order by id desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_cliente',$id_cliente);
        if($stmt->execute()){
        $arr = array();
        while($dado = $stmt->fetch(\PDO::FETCH_ASSOC)){
          date_default_timezone_set('America/Araguaina');
          $quando = date('d/m/Y h:i:s A',strtotime($dado['quando']));
          $a = array(
            'id' => $dado['id'],
            'status' => $dado['status'],
            'quando' => $quando,
            'total' => $dado['total'],
          );
          array_push($arr,$a);
        }
        return $arr;
      }
      return false;
    }
}

?>