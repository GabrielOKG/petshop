<?php
include_once 'database.ini.php';
    $foto = "https://petshopuft.s3-sa-east-1.amazonaws.com/Img/".trim($_GET['foto']).".jpg";
    try{        
        $sql = "INSERT INTO produto(
            titulo,descricao,preco,foto,qtd,categoria,indicacao,idade,tipo_racao,sabor,linha,marcar,desconto
        )VALUES(:titulo,:descricao,:preco,:foto,:qtd,:categoria,:indicacao,:idade,:tipo_racao,:sabor,:linha,:marca,:desconto)";
        $stmt = $pdo->prepare($sql);
        $stmt->BindValue(':titulo',$_GET['titulo']);
        $stmt->BindValue(':descricao',$_GET['descricao']);
        $stmt->BindValue(':preco',$_GET['preco']);
        $stmt->BindValue(':foto',$foto);
        $stmt->BindValue(':qtd',$_GET['qtd']);
        $stmt->BindValue(':categoria',$_GET['categoria']);
        $stmt->BindValue(':indicacao',$_GET['indicacao']);
        $stmt->BindValue(':idade',$_GET['idade']);
        $stmt->BindValue(':tipo_racao',$_GET['tipo_racao']);
        $stmt->BindValue(':sabor',$_GET['sabor']);
        $stmt->BindValue(':linha',$_GET['linha']);
        $stmt->BindValue(':marca',$_GET['marca']);
        $stmt->BindValue(':desconto',$_GET['desconto']);
        $stmt->execute();
        echo "<script language='javascript' type='text/javascript'>
        alert('Cadastrado com sucesso!');window.location.href='produto.php';</script>";
    }catch(PDOException $e){
      print $e->getMessage();
    }
  
?>