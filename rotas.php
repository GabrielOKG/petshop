<?php
namespace Rota;

class Go{
    public static function UserController($param){
      switch($param){
        case "cadastro/d":
          return 'location: ../../view/cadastro/';
        break;
        case "cadastro/l":
          return '../../view/cadastro/';
        break;
        case "cadastroController": 
         return '../../controller/auth/cadastro.php';
        break;
        case "login/d": 
          return 'location: ../../view/login/';
        break;
        case "login/l": 
          return '../../view/login/';
        break;
        case "loginController":
          return '../../controller/auth/login.php';
        break;
        case "atualizaController":
          return '../../controller/auth/atualiza.php';
        break;
        case "logout": 
          return '../../controller/auth/logout.php';
        break;
      }
    }
    public static function ContaController($param){
        switch($param){
          case "endereco/novo": 
            return '../../controller/endereco/novo.php';
          break;
          case "endereco/deletar": 
          return '../../controller/endereco/delete.php';
          break;
          case "endereco/atualizar": 
          return '../../controller/endereco/atualiza.php';
          break;
          case "endereco/mostrarTodos": 
          return '../../controller/endereco/endereco.php';
          break;
        }
    }
    public static function ProdutoController($param){
      switch($param){
        case "produto/exibir": 
          return '../../controller/produto/exibir.php';
        break;
        
      }
  }
    public static function home($p){
       if($p == 'd')
         return 'location: ../../view/home/';
       if($p == 'l')
         return '../../view/home/';
     }
      public static function conta($p){
        if($p == 'd')
          return 'location: ../../view/conta/';
        if($p == 'l')
          return '../../view/conta/';
      }
      public static function carrinho($p){
        switch($p){
          case "d":
            return 'location: ../../view/carrinho/';
          break;
          case "l": 
            return '../../view/carrinho/';
          break;
          case "pedido": 
            return '../../view/pedidos';
          break;
          case "controller/fechar": 
            return '../../controller/carrinho/pedido.php';
          case "controller/add": 
              return '../../controller/carrinho/add.php';
          break;
          case "controller/exibir": 
            return '../../controller/carrinho/exibir.php';
          break;
          case "controller/editar": 
            return '../../controller/carrinho/editar.php';
          break;
          case "controller/cancelarPedido": 
            return '../../controller/carrinho/cancelar.php';
          break;
        }
      }
      public static function endereco($p){
        if($p == 'd')
          return 'location: ../../view/endereco/';
        if($p == 'l')
          return '../../view/endereco/';
        if($p == 'novo')
          return 'location: ../../view/endereco/novo.php';
      }

}