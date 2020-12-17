<?php
namespace Model;
  class User{
    private $pdo;
     
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    function cadastrarUser($nome,$sobrenome,$nascimento,$sexo,$cpf,$email,$senha){
      // Verifica se o email já foi cadastrado
      $sql = "SELECT email,senha,cpf FROM users WHERE email=:email AND senha=:senha AND cpf=:cpf";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':senha', sha1($senha));
      $stmt->bindValue(':cpf', $cpf);
      $stmt->execute();
      if($stmt->rowCount() != 0){
        return false;
      }else{
        //prepara para inserir os valores
        $sql = "INSERT INTO users(nome, sobrenome, cpf, sexo , nascimento, email, senha) VALUES(:nome,:sobrenome,:cpf,:sexo,:nascimento,:email,:senha)";
        $stmt = $this->pdo->prepare($sql);
        //passando os valores
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':sobrenome', $sobrenome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':sexo', $sexo);
        $stmt->bindValue(':nascimento', $nascimento);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', sha1($senha));
        $stmt->execute();
        return true;
      }
    }

    function loginUser($email, $senha){
      // Verificando usuario , se email e senha estiverem corretos retorna o id,nome e sobrenome
      $sql = "SELECT id,nome,sobrenome,sexo,nascimento,cpf,email FROM users WHERE email=:email AND senha=:senha";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':senha', sha1($senha));
      $stmt->execute();
      
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
}

?>