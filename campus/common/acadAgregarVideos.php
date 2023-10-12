<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionVideos'];
$idThemes = $_POST['idThemes'];
$Nombre = $_POST['NombreVideos'];
$Enlace = $_POST['EnlaceVideos'];

$query = "INSERT INTO videos(PosicionVideos, idThemes, NombreVideos, EnlaceVideos) 
VALUES ('$Posicion','$idThemes','$Nombre','$Enlace')";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    
    echo "Tenemos un Problema";
}

?>