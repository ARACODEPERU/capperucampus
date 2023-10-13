<?php
$envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';
$envVars = parse_ini_file($envFile);
$DB_USERNAME = $envVars['DB_USERNAME'];
$pass = $envVars['DB_PASSWORD'];
$location = $envVars['DB_LOCATION'];
$db_name = $envVars['DB_NAME'];


$servidor="mysql:dbname=".$db_name.";host=".$location;

try{
    $pdo= new PDO($servidor,$DB_USERNAME,$pass);
    //fgg echo "Conectado..";

}catch(PDOException $e){ 
    echo "Conexion mala :(".$e->getMessage();
}


?>
