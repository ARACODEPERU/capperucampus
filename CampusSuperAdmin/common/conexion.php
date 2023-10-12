<?php

$servidor="mysql:dbname=base-app;host=127.0.0.1";
$usuario="root";
$password="";

try{
    $pdo= new PDO($servidor,$usuario,$password);
    //fgg echo "Conectado..";

}catch(PDOException $e){ 
    echo "Conexion mala :(".$e->getMessage();
}


?>
