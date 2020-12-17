<?php
 if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
use Rota\Go;
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
<?php  if(isset($_SESSION['id'])){?>
<!-- Se o usuario estiver logado aparece isso -->
    <h1>Bem vindo <?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome']; ?> </h1>
    <a href="<?php echo Go::logout('l'); ?>">Logout</a><br>
    <a href="<?php echo Go::conta('l'); ?>">Minha conta</a><br>
    <a href="<?php echo Go::carrinho('l'); ?>">Meu Carrinho</a><br>
  <?php }else{ ?>
<!-- Se não isso -->
<h1> Não Logado </h1>
<a href="<?php echo Go::login('l'); ?>">Login</a>
<br>
<a href="<?php echo Go::cadastro('l'); ?>">cadastro</a>
 <?php } ?>
    <br>
<script>
</script>
</body>
</html>