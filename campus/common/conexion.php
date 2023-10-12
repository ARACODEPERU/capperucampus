<?php

$servidor="mysql:dbname=yisuscampus;host=127.0.0.1";
$usuario="YisusWeb";
$password="*Volver42";

try{
    $pdo= new PDO($servidor,$usuario,$password);
    //fgg echo "Conectado..";

}catch(PDOException $e){ 
    echo "Conexion mala :(".$e->getMessage();
}


?>