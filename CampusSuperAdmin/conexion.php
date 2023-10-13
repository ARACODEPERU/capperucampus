<?php 
  $envFile = $_SERVER['DOCUMENT_ROOT'] . '/.env';
  $envVars = parse_ini_file($envFile);
  $DB_USERNAME = $envVars['DB_USERNAME'];
  $pass = $envVars['DB_PASSWORD'];
  $location = $envVars['DB_LOCATION'];
  $db_name = $envVars['DB_NAME'];
  

$conexion = new mysqli($location, $DB_USERNAME, $pass, $db_name); //Unidad local - usuario - password - nombre de base de datos
?>