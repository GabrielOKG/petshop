<?php 
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
require '../../models/user.php';
use Model\User;
use Rota\Go;
if(!isset($_SESSION['id'])){
    header(Go::login('d'));
}
$arr = User::formatar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Petshop - Pagina Inicial</title>
</head>
<body>
    <h1>Minha Conta</h1>
    <a href="<?php echo Go::logout('l'); ?>">Logout</a>
    <br>
    <a href="<?php echo Go::home('l'); ?>">Home</a>
    <br>
    <a href="<?php echo Go::endereco('l')?>">Endereço</a>
    <br>
    <a href="<?php echo Go::carrinho('l')?>">Carrinho</a>
    <br>
    <br>
    <p><?php foreach($arr as $dado){
      echo $dado . " <br>";  
    }
    ?></p>
   
    
<script>
</script>
</body>
</html>