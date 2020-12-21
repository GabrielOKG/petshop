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
include Go::carrinho("controller/exibir");
$itens = mostrarTodos($pdo);
$totalItens = $itens['count'];
unset($itens['count']);
$preco = 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Petshop - Meu carrinho</title>
</head>
<body>
<?php 
include '../global_header.php';
?>
 
<br><br>
<div class="row" style="margin:10px;padding:10px;">
    <div class="col-7">
    
    <?php
    if($totalItens == 0){
        ?><div class="container"><?php echo "Nenhum item no carrinho"; ?></div><?php 
    }else{
        ?>
        <div class="container"><table class="">
        <tbody>
    <?php
    foreach($itens as $item){
        $preco += $item['qtd'] * $item['preco'] * $item['desconto'];
       ?>
            <tr>
              <td>
                <div class="row">
                    <div class="col-2">
                        <img src="<?php echo $item['foto']; ?>" width="130">
                    </div>
                    <div class="col-6">
                    <?php echo $item['titulo']; ?><br><br>
                    R$<?php echo $item['preco'];?>0
                    <form action="<?php echo Go::carrinho("controller/editar"); ?>" method="POST">
                    <div class="row">
                        <div class="col-3">
                            <input type="number" name="qtd" class="form-control text-center" style="font-size:16px;" placeholder="<?php echo $item['qtd']; ?>">
                            <input name="id_item" value="<?php echo $item['id']; ?>" type = "hidden">
                        </div>
                        <div class="col-6"> 
                            <input type="submit" class="form-control" style="background-color:silver;color:white;font-size:16px;" name="editar" value="Alterar qtd">
                        </div>
                        <div class="col-3">
                            <input type="submit" class="form-control" style="background-color:#c00;color:white;font-size:16px;" name="remover" value="x">
                        </div>
                
                    </div>    
                    </form>
                    </div>
                    </div>
            </td>
            </tr>
          <?php
    }
    ?>
     </tbody>
        </table></div>
<?php
    }
    ?>
    </div>
      <div class="col-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Carrinho</span>
          <span class="badge bg-secondary rounded-pill"><?php echo $totalItens; ?> </span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <small class="text-muted">Frete</small>
            </div>
            <span class="text-muted">Gratis</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <small>Desconto</small>
            </div>
            <span class="text-success">R$0.00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <small>Subtotal</small>
            </div>
            <span class="text-success">R$0.00</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (BRL)</span>
            <strong>R$<?php echo $preco."0"; ?></strong>
          </li>
        </ul>

        <!-- <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cupom de desconto">
            <button type="submit" class="btn btn-secondary">Validar</button>
          </div>
        </form> -->

        <form class="card p-2">
          <div class="input-group">
            <button type="submit" class="form-control">Fechar Pedido</button>
          </div>
        </form>
      </div>
</body>
</html>