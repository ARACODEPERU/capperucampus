<?php
    $envVars = parse_ini_file('.env');
    $usuario = $envVars['DB_USERNAME'];
    $pass = $envVars['DB_PASSWORD'];
    $location = $envVars['DB_LOCATION'];
    $db_name = $envVars['DB_NAME'];

$servidor="mysql:dbname=".$db_name.";host=".$location;
                                        $password="";

try{
    $pdo= new PDO($servidor,$usuario,$password);
    //fgg echo "Conectado..";

}catch(PDOException $e){ 
    echo "Conexion mala :(".$e->getMessage();
}


?>
