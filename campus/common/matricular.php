<?php

include("../conexion.php");
$idUsers = $_POST['idUsers'];
$estado = $_POST['estado'];
$idCourses = $_POST['idCourses'];

$query = "INSERT INTO matriculas (idUsers, idCourses, estado) 
            VALUES ('$idUsers', '$idCourses', '$estado')";
$resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../usersAlumnos.php");
}
else{
    
}

?>