<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionModules'];
$idCourses = $_POST['idCourses'];
$Nombre = $_POST['NombreModules'];

$query = "INSERT INTO modules(PosicionModules, idCourses, NombreModules) 
VALUES ('$Posicion','$idCourses','$Nombre')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>