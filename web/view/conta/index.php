<?php 
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
  } 
require '../../../rotas.php'; 
require '../../models/user.php';
use Model\User;
use Rota\Go;
if(!isset($_SESSION['id'])){
    header(Go::UserController('login/d'));
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
<?php 
include '../global_header.php';
?>
   
   <br>
    <br><br>
    <br>
   
    
    <div class="row" style="margin:4px;">
      <div class="col-3">
          <a disable style="text-decoration:none;color:silver;">Minha conta</a><br>
          <a href="../endereco" style="text-decoration:none;">Endereço de entrega</a><br>
          <a href="../pedidos" style="text-decoration:none;">Meus pedidos</a>
      </div>
      <div class="col-3">

      <table class="table table-striped table-sm">
        <tbody>
            <tr>
              <td><?php echo "Nome completo: ".$arr['nome']." ".$arr['sobrenome'] ?></td>
            </tr> 
            <tr>
              <td><?php echo "CPF: ".$arr['cpf']; ?></td>
            </tr>
            <tr>
              <td><?php echo "Data de nascimento: ".$arr['nascimento']; ?></td>
            </tr> 
            <tr>
              <td><?php echo "Telefone: ".$arr['telefone']; ?></td>
            </tr>
            <tr>
              <td><?php echo "Email: ".$arr['email']; ?></td>
            </tr>
          </tbody>
        </table>

        <a href="atualizarCadastro.php" style=text-decoration:none;>Atualizar dados</a>
      </div>
    </div>


<script>
</script>
</body>
</body>
</html>