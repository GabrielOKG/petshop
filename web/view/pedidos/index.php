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
$pedidos = mostrarPedidos($pdo);
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
    include '../global_header.php';
 ?>
  
    <br>
    <br><br>
    <br>
   
    
    <div class="row" style="margin:4px;">
      <div class="col-3">
      <a href="../conta" style="text-decoration:none;">Minha conta</a><br>
        <a href="../endereco" style="text-decoration:none;">Endereço de entrega</a><br>
        <a disable style="text-decoration:none;color:silver;">Meus pedidos</a>
      </div>
      <div class="col-3">
      <table class="table">
      <tbody>
      <?php if($pedidos == false) { ?>
        
        
            <tr>
              <td><p>Você não possui endereço cadastrado</td>
            </tr> 
    <?php }else{ 
        foreach($pedidos as $pedido){
    ?> 
            <tr>
              <td>Codigo do pedido: <?php echo $pedido['id'];?><br>
              Feito em: <?php echo $pedido['quando']; ?><br>
              Valor: R$<?php echo $pedido['total']; ?>0<br>
              Status: <?php if($pedido['status'] == 0){
                echo "<span style='color:red;'>Pedido cancelado</span>";
             }else{
                echo "<span style='color:blue;'>Pedido sendo separado</span>";
                ?>
                <form action="<?php echo Go::carrinho("controller/cancelarPedido");?>" method="POST">
                    <input name="id_carrinho" value="<?php echo $pedido['id']; ?>" type = "hidden">
                    <input type="submit" class="form-control" style="background-color:#c00;color:white;font-size:16px;" name="remover" value="Cancelar Pedido"> 
                </form>
                <?php
                
             } ?>
              </td>
            </tr> 
           
         <?php } }?>
        </tbody>
        </table>
      </div>
     
    </div> 
</body>
</html>

