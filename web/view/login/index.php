<?php 
if (session_status() !== PHP_SESSION_ACTIVE){ //Verificar se a sessão não já está aberta.
    session_start();  
} 
require '../../../rotas.php'; 
use Rota\Go;
if(isset($_SESSION['id'])){
    header(Go::home('d'));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='<?php echo Go::UserController('loginController'); ?>' method="POST">
    <input type="email" name="email" placeholder="Email">
    <br>
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="Logar">
    </form>
</body>
</html>