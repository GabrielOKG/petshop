
<?php

include_once "..\data\config\db.php";
include "..\data\model\mercadoria.php";

Function ordMaiorMenor($count){$pdo = conection();
    $dados = $pdo->prapare('SELECT * FROM mercadorias');
    return $data = $dados->fetch();
}
Function ordMenorMaior($count){$pdo = conection();
    $dados = $pdo->prepare('SELECT * FROM mercadorias');
    return $data = $dados->fetch();
}
Function ordAz($count){$pdo = conection();
    $dados = $pdo->prepare('SELECT * FROM mercadorias');
    return $data = $dados->fetch();
}

Function padrao(){

    $pdo = conection();
    $stmt = $pdo->prepare('SELECT * FROM mercadorias');
    $consulta = $stmt->execute();
    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $mercadoria = new Mercadoria(
            $linha['id'],
            $linha['titulo'],
            $linha['descricao'],
            $linha['desconto'],
            $linha['foto'],
            $linha['quantidade'],
            

        );
    }
    return $mercadoria;
   
}


