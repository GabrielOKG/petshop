
<?php 
include "..\data\provider\mercadoria_provider.php";
    $array = padrao();
    echo(json_encode($array,JSON_UNESCAPED_UNICODE));
