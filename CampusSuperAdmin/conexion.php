<?php 
    $envVars = parse_ini_file('.env');
    $usuario = $envVars['DB_USERNAME'];
    $pass = $envVars['DB_PASSWORD'];
    $location = $envVars['DB_LOCATION'];
    $db_name = $envVars['DB_NAME'];

$conexion = new mysqli($location, $usuario, $pass, $db_name); //Unidad local - usuario - password - nombre de base de datos
?>