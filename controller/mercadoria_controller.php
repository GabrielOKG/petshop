<?php
include "..\data\provider\mercadoria_provider.php";
include "..\data\model\mercadoria.php";
    
 
    $mercadorias = [];
    $array = padrao();
    foreach($array as $row){
        $mercadoria = new Mercadoria(
            $row['id'],
            $row['titulo'],
            $row['descricao'],
            $row['preco'],
            $row['desconto'],
            $row['foto'],
            $row['quantidade'],
        );

       
    }

    
echo($mercadoria->titulo);

