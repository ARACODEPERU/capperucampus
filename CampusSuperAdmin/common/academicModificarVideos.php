<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtEnlace = $_POST['txtEnlace'];
$txtidThemes = $_POST['txtidThemes'];

$query = "UPDATE `videos` SET PosicionVideos='$txtPosicion', NombreVideos='$txtNombre', EnlaceVideos='$txtEnlace', idThemes='$txtidThemes'
WHERE IDVideos='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../coursesLista.php");
}
else{
    echo "Tenemos un Problema";
}

?>