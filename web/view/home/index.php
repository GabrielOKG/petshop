<?php
 if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
use Rota\Go;
include_once '../../../DB/database.ini.php';
include Go::ProdutoController('produto/exibir');
$produtos = mostrar($pdo);
// echo memory_get_usage();

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
    <a href="<?php echo Go::UserController('logout'); ?>">Logout</a><br>
    <a href="<?php echo Go::conta('l'); ?>">Minha conta</a><br>
    <a href="<?php echo Go::carrinho('l'); ?>">Meu Carrinho</a><br>
  <?php }else{ ?>
<!-- Se não isso -->
<h1> Não Logado </h1>
<a href="<?php echo Go::UserController('login/l'); ?>">Login</a>
<br>
<a href="<?php echo Go::UserController('cadastro/l'); ?>">cadastro</a>
 <?php } ?>
    <br>
<form action="#" method="GET">
    <input type="search" name="busca" placeholder="O que você está procurando?">
    <input type="submit" value="Pesquisar">
</form>
<h2> Ptodutos</h2>
<?php
  foreach($produtos as $produto){
    ?><img src="<?php echo $produto['foto']; ?>" width="200" height="200"><br><br> 
<?php
    echo $produto['titulo']. "<br>" ."R$ ".$produto['preco']."0" . "<br><br>";
  }
?>
</body>
</html>