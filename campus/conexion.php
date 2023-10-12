<?php
    $envVars = parse_ini_file('.env');
    $usuario = $envVars['DB_USERNAME'];
    $pass = $envVars['DB_PASSWORD'];
    $location = $envVars['DB_LOCATION'];
    $db_name = $envVars['DB_NAME'];
    
        /*LOCAL*/ 
        $conexion = new mysqli($location,$usuario,$pass, $db_name); 
    //Unidad local - usuario - password - nombre de base de datos
?>

<?php 
    /*HABICON*/
    //$conexion = new mysqli("localhost","yisusweb","*Volver42","campus"); 
    //Unidad local - usuario - password - nombre de base de datos
?>

<?php 
    /*CAP*/
    //$conexion = new mysqli("localhost","yisusweb","volveraempezar","cvinnova"); 
    //Unidad local - usuario - password - nombre de base de datos
?>