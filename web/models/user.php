<?php
namespace Model;
  class User{
    private $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
}
    function cadastrarUser($nome,$sobrenome,$nascimento,$sexo,$cpf,$telefone,$email,$senha){
      // Verifica se o email já foi cadastrado
      $sql = "SELECT email,senha,cpf FROM cliente WHERE email=:email AND senha=:senha OR cpf=:cpf";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':senha', sha1($senha));
      $stmt->bindValue(':cpf', $cpf);
      $stmt->execute();
      if($stmt->rowCount() != 0){
        return false;
      }else{
        //prepara para inserir os valores
        $sql = "INSERT INTO cliente(nome, sobrenome, cpf, sexo , nascimento, email, senha,telefone) VALUES(:nome,:sobrenome,:cpf,:sexo,:nascimento,:email,:senha,:telefone)";
        $stmt = $this->pdo->prepare($sql);
        //passando os valores
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':sexo', $sexo);
        $stmt->bindValue(':nascimento', $nascimento);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', sha1($senha));
        $stmt->bindValue(':telefone', $telefone);
        $stmt->execute();
        return true;
      }
    }

    function loginUser($email, $senha){
      // Verificando usuario , se email e senha estiverem corretos retorna os dados
      $sql = "SELECT id,nome,sobrenome,sexo,nascimento,cpf,email FROM cliente WHERE email=:email AND senha=:senha";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':senha', sha1($senha));
      $stmt->execute();
      //Armazenando os dados em Session
      if($stmt->rowCount() != 0){
        $dado = $stmt->fetch();
        $_SESSION['id'] = $dado['id'];
        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['sobrenome'] = $dado['sobrenome'];
        $_SESSION['sexo'] = $dado['sexo'];
        $_SESSION['nascimento'] = $dado['nascimento'];
        $_SESSION['cpf'] = $dado['cpf'];
        $_SESSION['email'] = $dado['email'];
        return true;
      }else{
        return false;
      }
    }
    function atualizarCadastro(){
      //:TODO
    }
    static function formatar(){
      //formatando data de nascimento
      $data = date('d/m/Y', strtotime($_SESSION['nascimento']));
      if($_SESSION['sexo'] === 'm' || $_SESSION['sexo'] === 'M'){
        $sexo = 'Masculino';
      }else{
        $sexo = 'Feminino';
      }
      $uz = array(
        'id' => $_SESSION['id'],
        'nome' => $_SESSION['nome'], 
        'sobrenome' => $_SESSION['sobrenome'],
        'nascimento' => $data,
        'sexo' => $sexo,
        'cpf' => $_SESSION['cpf'],
        'email' => $_SESSION['email'],
      );

      return $uz;
      
    }
}

?>