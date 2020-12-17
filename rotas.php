<?php
namespace Rota;

class Go{
    public static function logout($p){
       if($p == 'd')
         return 'location: ../../controller/login/logout.php';
       if($p == 'l')
         return '../../controller/login/logout.php';
    }
    public static function home($p){
       if($p == 'd')
         return 'location: ../../view/home/';
       if($p == 'l')
         return '../../view/home/';
     }
     public static function login($p){
        if($p == 'd')
          return 'location: ../../view/login/';
        if($p == 'l')
          return '../../view/login/';
      }
      public static function loginController(){
          return '../../controller/login/';
     }
      public static function cadastro($p){
        if($p == 'd')
          return 'location: ../../view/cadastro/';
        if($p == 'l')
          return '../../view/cadastro/';
      }
      public static function cadastroController(){
          return '../../controller/cadastro/';
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