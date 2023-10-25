<?php
include ("../conexion.php");

$Posicion = $_POST['PosicionVideos'];
$idThemes = $_POST['idThemes'];
$Nombre = $_POST['NombreVideos'];
$Enlace = $_POST['EnlaceVideos'];

$query = "INSERT INTO aca_contents(position, theme_id, description, content, is_file) 
VALUES ('$Posicion','$idThemes','$Nombre','$Enlace', 0)";
        $resultado = $conexion->query($query);

if($resultado){
    header ("Location: ../videosLista.php?id=".$idThemes);
}
else{
    
    echo "Tenemos un Problema";
}

?>