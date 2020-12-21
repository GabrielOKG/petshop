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
 <?php 
    include '../global_header.php';
 ?>
  
    <?php if($enderecos == false) { ?>
        <table class="table table-striped table-sm">
        <tbody>
            <tr>
              <td><p>Você não possui endereço cadastrado</td>
            </tr> 
          </tbody>
        </table>
    <br>
    <a href="novo.php" style="text-decoration:none;">Novo endereco</a>
    <?php }else{ 
        
    ?>  <br>
    <br><br>
    <br>
   
    
    <div class="row" style="margin:4px;">
      <div class="col-3">
      <a href="../conta" style="text-decoration:none;">Minha conta</a><br>
          <a disable style="text-decoration:none;color:silver;">Endereço de entrega</a>
      </div>
      <div class="col-3">

      <table class="table table-striped table-sm">
        <tbody>
            <tr>
              <td><?php echo "Logradouro: ".$enderecos['rua'].", ".$enderecos['numero'] ?></td>
            </tr> 
            <tr>
              <td><?php echo "Bairro: ".$enderecos['bairro']; ?></td>
            </tr>
            <tr>
              <td><?php echo "CEP: ".$enderecos['cep']; ?></td>
            </tr> 
            <tr>
              <td><?php echo "Cidade: ".$enderecos['cidade']; ?></td>
            </tr>
            <tr>
              <td><?php echo "Estado: ".$enderecos['estado']; ?></td>
            </tr>
          </tbody>
        </table>

        <a href="atualiza.php" style=text-decoration:none;>Atualizar Endereço</a>
      </div>
    </div><?php } ?>


<script>
</script>
</body>
</html>

