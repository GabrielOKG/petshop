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

<!-- Se o usuario estiver logado aparece isso -->
    <h1>Meu carrinho</h1>
    <a href="<?php echo Go::UserController('logout'); ?>">Logout</a><br>
    <a href="<?php echo Go::home('l'); ?>">Home</a>
    <br><br>
    <?php
    if($totalItens == 0){
        echo "Nenhum item no carrinho";
    } 
    foreach($itens as $item){
        echo $item['id']."<br>".$item['titulo']."<br>".$item['preco']."0"."<br>";
    ?>
    <form action="<?php echo Go::carrinho("controller/editar"); ?>" method="POST">
        <input type="number" name="qtd" placeholder="<?php echo $item['qtd']; ?>">
        <input name="id_item" value="<?php echo $item['id']; ?>" type = "hidden">
        <input type="submit" name="editar" value="Alterar qtd">
        <input type="submit" name="remover" value="x">
    </form>
    <?php
    }
    ?>
</body>
</html>