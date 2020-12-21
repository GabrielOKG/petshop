<?php
 if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
use Rota\Go;
include_once '../../../DB/database.ini.php';
include Go::ProdutoController('produto/exibir');
if(isset($_GET['id']) && !empty($_GET['id'])){
$id_produto = $_GET['id'];
}else{
  header('location: ../home');
} 
$produto = exibir($pdo,$id_produto);

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
<?php 
if(isset($_SESSION['id'])){
 include '../global_header.php';
 }else{ 
    include '../header.php';
 } 
 ?><br><br><br><br>
  
        <div class="container">
          <div class="row">
            <div class="col-md-3">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="<?php echo $produto['foto']; ?>" >
                <br>
            <form action="<?php echo Go::carrinho("controller/add"); ?>" method="POST"> <br>
              <div class="row">
                <div class='col-12'>
                <input name="id_produto" value="<?php echo $produto['id']; ?>" type = "hidden">
                <input type="submit" class="form-control text-center" style="background-color:green;color:white;" value="ADICIONAR AO CARRINHO">
                </div>
                </div>
            </form>
            </div>
            </div>
            <div class="col-md-7">
                <p style="font-size:24px;"><?php echo $produto['titulo']; ?></p>
                <p style="font-size:18;"><?php echo $produto['descricao']; ?></p>
                <br> <p style="font-size:18;"><?php echo $produto['detalhes']; ?></p>
            </div>
         </div>
         </div>
         </div>   
</body>
</html>