<?php
include("../conexion.php");

$id =$_REQUEST['id'];
$txtPosicion = $_POST['txtPosicion'];
$txtNombre = $_POST['txtNombre'];
$txtEnlace = $_POST['txtEnlace'];
$txtidThemes = $_POST['txtidThemes'];
$txtEnlace= trim($txtEnlace);

$query = "UPDATE `aca_contents` SET position='$txtPosicion', description='$txtNombre', content='$txtEnlace', theme_id='$txtidThemes'
WHERE id='$id'"; 

$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../videosLista.php?id=".$txtidThemes);
}
else{
    echo "Tenemos un Problema";
}

?>