<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionModules'];
$idCourses = $_POST['idCourses'];
$Nombre = $_POST['NombreModules'];

$query = "INSERT INTO aca_modules(position, course_id, description) 
VALUES ('$Posicion','$idCourses','$Nombre')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../modulesLista.php?id=".$idCourses);
}
else{
    
    echo "Tenemos un Problema";
}

?>