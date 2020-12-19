<?php 
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  
} 
require '../../../rotas.php'; 
use Rota\Go;
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualiza endereço</title>
</head>
<body>
    <form action='<?php echo Go::ContaController('endereco/atualizar'); ?>' method="POST">
    <input type="text" name="rua" placeholder="rua">
    <input type="text" name="numero" placeholder="numero">
    <br>
    <input type="text" name="complemento" placeholder="complemento">
    <br>
    <input type="text" name="bairro" placeholder="bairro">
    <input type="text" name="cep" placeholder="cep">
    <br>
    <input type="text" name="cidade" placeholder="cidade">
    <input type="text" name="estado" placeholder="estado"><br>
    <input type="submit" value="Atualizar">
    </form>
</body>
</html>