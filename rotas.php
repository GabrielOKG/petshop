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
          '../../controller/auth/cadastro.php';
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
        // case "atualizar/d": 
        // break;
        // case "atualizar/l": 
        // break;
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
        if($p == 'd')
          return 'location: ../../view/carrinho/';
        if($p == 'l')
          return '../../view/carrinho/';
      }
      public static function endereco($p){
        if($p == 'd')
          return 'location: ../../view/endereco/';
        if($p == 'l')
          return '../../view/endereco/';
      }

}