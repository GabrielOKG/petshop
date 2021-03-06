<?php
include_once 'database.ini.php';
    $foto = "https://petshopuft.s3-sa-east-1.amazonaws.com/Img/".trim($_GET['foto']).".jpg";
    $titulo = strtolower($_GET['titulo']);
    $categoria = strtolower($_GET['categoria']);
    $indicacao = strtolower($_GET['indicacao']);
    try{        
        $sql = "INSERT INTO produto(
            titulo,descricao,preco,foto,qtd,categoria,indicacao,idade,tipo_racao,sabor,linha,marca,desconto,detalhes
        )VALUES(:titulo,:descricao,:preco,:foto,:qtd,:categoria,:indicacao,:idade,:tipo_racao,:sabor,:linha,:marca,:desconto,:detalhes)";
        $stmt = $pdo->prepare($sql);
        $stmt->BindValue(':titulo',$titulo);
        $stmt->BindValue(':descricao',$_GET['descricao']);
        $stmt->BindValue(':detalhes',$_GET['detalhes']);
        $stmt->BindValue(':preco',$_GET['preco']);
        $stmt->BindValue(':foto',$foto);
        $stmt->BindValue(':qtd',$_GET['qtd']);
        $stmt->BindValue(':categoria',$categoria);
        $stmt->BindValue(':indicacao',$indicacao);
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