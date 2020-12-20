<?php 
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
use Rota\Go;
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
}
include_once '../../../DB/database.ini.php';
include Go::ContaController('endereco/mostrarTodos');

$enderecos = mostrarTodos($pdo);
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
<div class ="justify-content-center align-itens-center row">
            <div class = "col-6" >
                <br><br><br><br><br><br><br>
<ul class="list-group" style="border: 1px solid black;">
<div class= "text-center mb-2">
  <li class="list-group-item active" aria-current="true" style="background-color: silver; border:none">INFORMAÇÕES</li>
</div>
  <?php if($enderecos == false) { ?><p>Voce não possui nenhum endereco cadastrado</p><br>
    <a href="novo.php">Novo endereco</a>
    <?php }else{ 
        foreach($enderecos as $dado){
        ?><li class="list-group-item"><?php echo $dado;?></li><?php
    } ?>
    <li class="list-group-item active "  aria-current="true" style="background-color: black; border:none">
    <div class= "text-center mb-2">
    <a href="atualiza.php" style="color: #fff; text-decoration:none;  "><b> Atualizar Endereço</b></a>
    </div>
    </li>
    <?php } ?>


</ul>
</div>
</div>
</body>
</html>

