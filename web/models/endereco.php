<?php
namespace Model;

  class Endereco{
    private $pdo;
     
    function __construct($pdo){
        $this->pdo = $pdo;
    }

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
    function trocarPrincipal(){
      //:TODO
    }
    function deletar(){
      //:Todo
    }
  }

?>