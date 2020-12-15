<?php
Function Conection(){
    $dsn = "pgsql:host=db-uft01.cqivjfayc6ll.sa-east-1.rds.amazonaws.com;port=5432;dbname=petshop;user=postgres;password=!a2b3c4d5";
    
    try{
    // create a PostgreSQL database connection
    return $conn = new PDO($dsn);
    }catch (PDOException $e){
    // report error message
    echo $e->getMessage();
    }}

 
 
