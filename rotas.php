<?php
namespace Rota;

class Go{
    public static function logout($p){
       
       if($p == 'd')
         return 'location: ../../controller/login/logout.php';
       if($p == 'l')
         echo '../../controller/login/logout.php';
    }
    public static function home($p){
       if($p == 'd')
         return 'location: ../../view/home/';
       if($p == 'l')
         echo '../../view/home/';
     }
     public static function login($p){
        if($p == 'd')
          return 'location: ../../view/login/';
        if($p == 'l')
          echo '../../view/login/';
      }
      public static function loginController(){
          echo '../../controller/login/';
     }
      public static function cadastro($p){
        if($p == 'd')
          return 'location: ../../view/cadastro/';
        if($p == 'l')
          echo '../../view/cadastro/';
      }
      public static function cadastroController(){
          echo '../../controller/cadastro/';
     }
      public static function conta($p){
        if($p == 'd')
          return 'location: ../../view/conta/';
        if($p == 'l')
          echo '../../view/conta/';
      }
      public static function carrinho($p){
        if($p == 'd')
          return 'location: ../../view/carrinho/';
        if($p == 'l')
          echo '../../view/carrinho/';
      }

}