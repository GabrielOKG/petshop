<?php

$dsn = "pgsql:host=db-uft01.cqivjfayc6ll.sa-east-1.rds.amazonaws.com;port=5432;dbname=petshop;user=postgres;password=!a2b3c4d5";
 
try{
 // create a PostgreSQL database connection
 $conn = new PDO($dsn);
 
 // display a message if connected to the PostgreSQL successfully
 if($conn){
 echo "200 OK";
 }
}catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

 
 
