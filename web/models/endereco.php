<?php
namespace Model;

class Endereco{
    private $pdo;
     
    function __construct($pdo){
        $this->pdo = $pdo;
    }
//busca o endereço do cliete e passa para um array
function getAll($id_cliente){
      $sql = "SELECT rua,numero,bairro,complemento,cep,cidade,estado FROM endereco WHERE id_cliente=:id_cliente";
      $stmt = $this->pdo->prepare($sql);
      $stmt->BindValue(':id_cliente',$id_cliente);
      $stmt->execute();
      $dado = $stmt->fetch();
      if($stmt->rowCount() == 0){
        return false;
      }
      $arr = array(
        'rua' => $dado['rua'], 
        'numero' => $dado['numero'],
        'bairro' => $dado['bairro'] ,
        'complemento' => $dado['complemento'], 
        'cep' => $dado['cep'] ,
        'cidade' => $dado['cidade'] ,
        'estado' => $dado['estado']);
      return $arr;
    } 
//cadastra um endereço
  function novo($id_cliente,$rua,$numero,$bairro,$complemento,$cep,$cidade,$estado){ 
    try{        
        $sql = "INSERT INTO endereco(id_cliente,rua,numero,bairro,complemento,cep,cidade,estado)VALUES(:id_cliente,:rua,:numero,:bairro,:complemento,:cep,:cidade,:estado)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_cliente',$id_cliente);
        $stmt->BindValue(':rua',$rua);
        $stmt->BindValue(':numero',$numero);
        $stmt->BindValue(':bairro',$bairro);
        $stmt->BindValue(':complemento',$complemento);
        $stmt->BindValue(':cep',$cep);
        $stmt->BindValue(':cidade',$cidade);
        $stmt->BindValue(':estado',$estado);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
      print $e->getMessage();
    }
  }
  function atualiza($id_cliente,$rua,$numero,$bairro,$complemento,$cep,$cidade,$estado){ 
    try{        
        $sql = "UPDATE endereco SET rua=:rua,numero=:numero,bairro=:bairro,complemento=:complemento,cep=:cep,cidade=:cidade,estado=:estado WHERE id_cliente=:id_cliente";
        $stmt = $this->pdo->prepare($sql);
        $stmt->BindValue(':id_cliente',$id_cliente);
        $stmt->BindValue(':rua',$rua);
        $stmt->BindValue(':numero',$numero);
        $stmt->BindValue(':bairro',$bairro);
        $stmt->BindValue(':complemento',$complemento);
        $stmt->BindValue(':cep',$cep);
        $stmt->BindValue(':cidade',$cidade);
        $stmt->BindValue(':estado',$estado);
        $stmt->execute();
        return true;
    }catch(PDOException $e){
      print $e->getMessage();
    }
  }
  }
?>