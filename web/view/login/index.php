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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <style>
        html, body{
            height: 100%;
        }
        body{
            display: flex;
            align-items: center;
        }
        .formLogin{
            background-color: silver;
            color: #fff;
            padding: 50px;
            border: 1px solid #000;
            box-shadow: 3px 3px #000;
            border-radius: 20px;
        }
    </style>
    
</head>
<body>
    <div class ="container">
        <div class ="justify-content-center align-itens-center row">
            <div class = "col-4" >
                <form class="formLogin" action='<?php echo Go::UserController('loginController'); ?>' method="POST">
                    <div class="text-center mb-2">
                        <h2>Petshop</h2>
                    </div>
                         <div class="form-group">    
                            <input type="text" placeholder="Usuário" name="email" class="form-control"><br>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" placeholder="Senha" name="senha"class="form-control"><br>
                        </div>    
                        
                        <div class="form-group">
                            <input type="submit" value="Logar" class="form-control" style="background-color: rgb(22, 16, 16); color:snow;"><br>
                        </div>   
                        
                        <div class= "text-center mb-2">
                        <a href="<?php echo Go::UserController('cadastro/l'); ?>" style="text-decoration:none;" >Casdastro</a>
                        </div>                        
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>