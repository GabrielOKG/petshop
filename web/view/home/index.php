<?php
 if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
use Rota\Go;
include_once '../../../DB/database.ini.php';
include Go::ProdutoController('produto/exibir');
if(isset($_GET['busca']) && !empty($_GET['busca'])){
$busca = $_GET['busca'];
}else{
  $busca = '';
} 

$produtos = mostrar($pdo,$busca);
// echo memory_get_usage();
$totalProd = $produtos['count'];
unset($produtos['count']);
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
?>
<!-- Se o usuario estiver logado aparece isso -->
    <h1>Bem vindo <?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome']; ?> </h1>
<?php }else{ 
    include '../header.php';
  ?>
<!-- Se não isso -->
<h1> Não Logado </h1>

 <?php } ?>

<div class="col-12" style="margin:0px;padding:15px;">
<form class="form-inline " action="" method="GET">
 <div class ="justify-content-center  row">
  <div class='col-6'>
    <input class="form-control" type="search" name="busca" placeholder="O que você está procurando?" aria-label="Search">
    <i class="fas fa-search" aria-hidden="true"></i>
  </div>
  <div class='col-2'>
  <input class="btn btn-primary " type="submit" value="Pesquisar">
  </div>
</div>  
</form>
</div>
<!-- <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">adicionar ao carrinho</button> -->

<span>&nbsp;&nbsp;Foram encontrados <?php echo $totalProd; ?> produtos cadastrados</span><br>
  <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
  <?php
        foreach($produtos as $produto){
  ?>
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <a href="exibir.php?id=<?php echo $produto['id']; ?>"><img class="card-img-top" src="<?php echo $produto['foto']; ?>" ></a>
                <div class="card-body">
                  <p class="card-text"><?php echo $produto['titulo']; ?></p><p style="font-size:22px"><br><?php echo "R$".$produto['preco']."0"; ?></b></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <form action="<?php echo Go::carrinho("controller/add"); ?>" method="POST">
                          <input name="id_produto" value="<?php echo $produto['id']; ?>" type = "hidden">
                          <input type="submit" class="btn btn-sm btn-outline-secondary" value="adicionar ao carrinho">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <?php
             }
        ?>
         </div>
         </div>
         </div>
        
</body>
</html>