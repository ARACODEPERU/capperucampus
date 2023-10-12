<?php

include("../conexion.php");
$idUsers = $_POST['idUsers'];
$idCourses = $_POST['idCourses'];

$query = "INSERT INTO matriculas (idUsers, idCourses) 
            VALUES ('$idUsers', '$idCourses')";
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../index.php");
}
else{
    
}

?>