<?php
include ("../conexion.php");

$id =$_REQUEST['id'];
$Posicion = $_POST['posicion'];
$Nombre = $_POST['nombre'];
$Enlace = $_POST['enlace'];
$idThemes = $_POST['idThemes'];

$query ="UPDATE `aca_contents` SET position='$Posicion', description='$Nombre', 
                    content='$Enlace', theme_id='$idThemes'
        WHERE id='$id'"; 
$resultado = $conexion->query($query);
//$now = $resultado->fetch_assoc();

if($resultado){
    header ("Location: ../filesLista.php?id=".$idThemes);
}
else{
    echo "Tenemos un Problema";
}

?>